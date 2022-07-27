<?php
//Grabbing the data
if(isset($_POST["submit"]))
{
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

// Instantiate SignupContr class
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php;"
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email)

}