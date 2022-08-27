<?php
require_once('./dbh.classes.php');
// require_once('./show_user_shoot.classes.php');


function uploadToDB($imgFullName, $dest, $userid){
$nameGiven = "";
$userid= $userid;

$conn = new Dbh;
$sql = "SELECT * FROM gallery";
              
$stmt = $conn->connect()->prepare($sql);
// $stmt->execute();
// $row= $stmt->rowCount();
// $setImageOrder = $row +1;



$sql = "INSERT INTO gallery (namegiven, imgFullNameGallery, path, users_id) VALUES(?, ?, ?, ?);";
$stmt = $conn->connect()->prepare($sql);
if(!$stmt->execute(array($nameGiven, $imgFullName, $dest, $userid)))
{
$stmt = null;
header("location: ../index.php?url=camera&error=stmtfailed");
exit();
}

$conn = null;

//   $showShoot= new ShootManage;
//   $showShoot->showShoot($userid)

}