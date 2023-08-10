<?php

if (isset($_POST["submit"])) {

    // Grabbing data

    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    // Include files
    include "../classes/dbh.classes.php";
    include "../classes/login-model.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new LoginContr($uid, $pwd);

    $login->loginUser();

    header("location: ../index.php?error=none");
}