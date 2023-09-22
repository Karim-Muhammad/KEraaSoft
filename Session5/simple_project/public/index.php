<?php

    // Setup Global Constants

    const ROOT = __DIR__."/../";
    require_once ROOT."Core/functions.php";


    // Parsing Current URL
    $Uri = $_SERVER["REQUEST_URI"];
    $Uri = parse_url($Uri);
    $path = $Uri["path"];
    // $query = [];
    // parse_str($Uri["query"], $query);


    // Routing
    $ROUTES = require_once ROOT."routes.php";
    routeToController($path, $ROUTES);