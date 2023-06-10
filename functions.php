<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

/**
 * urlIs - checks what url we are in
 *
 * Return: On success, it returns True. On error, it returns -1, and
 * errno is set appropratley.
 */
function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}


/**
 * get_stylesheet_directory - get the stylesheet directory of the
 * current directory
 */
function get_stylesheet_directory_uri() {
    // Get the directory of the current file.
    $current_directory = __DIR__;

    // Get the path to the stylesheet directory.
    $stylesheet_directory_uri = $current_directory . '/styles';

    // Return the URI of the stylesheet directory.
    return $stylesheet_directory_uri;
  }

