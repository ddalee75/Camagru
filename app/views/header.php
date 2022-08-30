
      <?php
            if(isset($_SESSION["userid"]))
            {
        ?>
    <header>

        <div class="navbar">
            
        
        <div class="env_logo_button">
             <a class="logo_inside" href="http://localhost/index.php?url=home"> </a>
        
        <div class="nav_1_header">
                
                <a class="camera_header" href="http://localhost/index.php?url=camera&page=1">
                <p>Photomaton</p></a>

               
                <a class="album_header" href="http://localhost/index.php?url=gallery">
                <p>Album</p></a>

                <a class="profile_header" href="http://localhost/index.php?url=profile">
                <p>Profile</p></a>

        </div> <!-- fin nav_1_header -->
        </div> <!-- fin env_logo_button -->
            
            
        <div class="userinfo_header">
            <p>Welcome ( <?php echo $_SESSION["useruid"]; ?> )
            <a href="../controllers/ControllerLogout.php">Logout</a></p>
        </div> <!-- fin userinfo_header -->
         
            
      
        </div> <!-- fin navbar -->
        
    </header>

    <?php } ?>

   

