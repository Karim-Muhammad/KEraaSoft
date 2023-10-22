<?php

/**
 * Purify
 */

function purify($input)
{
    return htmlentities(trim($input), ENT_QUOTES, "UTF-8");
}

/**
 * Slugify
 */

function slugify($input)
{
    $input = strtolower($input);
    $input = str_replace(" ", "-", $input);
    return $input;
}

/**
 * Dump and Die
 */
function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    exit();
}

/**
 * Get the base path of the project
 */
function base_path($path)
{
    global $BASE_URL;
    return $BASE_URL . $path;
}

/**
 * Render a View with Data
 */
function view(string $view, array $data = [])
{
    extract($data);

    require_once base_path("views/$view.php");
    // exit();
}

function redirect($path)
{
    header("Location: $path");
    exit();
}

function render_nav($auth)
{
    $routes_links = [
        "/" => "Home",
        "/about" => "About",
        "/products" => "Products",
    ];



    return $routes_links;
}