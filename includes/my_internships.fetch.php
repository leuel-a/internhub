<?php

session_start();

require_once "../functions.php";
require_once "dbh.inc.php";


$sID = $_SESSION['studentID'];
$query = "SELECT postTitle, postBenefits, postDescription, postRequirement, postQualifications, recruiter_posts.deadline AS deadline, student_internships.applicationStatus AS appStatus, student_internships.applicationOrSaveDate AS aDate FROM recruiter_posts INNER JOIN student_internships ON (student_internships.pID = recruiter_posts.postID) INNER JOIN students ON (student_internships.sID = students.studentID) WHERE students.studentID = ?;";

// $query = "SELECT * FROM recruiter_posts WHERE sID = ?;";

$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $query)) {
    header("location: ../controllers/my_posts.php?error=stmt_error");
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $sID);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$json = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));

header("Content-Type: application/json");
echo $json;
