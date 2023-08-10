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

    public function signupUser()
    {
        if ($this->emptyInput()) {
            echo "<script>console.log('emptyInput');</script>";
            header("location ../index.php?error=emptyinput");
            exit();
        }
        if ($this->invalidUid()) {
            echo "<script>console.log('invalidUid');</script>";
            header("location ../index.php?error=username");
            exit();
        }
        if ($this->invalidEmail()) {
            echo "<script>console.log('invalidEmail');</script>";
            header("location ../index.php?error=email");
            exit();
        }
        if ($this->pwdNotMatch()) {
            echo "<script>console.log('pwdNotMatch');</script>";
            header("location ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck()) {
            echo "<script>console.log('uidTakenCheck');</script>";
            header("location ../index.php?error=usertaken");
            exit();
        }
        if ($this->emailTakenCheck()) {
            echo "<script>console.log('emailTakenCheck');</script>";
            header("location ../index.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput()
    {
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            return true;
        } else {
            return false;
        }
    }
    private function invalidUid()
    {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            return true;
        } else {
            return false;
        }
    }
    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    private function pwdNotMatch()
    {
        if ($this->pwd !== $this->pwdRepeat) {
            return true;
        } else {
            return false;
        }
    }

    private function uidTakenCheck()
    {
        if ($this->checkUidTaken($this->uid)) {
            return true;
        } else {
            return false;
        }
    }

    private function emailTakenCheck()
    {
        if ($this->checkEmailTaken($this->email)) {
            return true;
        } else {
            return false;
        }
    }

}