<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $passConfirm = $_POST['passConfirm'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $typeOfAcc = "student" ? isset($_POST["type"]) : "recruiter";

    if (emailCheck($conn, $email, $typeOfAcc)) {
        header("location: ../controllers/register.php?error=email_taken");
        exit();
    } else if (passwordMatch($pass, $passConfirm) === false) {
        header("location: ../controllers/register.php?error=password_do_not_match");
        exit();
    }

    if (isset($_POST['type'])){
        // Valid user can be created, hence call the createUser() function
        createStudent($conn, $name, $email, $pass);
    } else {
        createNewRecruiter($conn, $name, $email, $pass);
    }
} else {
    header("location: ../controllers/register.php");
}
