<?php

class SignupContr extends Signup
{
    private $uid; 
    private $pwd; 
    private $pwdRepeat; 
    private $email; 

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    // checker si les champs sont vide
    private function emptyInput()
    {
        $result;
        if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email))
        {
            $result = false;
        }    
        else {
            $result = true;
        }
        return $result;
    }
    // checker si username (uid) contient bien a-z A-Z et 0-9
    private function invalidUid() 
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
        {
            $result =false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    // checker si email est bien valide
    private function invalidEmail()
    {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        }
        else
        {
            $result = true ;
        }
        return $result;
    }

    // checker si pwd et pwdRepeat sont pareil
    private function pwdMatch()
    {
        $result;
        if($this->pwd !== $this->pwdRepeat)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck()
    {
        $result;
        if(!$this->checkUser($this->uid, $this->email))
        {
            $result = false;
        }
        else
        {
            $result = true;
        }
        return $result;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false)
        {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this->invalidUid() == false)
        {
            // echo "Invalid username!";
            header("location: ../index.php?error=username");
            exit();
        }

        if($this->invalidEmail() == false)
        {
            // echo "Invalid Email!";
            header("location: ../index.php?error=email");
            exit();
        }

        if($this->pwdMatch() == false)
        {
            // echo "Passwords don't match!";
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        if($this->uidTakenCheck() == false)
        {
            // echo "Username ou Email taken!";
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }
}