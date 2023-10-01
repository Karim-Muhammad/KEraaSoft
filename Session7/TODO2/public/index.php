<?php
ini_set('display_errors', 1);
date_default_timezone_set('Africa/Cairo');

session_start();


// Setup Global Constants

const ROOT = __DIR__ . "/../";
require_once ROOT . "Core/functions.php";


// Parsing Current URL
$Uri = $_SERVER["REQUEST_URI"];
$Uri = parse_url($Uri);
$path = $Uri["path"];
// $query = [];
// parse_str($Uri["query"], $query);

// Routing
$ROUTES = require_once ROOT . "routes.php";
$LINKS = getRoutable($ROUTES);

require_once routeToController($path, $ROUTES);