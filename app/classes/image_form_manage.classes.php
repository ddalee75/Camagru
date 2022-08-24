<?php
require_once('./dbh.classes.php');

class ImageFormManage extends Dbh
{
    
    public function setComment($orderGallery, $postUser, $postContent)
    {
        if (empty($orderGallery))
        {
            header("location: ../index.php?url=image&orderGallery=$orderGallery&error=imageError");
                exit();
        }
        
        if (isset($_POST['submit']))
        { 
       
         
            $sql= "SELECT * FROM comment" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            // $row= $stmt->rowCount();
            // print_r($row+1);
          
            $stmt = $this->connect()->prepare('INSERT INTO comment (postUser, postContent, orderGallery) VALUES (?, ?, ?);');
            if(!$stmt->execute(array($postUser, $postContent, $orderGallery)))
            {
                header("location: ../index.php?url=image&orderGallery=$orderGallery&error=stmtError");
                exit();
            }

            header("location: ../index.php?url=image&orderGallery=$orderGallery&error=commentSucess");
            $stmt = NULL;
            $this->sendNotificationOwner($orderGallery, $postUser);
            exit();
        }
          
    }

    public function sendNotificationOwner($orderGallery, $postUser)
    {
        //fecth variable grace a foreign key
        
        $sql="SELECT users_email, users_uid FROM gallery JOIN users ON gallery.users_id=users.users_id WHERE orderGallery='$orderGallery'";
     
        $stmt = $this->connect()->query($sql);
        $row=$stmt->fetch();
        $email=$row["users_email"];
        $users_uid=$row["users_uid"];
        
        // header("location: ../index.php?url=image&orderGallery=$orderGallery&error=commentSucess&$email");

        //Envoie email
        
        $APP_URL = 'http://localhost/';
        $SENDER_EMAIL_ADDRESS = 'no-reply@camagru42.fr';
        // set email subject & body
        $link_photo= $APP_URL."index.php?url=image&orderGallery=$orderGallery";
        $subject = 'Someone comment your photo';
        $message = <<<MESSAGE
                        Hello, $users_uid,
                        $postUser comments on your photo,check now
                        $link_photo 
                        MESSAGE;
        // email header
        $header .= "From:" . $SENDER_EMAIL_ADDRESS;
                
        // send the email
        mail($email, $subject, nl2br($message), $header);

               
        
    }

   

}    


$orderGallery = $_POST['orderGallery'];
// print_r($orderGallery);
$postUser = $_POST['useruid'];
$postContent = $_POST['content'];

$imageFormManage = new ImageFormManage;
$imageFormManage->setComment($orderGallery, $postUser, $postContent);



?>