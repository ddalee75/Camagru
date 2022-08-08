<?php

require_once('./dbh.classes.php');
//check email et token dans bdd
class CheckResetPwd extends Dbh
{
   
    public function CheckInfo($email, $token)
    {
       
        if(!empty($email) && !empty($token))
        {
            
            
            $sql = "SELECT users_id FROM users WHERE users_email=:email AND pwd_token=:token";   
            
            $stmt = $this->connect()->prepare($sql);
            //s'il y a plus de 1 parametre dans execute
            $stmt->execute(array(
                'email' => $email,
                'token' => $token
            ));
            
        
            if($stmt->fetchColumn() > 0)
            {
                //effare pwd_token
                // $sqlUpdate = "UPDATE users SET pwd_token='' WHERE users_email= ?";
                // $update = $this->connect()->prepare($sqlUpdate);
                // $update->execute([$email]);

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

                header("location: ../index.php?url=Createnewpassword&email=$email&&token=$token");
            }
           
        }
    }

}

$email = $_GET["email"];
$TokenPWD = $_GET["activation_code"];

$create = new CheckResetPwd();
$create->CheckInfo($email, $TokenPWD);



                    