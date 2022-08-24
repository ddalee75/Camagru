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

<div class="contentarea">
        <h1 class="titre1">
            PHOTOMATON
        </h1>
        <div class="wrap">
        <div class="camera">
            <video id="video">Video stream not available.</video>
            <div class="overlay">
            <img id="calque" alt="">
            </div>
        </div>
   
        <canvas id="canvas"></canvas>
        <!-- <div class="output">
            <img id="photo" alt="The screen capture will appear in this box.">
        </div> -->
        <div id="jaxa" style='width:80%;margin:5px;'></div>
        <!-- <button onclick='sauver()'>sauvegarder</button> -->
    </div>
   
    <div class="secteur2">
    <div class="caroussel">
        <?php include("./classes/show_calques.classes.php") ?>       
    </div>
    </div>

    <div><button id="startbutton" >Take photo</button></div>
        
</div>

</body>
</html>

<?php } ?>


