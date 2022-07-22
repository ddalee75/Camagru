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
        <div class="login">
            <h3>LOGIN</h3>
            <p>Please login if you have an account!</p>
            <form action="models/login.php" method="post">
                <input type="text" name="uid" placeholder="Username"><br>
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
        <div class="signup">
            <h3>SIGN UP</h3>
            <p>Don't have an account yet?<br> Sign up here!</p>
            <from action="models/signup.php" method="post"><br>
                <input type="text" name="uid" placeholder="Username"><br>
                <input type="password" name="pwd" placeholder="Password"><br>
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
                <input type="text" name="email" placeholder="E-mail">
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </from>
        </div>
    </div>
      
  

</body>
</html>