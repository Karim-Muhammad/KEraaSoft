<?php
ini_set('file_uploads', 'On');

// phpinfo();
$BASE_URL = __DIR__ . '/../';
require_once $BASE_URL . "bootstrap.php";

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

$url = $_SERVER["REQUEST_URI"];

$uri = parse_url($url, PHP_URL_PATH);
// $query = parse_url($url, PHP_URL_QUERY);

$router->route($method, $uri);
