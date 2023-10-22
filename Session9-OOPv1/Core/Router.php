<?php

require_once base_path("Http/Middleware/AuthMiddleware.php");
require_once base_path("Core/Session.php");

class Router
{

    private $routes = [];
    public $visible_routes = [];

    public function add($method, $route, $controller, ?string $name = null)
    {
        $_controller = explode("@", $controller)[0];
        $_action = explode("@", $controller)[1];

        $this->routes[] = [
            "method" => $method,
            "url" => $route,
            "controller" => "Http/Controllers/$_controller.php",
            "action" => $_action,
            "name" => $name
        ];
    }

    /**
     * Adding a route with `GET` method
     */
    public function get($route, $controller, $name)
    {
        $this->add("GET", $route, $controller, $name);
        return $this;
    }
    /**
     * Adding a route with `POST` method
     */
    public function post($route, $controller)
    {
        $this->add("POST", $route, $controller);
        return $this;
    }
    /**
     * Adding a route with `PUT` method
     */
    public function patch($route, $controller)
    {
        $this->add("PATCH", $route, $controller);
        return $this;
    }
    /**
     * Adding a route with `DELETE` method
     */
    public function delete($route, $controller)
    {
        $this->add("DELETE", $route, $controller);
        return $this;
    }

    /**
     * Adding a Authentication Middleware to a route
     */
    public function only($role)
    {
        $this->routes[array_key_last($this->routes)]['role'] = $role;
        return $this;
    }

    private function findRoute($method, $url): array|null
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['url'] === $url) {
                return $route;
            }
        }

        return null;
    }

    public function route($method, $url)
    {
        $route = $this->findRoute($method, $url);
        if (!$route) {
            // TODO: 404 status code
            Session::flash('errors', ['auth-msg' => "Page Not Found!"]);
            redirect("/error");
            exit();
        }
        // TODO: Check if user is logged in [Authentication Middleware]

        AuthMiddleware::handle($route['role'] ?? null);

        $controller = require_once base_path($route["controller"]);
        // echo "<pre>";
        // var_dump($route["action"]);
        // echo "</pre>";

        $action = $route["action"];
        $controller->$action(); // syntax sugar for $controller->index();
    }
}