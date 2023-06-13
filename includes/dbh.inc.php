<?php

$HOST_NAME = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "internhub";
$PORT = 3306;

try {
    $conn = mysqli_connect($HOST_NAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $PORT);

    if (!$conn) {
        throw new Exception(mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Error connecting to the database" . $e->getMessage();
}
