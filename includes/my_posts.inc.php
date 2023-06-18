<?php

session_start();

require_once "../functions.php";
require_once "dbh.inc.php";
require_once "functions.inc.php";
require_once "functions.my_posts.inc.php";

$postTitle = mysqli_real_escape_string($conn, $_POST['postTitle']);
$postDescriptionProcessed = arrayToString(explode("\n", $_POST["postDescription"]), ";");
$postRequirementProcessed = arrayToString(explode("\n", $_POST["postRequirement"]), ";");
$rID = $_SESSION['recruiterID'];
$postQualificationsProcessed = arrayToString(explode("\n", $_POST["postQualification"]), ";");
$postBenefitsProcessed = arrayToString(explode("\n", $_POST["postBenefit"]), ";");
$deadline = date('Y-m-d', strtotime($_POST['deadline']));

$query = "INSERT INTO recruiter_posts (postTitle, postDescription, postRequirement, rID, postQualifications, postBenefits,deadline) VALUES (?, ?, ?, ?, ?, ?, ?);";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $query)) {
    header("location: ../controllers/my_posts.php?error=stmt_error");
    exit();
}

mysqli_stmt_bind_param($stmt, "sssisss", $postTitle, $postDescriptionProcessed, $postRequirementProcessed, $rID, $postQualificationsProcessed, $postBenefitsProcessed, $deadline);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
