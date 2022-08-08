<?php
 include "../classes/dbh.classes.php";

class ResetPassword extends Dbh
{
    public function CheckEmail()
    {
        if (isset($_POST['verify_email']))
        {
            // $test = $_POST['verify_email'];
            // echo $test;
            if(!empty($_POST['verify_email']))
            {
                $stmt = $this->connect()->prepare('SELECT COUNT(*) AS nb FROM users WHERE users_email = ?');
                $stmt->bindValue(1, $_POST['verify_email']);
                $stmt->execute();

                $ligne = $stmt->fetch(PDO::FETCH_ASSOC);
                
                function getToken($len=32)
                {
                    return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
                }
                $TokenPWD = getToken(10);       
                
                if (!empty($ligne) && $ligne['nb'] > 0)
                {
                    $stmt = $this->connect()->prepare('UPDATE users SET pwd_ask_date = NOW(), pwd_token = ? WHERE users_email = ?') ;
                    $stmt->bindValue(1, $TokenPWD);
                    $stmt->bindValue(2, $_POST['verify_email']);
                    $stmt->execute();
                    

                    // Envoie email
                    $email= $_POST['verify_email'];
                    $APP_URL = 'http://localhost/classes';
                    $SENDER_EMAIL_ADDRESS = 'no-reply@camagru42.fr';
        
                    // create the activation link
                    $activation_link = $APP_URL . "/reset_password_etape2.classes.php?email=$email&activation_code=$TokenPWD";
                
                    // set email subject & body
                    $subject = 'Please Reset Your Password';
                    $message = <<<MESSAGE
                            Your havec one hour to reset your password!
                            Please click the following link to Reset your Password:
                            $activation_link
                            MESSAGE;
                    // email header
                    $header .= "From:" . $SENDER_EMAIL_ADDRESS;
                
                    // send the email
                    mail($email, $subject, nl2br($message), $header);

                    header("location: ../index.php?url=Resetpassword&error=CheckYourEmail");

                }
                else
                {
                    $stmt = null;
                    header("location: ../index.php?url=Resetpassword&error=EmailNotFound");
                }
                $stmt = null;
            }
        else 
            {
                header("location: ../index.php?url=Resetpassword&error=PleaseInputEmail");
            }
        }
        
    }

}

$checkemail = new ResetPassword();
$checkemail-> CheckEmail();
