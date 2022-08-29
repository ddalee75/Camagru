<?php
require_once('./dbh.classes.php');

class ImageFormManage extends Dbh
{
    
    public function setComment($idGallery, $postUser, $postContent, $users_id)
    {
        if (empty($idGallery))
        {
            header("location: ../index.php?url=image&idGallery=$idGallery&error=imageError");
                exit();
        }
        
        if (isset($_POST['submit']))
        { 
       
         
            $sql= "SELECT * FROM comment" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            // $row= $stmt->rowCount();
            // print_r($row+1);
          
            $stmt = $this->connect()->prepare('INSERT INTO comment (postUser, postContent, idGallery) VALUES (?, ?, ?);');
            if(!$stmt->execute(array($postUser, $postContent, $idGallery)))
            {
                header("location: ../index.php?url=image&idGallery=$idGallery&error=stmtError");
                exit();
            }
            header("location: ../index.php?url=image&idGallery=$idGallery&error=commentSucess");

            $sql = "SELECT notify FROM users WHERE users_id = '$users_id'" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch();
            $notify = $row['notify'];

            if ($notify==="yes"){    
            $this->sendNotificationOwner($idGallery, $postUser);
            }


            $stmt = NULL;
            exit();
        }
          
    }

    public function sendNotificationOwner($idGallery, $postUser)
    {
        //fecth variable grace a foreign key
        
        $sql="SELECT users_email, users_uid FROM gallery JOIN users ON gallery.users_id=users.users_id WHERE idGallery='$idGallery'";
     
        $stmt = $this->connect()->query($sql);
        $row=$stmt->fetch();
        $email=$row["users_email"];
        $users_uid=$row["users_uid"];
        
        // header("location: ../index.php?url=image&idGallery=$idGallery&error=commentSucess&$email");

        //Envoie email
        
        $APP_URL = 'http://localhost/';
        $SENDER_EMAIL_ADDRESS = 'no-reply@camagru42.fr';
        // set email subject & body
        $link_photo= $APP_URL."index.php?url=image&idGallery=$idGallery";
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


$idGallery = $_POST['idGallery'];
// print_r($idGallery);
$postUser = $_POST['useruid'];
$postContent = $_POST['content'];
$users_id =$_POST['userid'];

$imageFormManage = new ImageFormManage;
$imageFormManage->setComment($idGallery, $postUser, $postContent, $users_id);



?>