<?php 
// print_r($_POST['layerSrc']);
//Recuperer image et merge avec filtre
if(!empty($_FILES['image_a'] )){
// $layerSrc = $_FILES['layerSrc'];
$imgFullName = "camera_".uniqid('',true).".png";
$dest = '../common/gallery/'.$imgFullName;

move_uploaded_file($_FILES['image_a']['tmp_name'],$dest);

$src = '../common/calques/'.$_POST['layerSrc'];

// Create image instances
$src = imagecreatefrompng($src);
$desti = imagecreatefrompng($dest);

// Copy merge les deux photos
imagecopy($desti, $src, 0, 0, 0, 0, 460, 345);

// Output and free from memory
header('Content-Type: image/png');
imagepng($desti, $dest);


imagedestroy($desti);
imagedestroy($src);



}else{
  print_r('no image');
}


?>

