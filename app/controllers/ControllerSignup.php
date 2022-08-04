<?php
//Grabbing the data
if(isset($_POST["submit"]))
{
    
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $email = $_POST["email"];

// Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup_ctl.classes.php";
    include "../classes/confirm_email.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

// Running error handlers and user signup

    $signup->signupUser();
    
    $confirm = new ConfirmEmail();
    $confirm->send_activation_email($uid);
    
    
// Going to back to front page
  require_once('../views/viewLogin.php');
}