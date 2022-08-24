<?php
require_once('./classes/dbh.classes.php');
class CommentManage extends Dbh
{
    public function showComment($orderGallery)
    {
     
    $sql= "SELECT * FROM comment WHERE orderGallery = '$orderGallery'" ;
    
    $stmt = $this->connect()->query($sql);
    while($row =$stmt->fetch())
    {
    echo '
  
        <div class="titre_image">
            <h4> '.$row["postUser"].'  '.$row["postDate"].'</h4>
            <p> '.$row["postContent"].'</p>
        
        </div>
 
    ';
    }
    }
}    
?>