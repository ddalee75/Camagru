<?php

class ConfirmEmail extends Dbh
{
   
    
    public function __construct(){}
    

      
    public function send_activation_email($uid)
    {
        //les deux lignes commentaires, cest pour recuperer les info dans un table, 
        // mais pour preciser une critere il faut faire different
        // $sql = "SELECT * FROM users ";
        // $stmt = $this->connect()->query($sql);
        $sql = "SELECT * FROM users WHERE users_uid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$uid]);
        //ici uid =input de WHERE users_id
        $row = $stmt->fetch();
       
        $token = $row['users_token'];
        $email = $row['users_email'];


        $APP_URL = 'http://localhost/classes';
        $SENDER_EMAIL_ADDRESS = 'no-reply@camagru42.fr';
        
        // create the activation link
        $activation_link = $APP_URL . "/activate.classes.php?email=$email&activation_code=$token";
    
        // set email subject & body
        $subject = 'Please activate your account';
        $message = <<<MESSAGE
                Hi $uid,
                Welcome to Chilee's Camagru!
                Please click the following link to activate your account:
                $activation_link
                MESSAGE;
        // email header
        $header = "From:" . $SENDER_EMAIL_ADDRESS;
    
        // send the email
        mail($email, $subject, nl2br($message), $header);
    
    }
}