<?php

class Signup extends Dbh
{
    protected function setUser($uid, $pwd, $email)
    {
        $statement = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$statement->execute(array($uid, $hashedPwd, $email))) {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $statement = null;
    }
    protected function checkUidTaken($uid)
    {
        $statement = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ?;');

        if (!$statement->execute([$uid])) {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function checkEmailTaken($email)
    {
        $statement = $this->connect()->prepare('SELECT users_email FROM users WHERE users_email = ?;');

        if (!$statement->execute([$email])) {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}