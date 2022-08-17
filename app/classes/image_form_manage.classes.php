<?php
require_once('./dbh.classes.php');

class ImageFormManage extends Dbh
{
    
    public function setForm($orderGallery, $postUser, $postContent)
    {
        if (empty($orderGallery))
        {
            header("location: ../index.php?url=image&orderGallery=$orderGallery&error=imageError");
                exit();
        }
        
        if (isset($_POST['submit']))
        { 
            if(empty($postUser))
            {
                header("location: ../index.php?url=image&orderGallery=$orderGallery&error=emptyUserName");
                exit();
            }
         else{
         
            $sql= "SELECT * FROM comment" ;
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            // $row= $stmt->rowCount();
            // print_r($row+1);
            // if($stmt->fetchColumn() >0)
            // {
                $stmt = $this->connect()->prepare('INSERT INTO comment (postUser, postContent, orderGallery) VALUES (?, ?, ?);');
                $stmt->execute(array($postUser, $postContent, $orderGallery));    
                header("location: ../index.php?url=image&orderGallery=$orderGallery&error=commentSucess");
               


            // }
            // else{
            //     $stmt =null;
           
            //     header("location: ../index.php?url=image&orderGallery=$orderGallery&error=imageError");
            //     exit();
            // }
            
        }
        }
       
    }
}    


$orderGallery = $_POST['orderGallery'];
// print_r($orderGallery);
$postUser = $_POST['name'];
$postContent = $_POST['content'];

$imageFormManage = new ImageFormManage;
$imageFormManage->setForm($orderGallery, $postUser, $postContent);



?>