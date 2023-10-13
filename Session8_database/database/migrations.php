<?php

$config = require_once ROOT . 'config.php';

// =============== Create Connection to database =============
$database_connection = mysqli_connect(
    $config['database']['host'],
    $config['database']['user'],
    $config['database']['password'],
    "",
    port: $config['database']['port'],
);

// =============== Create database with SQL =============

try {
    $stmt = "CREATE DATABASE IF NOT EXISTS notes_vmax_eraasoft";
    mysqli_query($database_connection, $stmt);

    // =============== Select the our recent database =============
    mysqli_select_db($database_connection, 'notes_vmax_eraasoft');

    // =============== Create Table of Users with SQL =============
    mysqli_query($database_connection, "CREATE TABLE IF NOT EXISTS users (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `email` varchar(255) NOT NULL UNIQUE,
        `password` varchar(255) NOT NULL
    );");

    // =============== Create Table of Notes with SQL =============
    mysqli_query($database_connection, "CREATE TABLE IF NOT EXISTS notes (
        `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `content` text NOT NULL,
        `user_id` int(11),
        FOREIGN KEY ( user_id ) REFERENCES users(id)
    );");
} catch (mysqli_sql_exception $e) {
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
    exit();
}