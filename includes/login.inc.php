<?php

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (isset($_POST['type'])) {
        loginStudent($conn, $email, $password);
    } else {
        loginRecruiter($conn, $email, $password);
    }
} else {
    header("location: ../controllers/login.php");
    exit();
}
