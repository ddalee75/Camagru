<?php
require_once('./dbh.classes.php');


function uploadToDB($imgFullName, $dest){
$nameGiven = "By ching";
$userid= "2";

$conn = new Dbh;
$sql = "SELECT * FROM gallery";
              
    $stmt = $conn->connect()->prepare($sql);
    $stmt->execute();
    $row= $stmt->rowCount();
    $setImageOrder = $row +1;


$sql = "INSERT INTO gallery (namegiven, imgFullNameGallery, orderGallery, path, users_id) VALUES(?, ?, ?, ?, ?);";
$stmt = $conn->connect()->prepare($sql);
if(!$stmt->execute(array($nameGiven, $imgFullName, $setImageOrder, $dest, $userid)))
{
$stmt = null;
header("location: ../index.php?url=camera&error=stmtfailed");
exit();
}

$conn = null;


    // print_r($userid);


}