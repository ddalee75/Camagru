<?php
include('./dbh.classes.php');
include('./reset_password_etape2.classes.php');

class CreateNewPassword extends CheckResetPwd
{
    // public function __construct()
    // {
    //     $email = $_GET["email"];
    //     $token = $_GET["token"];
    // }

    public function Check2Password($email, $token)
    {

        $pwdOne = $_POST['resetpwd'];
        $pwdTwo = $_POST['repeatpwd'];

        if (!empty($pwdOne) && !empty($pwdTwo))
        {
            if ($pwdOne !== $pwdTwo)
            {
                header("location: ../index.php?url=Createnewpassword&error=PasswordNotMatch&&email=$email&&token=$token");
            }


        }
        else
        {
            header("location: ../index.php?url=Createnewpassword&error=EmptyInput&&email=$email&&token=$token");
        }

    }

}


//comment recuperer email et token ici ???
$createnew = new CreateNewPassword();
$createnew->Check2Password($email, $token);