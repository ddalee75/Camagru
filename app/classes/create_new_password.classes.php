<?php

require_once('./dbh.classes.php');

//check email et token dans bdd
class CheckResetPwd extends Dbh
{
   
    public function CheckInfo($email, $TokenPWD, $pwdOne, $pwdTwo)
    {
         function passwordSecurity($pwdOne) 
        {
            $uppercase = preg_match('@[A-Z]@', $pwdOne);
            
            $result;
            if (!$uppercase)
            {
                $result =false;
            }
            else
            {
                $result = true;
            }
            return $result;
        }

        if(!empty($email) && !empty($TokenPWD))
        {
              
            //checker si Token expire 
            $sqlGetTime = "SELECT * FROM users WHERE users_email=?";
            $stmt = $this->connect()->prepare($sqlGetTime);
            $stmt->execute([$email]);

            $getTime= $stmt->fetch();
            $date_token = strtotime('+1 hours', strtotime($getTime['pwd_ask_date']));
            $date_today = time();
            
            if($date_token < $date_today){
                $stmt = null;
                
                header("location: ../index.php?url=Resetpassword&error=TokenExpire");
                
                exit();
            }

            // header("location: ../index.php?url=Createnewpassword&email=$email&activation_code=$TokenPWD");
        

            $sql = "SELECT * FROM users WHERE users_email=:email AND pwd_token=:TokenPWD";   
            
            $stmt = $this->connect()->prepare($sql);
            //s'il y a plus de 1 parametre dans execute
            $stmt->execute(array(
                'email' => $email,
                'TokenPWD' => $TokenPWD
            ));
            
            if($stmt->fetchColumn() > 0)
            {
                $check_uppercase = passwordSecurity($pwdOne);
                if(!empty($pwdOne) && !empty($pwdTwo) && $check_uppercase === true )
                {
                    if ($pwdOne === $pwdTwo)
                    {
                            // changerr password et effacer pwd_token                        
                            $hashedPwd = password_hash($pwdOne, PASSWORD_DEFAULT);

                            $sqlUpdate = "UPDATE users SET users_pwd= ?, pwd_token='' WHERE users_email= ?";
                            $update = $this->connect()->prepare($sqlUpdate);
                            $update->execute(array($hashedPwd, $email));
                        
                            header("location: ../index.php?url=Accueil&$token&$em&$hashedPwd");
                    }
                    else
                    {
                        header("location: ../index.php?url=Createnewpassword&email=$email&activation_code=$TokenPWD&error=PasswordNotMatch");
                    }
                }    
                else
                {
                    header("location: ../index.php?url=Createnewpassword&email=$email&activation_code=$TokenPWD&error=EmptyInput");
                }
            }
            else
            {
               
                    header("location: ../index.php?url=Resetpassword&error=TokenOrEmailNoMatch");
            }

        }        

    }

    

}


if (isset($_POST['reset_submit']))
{
$email = $_POST['email'];
$TokenPWD = $_POST['TokenPWD'];
$pwdOne = $_POST['resetpwd'];
$pwdTwo = $_POST['repeatpwd'];


$create = new CheckResetPwd();
$create->CheckInfo($email, $TokenPWD, $pwdOne, $pwdTwo);
}



                    