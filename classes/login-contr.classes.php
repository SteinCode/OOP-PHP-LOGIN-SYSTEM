<?php

class LoginContr extends Login
{

    private $uid;
    private $pwd;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if ($this->emptyInput()) {
            echo "<script>console.log('emptyInput');</script>";
            header("location ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput()
    {
        if (empty($this->uid) || empty($this->pwd)) {
            return true;
        } else {
            return false;
        }
    }

}