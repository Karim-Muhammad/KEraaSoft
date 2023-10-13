<?php

session_start();
$_SESSION['user'] = [
    "id" => 1,
    "name" => "Karim",
    "email" => ""
];

require_once ROOT . 'database/migrations.php';
require_once ROOT . "Core/functions.php";
require_once ROOT . "Http/functions.php";