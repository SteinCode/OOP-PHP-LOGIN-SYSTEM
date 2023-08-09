<?php

class Signup extends Dbh
{
    protected function checkUser($uid, $email)
    {
        $statement = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ? OR users_email = ?;');

        if ($statement->execute(array($uid, $email))) {
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