<?php
    // Show error message instead of "Error 500" blank page.
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Start a session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/internhub/views/styles/main.css">
    <link rel="stylesheet" href="/internhub/views/styles/internship_post.css">
    <?php
        if ($_SERVER['REQUEST_URI'] === '/internhub/controllers/my_posts.php') {
            echo '<link rel="stylesheet" href="/internhub/views/styles/my_posts.css">';
        }
    ?>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <?php
        $css_files = array (
            "register.php" => "register",
            "login.php" => "login"
        );

        $page = basename($_SERVER['PHP_SELF']);
        $css_file = isset($css_files[$page]) ? $css_files[$page] : '';
        if (!empty($css_file)){
            echo '<link rel="stylesheet" href="/internhub/views/styles/' . $css_file . '.css">';
        }
    ?>
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <title>InternHuB</title>
</head>
<body>
