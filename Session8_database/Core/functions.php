<?php

declare(strict_types=1);

function dd($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";

    die();
}

function purify($input)
{
    return htmlentities(trim($input), ENT_QUOTES, "UTF-8");
}

function authorize(bool $condition): bool
{
    if ($condition === false) {
        abort(403);
        die();
    }
    return true;
}

function abort($code)
{
    return view("error_view.php", ["code" => $code]);
}

function base_path($path)
{
    return ROOT . $path;
}

function redirect($path)
{
    header("Location: $path");
    exit();
}

function login($user)
{
    $_SESSION["user"] = $user;
}

/** remove all cookies, sessions
 * @return void
 */
function view(string $path, ?array $data = []): void
{
    extract($data);
    require_once base_path("views/$path");
    return;
}