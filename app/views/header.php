
    <header class="navbar">
              

        <?php
            if(isset($_SESSION["userid"]))
            {
        ?>
            <div class="logo_header">
            <a class="logo_inside" href="http://localhost/index.php?url=home">   
            <!-- <a href="../index.php?url=home">
            <img src="http://localhost/common/img/logo.png" width="150px"></a> -->
            </a>
            <div class="nav_1_header">
                
                <a class="camera_header" href="http://localhost/index.php?url=camera">
                <p>Camera</p></a>

               
                <a class="album_header" href="http://localhost/index.php?url=gallery">
                <p>Album</p></a>

                <a class="profile_header" href="http://localhost/index.php?url=profile">
                <p>Profile</p></a>

            </div>
            </div>
            
            <div class="userinfo_header">
            <p>Welcome ( <?php echo $_SESSION["useruid"]; ?> )
            <a href="../controllers/ControllerLogout.php" class="">Logout</a></p>
            
        <?php } ?>
       
    </header>

   

