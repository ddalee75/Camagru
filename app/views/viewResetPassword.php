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

    <div class="group">

        <div class="logo">
            <img src="http://localhost/common/img/logo.png" width="300px">
        </div>
        <div class="login">
        <center><h3>Reset your password</h3>
            <p>Please enter your email!</p></center>
            <form action="http://localhost/controllers/ControllerResetpwd.php" method="post">
                <input type="text" name="email" placeholder="your email"><br>
                
                <div class="bn"><button type="submit" name="reset_pwd">Reset</button></div>
            </form>
        </div>
        
        
        
        
    </div>    


      
  

</body>
</html>