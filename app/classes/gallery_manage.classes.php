
<?php

require_once('./classes/dbh.classes.php');
class GalleryManage extends Dbh
{
    public function showGallery()
    {
    $sql= "SELECT * FROM `gallery` ORDER BY `gallery`.`idGallery` ASC";
    $stmt = $this->connect()->query($sql);
    while($row =$stmt->fetch())
    {
        echo '
        <div class="img_bloc_gallery">
        <a class="txt_color" href="../index.php?url=image&idGallery='.$row["idGallery"].'">
       
        <div class="photo_gallery" style="background-image: url('.$row["path"].');"></div>
        <h3>'.$row["nameGiven"].'</h3> 
        </a>
        
        </div>
        ';


    }
}

}
?>

