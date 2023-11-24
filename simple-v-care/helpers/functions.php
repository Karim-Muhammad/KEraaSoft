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

function app($path)
{
    return base_path("App/$path");
}

function admin_assets($path)
{
    return "/admin/assets/{$path}";
}

function file_upload($file)
{

    if (empty($file['name']))
        return false;

    // dd($file);
    $uploads = base_path('public/uploads/');
    $target_file = $uploads . basename($file["name"]);

    $check = getimagesize($file["tmp_name"]);

    if ($check) {
        move_uploaded_file($file["tmp_name"], $target_file);
    } else {
        return false;
    }
    return true;
}

/**
 * Render a View with Data
 */
function view(string $view, array $data = [])
{
    extract($data);

    require_once base_path("App/Views/$view.php");
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