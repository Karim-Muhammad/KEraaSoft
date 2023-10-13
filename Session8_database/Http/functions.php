<?php

declare(strict_types=1);

function findRoute(array $routes, string $path, string $method): array
{
    $routes_URIs = array_keys($routes);

    foreach ($routes_URIs as $route) {
        if ($route === $path && isset($routes[$route]["actions"][$method])) {
            authMiddleware($routes[$route] ?? []);
            return $routes[$route];
        }
    }
    return [];
}

function route(array $routes, string $path, string $method): void
{
    $route = findRoute($routes, $path, $method);

    if (!$route) {
        view("error_view.php", ["error_code" => "404 Not Found", "heading" => "Not Found"]);
        exit();
    }

    $Method = $method;
    require_once base_path("Http/controllers/{$route['actions'][$Method]}");
}

function previousUrl(): string
{
    return $_SERVER["HTTP_REFERER"] ?? "/";
}

function isGuest()
{
    return !isset($_SESSION["user"]);
}

function isAuth()
{
    return isset($_SESSION["user"]);
}

function authMiddleware(array $route)
{
    if (in_array('auth', $route["only"] ?? []) && !in_array("guest", $route['only']) && isGuest()) {
        redirect("/login");
        exit();
    }
}