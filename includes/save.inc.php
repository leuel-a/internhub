<?php

session_start();

require_once "dbh.inc.php";
require_once "../functions.php";
require_once "functions.inc.php";

if (isset($_SESSION['studentID'])) {
	$postID = intval($_GET['postID']);
	$sID = $_SESSION['studentID'];

    if (checkAlreadyApplied($sID, $postID, $conn)) {
        http_response_code(400);
        echo "You have already applied for the internship";
    } else if (checkIfSaved($sID, $postID, $conn)) {
        http_response_code(200);
        echo "You have already saved the internship, please see it in my internships section";
    } else {
        saveInternship($sID, $postID, $conn);
        http_response_code(200);
        echo "Congragulation you have successfully saved for the intership";
    }


} else {
	http_response_code(401);
	echo "You must be logged in as a student to save an internship";
}
