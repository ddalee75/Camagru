<?php
require_once('./classes/dbh.classes.php');
class ShootManage extends Dbh
{
    public function showShoot($userid)
    {

    
   
    $sql= "SELECT * FROM gallery WHERE users_id = '$userid'" ;
    
    $stmt = $this->connect()->query($sql);
    while($row =$stmt->fetch())
    {
        echo '
        <div class="img_bloc_Shoot">
        <a class="txt_color" href="../index.php?url=image&orderGallery='.$row["orderGallery"].'">
       
        <div class="photo_Shoot" style="background-image: url('.$row["path"].');"></div>
        <h3>'.$row["nameGiven"].'</h3>
        </a>
        </div>
        ';


    }
    }}    
?>