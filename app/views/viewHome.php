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
    <div class="stmt">
        
        <?php
            if(isset($_SESSION["userid"]))
            {
        ?>
           <p>welcome <?php echo $_SESSION["useruid"]; ?>  
           <a href="../controllers/ControllerLogout.php" class="">LOGOUT</a></p>
        <?php
        
            }

        ?>
    </div>
</head>
<body>

    <div class="bloc1">
        <p>welcome</p>
        
    </div>    


      
  

</body>
</html>