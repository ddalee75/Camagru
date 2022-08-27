<?php 
require_once('./dbh.classes.php');

$idGallery= $_POST['idGallery'];
$userid= $_POST['userid'];

// header("location: ../index.php?url=image&idGallery=$userid");
// header("Refresh:0; url=../index.php?url=image&idGallery=$userid");

$sql= "SELECT * FROM gallery WHERE idGallery = '$idGallery'" ;
$conn = new Dbh;
$stmt = $conn->connect()->prepare($sql);
$stmt->execute();
$row=$stmt->rowCount();
$rowF=$stmt->fetch();
$users_id=$rowF['users_id'];
// header("location: ../index.php?url=image&idGallery=$users_id");

if($row===1 && $userid===$users_id){
    //supprimer les commentaires lie avec
    $sql ="DELETE FROM comment WHERE idGallery = '$idGallery'";
    $stmt = $conn->connect()->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM gallery WHERE idGallery = '$idGallery'";
    $stmt = $conn->connect()->prepare($sql);
    $stmt->execute();
    header("location: ../index.php?url=gallery&error=imageDel");
    $stmt = null;
}
else{
    header("location: ../index.php?url=image&idGallery=$idGallery&error=notYourPhoto");
}


