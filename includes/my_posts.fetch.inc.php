<?php

session_start();

require_once "dbh.inc.php";
require_once "functions.inc.php";
require_once "functions.my_posts.inc.php";
require_once "../functions.php";

$rID = $_SESSION['recruiterID'];
$query = "SELECT * FROM recruiter_posts WHERE rID = ?;";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $query)) {
    header("location: ../controllers/my_posts.php?error=stmt_error");
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $rID);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$json = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));

header("Content-Type: application/json");
echo $json;
