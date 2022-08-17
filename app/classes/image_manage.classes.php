<?php
require_once('./classes/dbh.classes.php');
class ImageManage extends Dbh
{
    public function showImage($orderGallery)
    {
    $sql= "SELECT * FROM gallery WHERE orderGallery = '$orderGallery'" ;
    
    $stmt = $this->connect()->query($sql);
    $row=$stmt->fetch();
echo '
  
        <div class="titre_image">
            <h2> '.$row["nameGiven"].'</h2>
        </div>

        <div class="show_image">
        <img src="'.$row["path"].'"></img>
        </div>

        <div class="like_image">
        <p>Like</p>
        </div>
 
    ';
    }
}    
?>