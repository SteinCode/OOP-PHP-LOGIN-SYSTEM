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
    protected function checkUser($uid, $email)
    {
        $statement = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ? OR users_email = ?;');

        if (!$statement->execute(array($uid, $email))) {
            $statement = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if ($statement->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }



}