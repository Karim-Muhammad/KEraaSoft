<?php

    if($_SERVER["REQUEST_METHOD"] === "GET") {
        view("login.view.php");
        return;
    }

    // session_start();
    $file_path = base_path("database/users.json");
    $users = json_decode(file_get_contents($file_path), true); // true to return array instead of object;


    $email = $_POST["email"];
    $password = $_POST["password"];


    foreach($users as $user) {
        if($user["email"] === $email && $user["password"] === $password) {
            $_SESSION["user"] = compact("email", "password");
            header("Location: /");
            return;
        }
    }

    $_SESSION["errors"] = [
        "login-auth" => "Email or Password is incorrect",
    ];

    header("Location: /login");
    return;