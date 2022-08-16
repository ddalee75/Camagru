
    <header class="navbar">
              
        <?php
            if(isset($_SESSION["userid"]))
            {
        ?>
            <div class="logo_header">
            <a href="../index.php?url=home">
            <img src="http://localhost/common/img/logo.png" width="150px"></a>
            <div class="nav_1_header">
          
            </div>
            </div>
            
            <div class="userinfo_header">
            <p>Welcome ( <?php echo $_SESSION["useruid"]; ?> )
            <a href="../controllers/ControllerLogout.php" class="">Logout</a></p>
            
        <?php } ?>
       
    </header>

   

