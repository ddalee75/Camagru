<?php 
require_once('./dbh.classes.php');
$t = $_GET['t'];


if(isset($_GET['idGallery']) AND !empty($_GET['idGallery'])) {

    $t = $_GET['t'];
    $idGallery = $_GET['idGallery'];
    $userid= $_GET['userid'];
    //check si y a limage
    $sql= "SELECT * FROM gallery WHERE idGallery = '$idGallery'" ;
    $conn = new Dbh;
    $stmt = $conn->connect()->prepare($sql);
    $stmt->execute();
    $row =$stmt->rowCount();
    if($row === 1){
        //si like clic
        if($t === "1"){

            $sql= "SELECT idGallery FROM likes WHERE idGallery = ? AND users_id =?";
            $stmt = $conn->connect()->prepare($sql);
            $stmt->execute(array($idGallery, $userid));
            $check_like = $stmt->rowCount();
            
            //check si meme user a deja liker sioui del like en cliquant 2 fois
            if ($check_like === 1){
                $sql= "DELETE FROM likes WHERE idGallery = '$idGallery' AND users_id = '$userid'";
                $stmt = $conn->connect()->prepare($sql);
                $stmt->execute();
    
                $stmt = null;
                header("location: ../index.php?url=image&idGallery=$idGallery");
                exit();

            }else{

            $sql= "INSERT INTO likes (idGallery, users_id) VALUES (?, ?)";
            $stmt = $conn->connect()->prepare($sql);
            $stmt->execute(array($idGallery, $userid));

            $stmt = null;
            header("location: ../index.php?url=image&idGallery=$idGallery");
            exit();
            
            }
        }
    }else{
        exit("error");
    }



}else{
    exit("error");
}