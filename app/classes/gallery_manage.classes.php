<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/gallery.css">
    <title>Chilee's Camagru</title>
    
</head>
<body>
<div class="gallery-container">
<?php

require_once('./classes/dbh.classes.php');
class GalleryManage extends Dbh
{
    public function showGallery()
    {
    $sql= "SELECT * FROM gallery";
    $stmt = $this->connect()->query($sql);
    while($row =$stmt->fetch())
    {
        echo '<a href="#">
        <div class="photo_gallery" style="background-image: url('.$row["path"].');"></div>
        <h3>'.$row["nameGiven"].'</h3>
        </a>';


    }
}

}
?>
</div>
</body>