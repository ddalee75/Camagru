<?php
session_start(); 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/login.css">
    <title>Chilee's Camagru</title>
</head>
<body>
<div class="all">
    <div class="global">
        <div class="logo">
            <center><img src="../common/img/logo.png" width="300px"></center>
        </div>
        <div class="login">
            <h3>Confirm email has been send to you !</h3>
            <p>Please activate your email first !!!</p>
            <form action="http://localhost/index.php" method="post">
                
                <div class="bn"><button type="submit" name="submit">LOGIN</button></div>
            </form>
        </div>
       
       
    </div>    
</div>


      
  

</body>
</html>