<?php

class ConfirmEmail extends Dbh
{
    // private $uid;
    // private $token;
    // private $email;
    
    public function __construct()
    {
        
    }
    

    // public function getInfo()
    // {   
       
        // $sql = "SELECT users_email, users_token From users WHERE user_uid=:user_uid ";
        // $sql = "SELECT users_uid, users_email, users_token  FROM users" ;
      
        // $stmt = $this->connect()->query($sql);
        
        // $row = $stmt->fetch();
        
        //     // echo $row['users_email'];
        //     // echo $row['users_token'].'<br>';
        //     // echo $row['users_uid'].'<br>';
        //     $this->uid = $row['users_uid'];
        //     $this->token = $row['users_token'];
        //     $this->email = $row['users_email'];
        //     // echo $row['users_uid'].'<br>';
        //     echo $this->uid;
        //     echo $this->email;
        //     echo $this->token;

          
     
    

      
    public function send_activation_email()
    {
        $sql = "SELECT users_uid, users_email, users_token  FROM users" ;
      
        $stmt = $this->connect()->query($sql);
        
        $row = $stmt->fetch();
        $users_uid = $row['users_uid'];
        $token = $row['users_token'];
        $email = $row['users_email'];


        $APP_URL = 'http://localhost/auth';
        $SENDER_EMAIL_ADDRESS = 'no-reply@camagru42.fr';
        
        // create the activation link
        $activation_link = $APP_URL . "/activate.php?email=$email&activation_code=$token";
    
        // set email subject & body
        $subject = 'Please activate your account';
        $message = <<<MESSAGE
                Hi $users_uid,
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