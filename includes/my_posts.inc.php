<?php

require_once "../functions.php";

dd($_SERVER);

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // get form data from $_POST array
    $name = $_POST['name'];
    $email = $_POST['email'];

    // do something with form data
    // for example, store the data in a database

    // send response back to the client
    $response = array('status' => 'success');
    echo json_encode($response);
    exit;
}
