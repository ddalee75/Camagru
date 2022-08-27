<?php
require_once('./classes/dbh.classes.php');
class ImageManage extends Dbh
{

   
    public function showImage($idGallery)
    {
   
    // $preview= $idGallery-1;
   
    $sql= "SELECT * FROM gallery WHERE idGallery = '$idGallery'" ;
    
    $stmt = $this->connect()->query($sql);
    $row=$stmt->fetch();
echo '
  
        <div class="titre_image">
            <h2> '.$row["nameGiven"].'</h2>
        </div>

        <div class="show_image">
        <img src="'.$row["path"].'"></img>
        </div>

       
    
    ';
    }


   
}    
?>

