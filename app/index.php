<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/HeaderFooter.css">
    <title>Chilee's Camagru</title>
   
   
</head>

<body>

    <?php
    include("views/header.php")
    ?>
    
    <?php
    require_once('controllers/Router.php');
    $router = new Router();
    $router->routeReq();
    ?>
    
    <?php
    include("views/footer.php")
    ?>
   
</body>

</html>
