<?php
require_once('./dbh.classes.php');

class ActivationEmail extends Dbh
{
    public function activation($email, $token)
    {
       
        if(!empty($email) && !empty($token))
        {
            
            
            $sql = "SELECT users_id FROM users WHERE users_email=:email AND users_token=:token";   
            
            $stmt = $this->connect()->prepare($sql);
            //s'il y a plus de 1 parametre dans execute
            $stmt->execute(array(
                'email' => $email,
                'token' => $token
            ));
            
        
            if($stmt->fetchColumn() > 0)
            {
                $sqlUpdate = "UPDATE users SET users_confirm=1, users_token='' WHERE users_email= ?";
                $update = $this->connect()->prepare($sqlUpdate);
                // s'il y a qu un parametre dans execute
                $update->execute([$email]);
               
            }
        }
    }
}

$email = $_GET["email"];
$token = $_GET["activation_code"];

$active = new ActivationEmail();
$active->activation($email, $token);

require_once('../views/viewAfterconfirm.php');

?>