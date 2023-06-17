<?php

require_once "../functions.php";

/**
 * checks for whether an email exits in the database
 */
function emailCheck($connection, $email, $type="student") {
    if ($type === "student") {
        $query = "SELECT * FROM students WHERE studentEmail = ?;";
    } else {
        $query = "SELECT * FROM recruiters WHERE recruiterEmail = ?;";
    }

    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../controllers/register.php?error=stmt_error");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result_data = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result_data)) {
        // When there is a user already in the email
        mysqli_stmt_close($stmt);
        return $row;
    }
    mysqli_stmt_close($stmt);
    return false;
}

/**
 * Checks if two passwords match
 *
 * @param string $pass the first password
 * @param string $passConfirm the second password
 *
 * @return bool
 */
function passwordMatch($pass, $passConfirm) {
    return ($pass === $passConfirm);
}

/**
 * Creates an new student and adds the student to the
 * database
 *
 * @param mysqli $connection - connection to the database
 * @param string $name - name of the new student
 * @param string $pass - password of the new student
 * @return None
 */
function createStudent($connection, $name, $email, $pass) {
    $query = "INSERT INTO students (studentName, studentEmail, studentPass) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../controllers/register.php?error=stmt_error");
        exit();
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../controllers/register.php?error=none");
}

/**
 * Logs in a new student to the database
 *
 * @param mysqli $connection - connection to the database
 * @param string $email - email of the student to login
 * @param string $pass - password of the student to login
 *
 * @return None
 */
function loginStudent($connection, $email, $pass) {
    $emailExists = emailCheck($connection, $email);

    if ($emailExists === false) {
        header("location: ../controllers/login.php?error=email_not_found");
        exit();
    }

    $hashed_pass = $emailExists['studentPass'];
    $checkedPass = password_verify($pass, $hashed_pass);
    if ($checkedPass === false) {
        header("location: ../controllers/login.php?error=incorrect_password");
        exit();
    }
    session_start();
    $_SESSION["studentID"] = $emailExists["studentID"];
    $_SESSION["studentName"] = $emailExists["studentName"];
    header("location: ../index.php");
    exit();
}


/**
 * Logs in a new recruiter
 *
 * @param mysqli $connection - connection to the database
 * @param string $email - email of the recruiter to login
 * @param string $pass - password of the recruiter to login
 *
 * @return None
 */
function loginRecruiter($connection, $email, $pass) {
    $emailExists = emailCheck($connection, $email, "recruiter");

    if ($emailExists === false) {
        header("location: ../controllers/login.php?error=email_not_found");
        exit();
    }

    $hashed_pass = $emailExists['recruiterPass'];
    $checkedPass = password_verify($pass, $hashed_pass);
    if ($checkedPass === false) {
        header("location: ../controllers/login.php?error=incorrect_password");
        exit();
    }
    session_start();
    $_SESSION["recruiterID"] = $emailExists["recruiterID"];
    $_SESSION["recruiterName"] = $emailExists["recruiterName"];
    header("location: ../index.php");
    exit();
}


/**
 * Creates an new student and adds the student to the
 * database
 *
 * @param mysqli $connection - connection to the database
 * @param string $name - name of the new recruiter
 * @param string $pass - password of the new recruiter
 */
function createNewRecruiter($connection, $name, $email, $pass) {
    $query = "INSERT INTO recruiters (recruiterName, recruiterEmail, recruiterPass) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("location: ../controllers/register.php?error=stmt_error");
        exit();
    }

    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../controllers/register.php?error=none");
}
