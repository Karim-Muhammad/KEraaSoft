<?php

const ROOT = __DIR__ . "/../";


require_once ROOT . "bootstrap.php";

$URI = parse_url($_SERVER["REQUEST_URI"]);

$uri = $URI['path'];
$query = $URI['query'] ?? null;

$method = $_POST['_method'] ?? $_SERVER["REQUEST_METHOD"];

$routes = require_once ROOT . "routes.php";
route($routes, $uri, $method);