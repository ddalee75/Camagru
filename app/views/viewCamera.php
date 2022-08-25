<?php
            if(isset($_SESSION["userid"]))
            {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/camera.css">
    <script type="text/javascript" src="../common/js/camera.js"></script>


   
    <title>Chilee's Camagru</title>
    
</head>

<body>

<div class="all_webcam">
    
    <h1 class="titre1">
        PHOTOMATON
    </h1>
    <div class="webcam_center">            
        <div class="webcam">
            <video id="video">Video stream not available.</video>
            <div class="overlay">
            <img id="calque" alt="">
            </div>
        </div>
    </div>


    <canvas id="canvas"></canvas>
      
    <div class="jaxa_css" id="jaxa" style='width:80%;margin:5px;'></div>
       
    <div class="caroussel_center">
    <div class="caroussel">
        <?php include("./classes/show_calques.classes.php") ?>       
    </div>
    </div>
        

    <div calss="button_css"><button id="startbutton" name="userid" value="<?php echo $_SESSION["userid"];?>" >Take photo</button>
    </div>

    <div class="showUserShootEnv"> 
        
        <div class="showUserShoot">
       
        <?php
        
        require_once('./classes/show_user_shoot.classes.php');
            $users_id= $_SESSION["userid"];
            $showShoot= new ShootManage;
            $showShoot->showShoot($users_id)
        ?>
        </div>
   
</div>
        


</div>
          


</body>
</html>

<?php } ?>


