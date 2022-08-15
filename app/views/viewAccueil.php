<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/accueil.css">
    <title>Chilee's Camagru</title>
</head>
<body>
<div class="all">
    
    <div class="bloc_accueil">
   
        <div class="logo">
            <center><img src="http://localhost/common/img/logo.png" width="300px"></center>
        </div>
        
        <div class="errormessage">
        <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"] == "ConfirmEmailFirst"){
                        echo 'Confirm your Email First!';
                    }
                    if($_GET["error"] == "emptyinput"){
                        echo 'Empty input !';
                    }
                    if($_GET["error"] == "usernotfound"){
                        echo 'User not found';
                    }
                    if($_GET["error"] == "wrongpassword"){
                        echo 'Worng password';
                    }
                    if($_GET["error"] == "stmtfailed"){
                        echo 'Statment failed';
                    }
                    if($_GET["error"] == "useroremailtaken"){
                        echo 'User or email taken';
                    }
                    if($_GET["error"] == "passwordmatch"){
                        echo 'Password not match!';
                    }
                    if($_GET["error"] == "email"){
                        echo 'Invalid Email';
                    }
                    if($_GET["error"] == "username"){
                        echo 'Invalid username';
                    }
                    if($_GET["error"] == "passwordnotstrong"){
                        echo 'Password need at least one capital letter';
                    }
                    
                }
            
            ?>
        </div>
        
        <div class="login">
            <div class="login_h3">LOGIN</div>
            <div class ="login_txt">Please login if you have an account!</div>
            <form action="http://localhost/controllers/ControllerLogin.php" method="post">
                <input type="text" name="uid" placeholder="User name"><br>
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <div class="bn"><button type="submit" name="submit_login">LOGIN</button></div>
            </form>
        </div>
        
        <div class="pwdforgot">
              <a href="http://localhost/index.php?url=Resetpassword">Forgot your password?</a>
        </div>
          
        
        <div class="signup">
            <div class="signup_h3">SIGN UP</div>
            <div class="signup_txt">Don't have an account yet?<br> Sign up here!</div>
            <form action="http://localhost/controllers/ControllerSignup.php" method="post">
                <input type="text" name="uid" placeholder="User name"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <div class="bn"><button type="submit" name="submit">SIGN UP</button></div>
            </form>
        </div>

        
    </div>    
</div>


      
  

</body>
</html>