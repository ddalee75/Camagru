<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/ResetPassword.css">
    <title>Chilee's Camagru</title>
</head>
<body>
<div class ="all">
    <div class="group">

        <div class="logo">
            <img src="http://localhost/common/img/logo.png" width="300px">
        </div>
        <?php
            $email = $_GET["email"];
            $TokenPWD = $_GET["activation_code"];        
            
            if (empty($email) || empty($TokenPWD))
            {
                echo "Email and ToKen request needed!";
                exit();
            }
        ?>

        <div class="login">
        <center><h3>Reset your new password</h3></center>
           
        <form action="../classes/create_new_password.classes.php" method="post">
                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="TokenPWD" value="<?php echo $TokenPWD ?>">
                <input type="password" name="resetpwd" placeholder="Enter new password"><br>
                <input type="password" name="repeatpwd" placeholder="Repeat your password"><br>
                
                <div class="bn"><button type="submit" name="reset_submit">Create</button></div>
            </form>
        </div>
        
        <div class="message">
            <?php 
                   
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "EmptyInput"){
                            echo 'Empty Input';
                        }
                        if($_GET["error"] == "PasswordNotMatch"){
                            echo "Password don't match";
                        }               
                    }
            ?>
        </div>
     
        
        
        
    </div>    
</div>

      
  

</body>
</html>