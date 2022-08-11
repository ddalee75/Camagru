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
    <div class="all">
    <div class="group">

        <div class="logo">
        
            <center><img src="http://localhost/common/img/logo.png" width="300px"></center>
        </div>
        <div class="login">
        <center><h3>Reset your password</h3>
            <p>Please enter your email!</p></center><br>
            <form action="http://localhost/classes/reset_password.classes.php" method="post">
                <input type="text" name="verify_email" placeholder="your email"><br>
                <div class="bn"><button type="submit" name="reset_pwd">Reset</button></div>
            </form>
        </div>
        <div class="message">
            <?php 
                    if(isset($_GET["error"]))
                    {
                        if($_GET["error"] == "CheckYourEmail"){
                            echo 'Please check your Email';
                        }
                        if($_GET["error"] == "EmailNotFound"){
                            echo 'No this user';
                        }
                  
                        if($_GET["error"] == "PleaseInputEmail"){
                            echo 'Please Input Your email';
                        }
                        
                        if($_GET["error"] == "TokenExpire"){
                            echo 'Token Expire, please resend the request';
                        }
                        
                        if($_GET["error"] == "TokenOrEmailNoMatch"){
                            echo 'Token or Email not match, please resend the request';
                        }
                    }
            ?>
        </div>
     
    </div>  
    </div>  

</body>
</html>