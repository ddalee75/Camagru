<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./common/css/home.css">
    <title>Chilee's Camagru</title>
</head>
<body>
    
    <div class="bloc1">
        <div class="logo">
            <img src="./common/img/logo.png" width="300px">
        </div>
        <div class="login">
            <h3>LOGIN</h3>
            <p>Please login if you have an account!</p>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="User name"><br>
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <div class="bn"><button type="submit" name="submit">LOGIN</button></div>
            </form>
        </div>
        <div class="signup">
            <h3>SIGN UP</h3>
            <p>Don't have an account yet?<br> Sign up here!</p>
            <from action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="User name"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <div class="bn"><button type="submit" name="submit">SIGN UP</button></div>
            </from>
        </div>
    </div>    


      
  

</body>
</html>