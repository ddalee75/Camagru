<?php

// checker si username/email deja existe  ou 
class Signup extends Dbh 
{
    protected function checkUser($uid, $email)
    {
        // select users_uid de table users pour voir si users_uid ou users_email il y a qqchose
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?');
        // si username et email est vide, renvoit un message error
        if(!$stmt->execute(array($uid, $email)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
        }
         // checker si username ou email existe deja  
        $resultCheck;
        if($stmt->rowCount() > 0)
        {
            $resultCheck = false;
        }
        else 
        {
            $resultCheck = true;
        }
        
        return $resultCheck;
    }

    protected function setUser($uid, $pwd, $email)
    {
        // generer token pour confirmation email
        function getToken($len=32)
        {
            return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
        }
        $newToken = getToken(10);        
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email, users_token) VALUES (?, ?, ?, ?);');

        //checker password avant inserer les datas
        //Crée une clé de hachage pour un mot de passe
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($uid, $hashedPwd, $email, $newToken)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
        }
        
        $to_email = $email;
        $subject = 'Testing PHP Mail';
        $message = 'This mail is sent using the PHP mail function';
        $headers = 'From: noreply @ company . com';
        mail($to_email,$subject,$message,$headers);

        $stmt = null;
    }

    
    


}