<?php

//Grabbing the data
if(isset($_POST["submit_login"]))
{
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

// Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login_ctl.classes.php";
    $login = new LoginContr($uid, $pwd);

// Running error handlers and user signup

    $login->loginUser();
    require_once('../views/viewHome.php');

}