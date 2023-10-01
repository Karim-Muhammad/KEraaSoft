<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    view("register.view.php");
    return;
}

// session_start();

// Read files to check if user exist in file or not
$file_path = base_path("database/users.json");
$users = json_decode(file_get_contents($file_path), true); // true to return array instead of object;

// Validate Inputs
$errors = validateKeys($_POST, ["fullname", "email", "password"]);
setFlash("old", $_POST);

if (empty($errors)) {

    // Gather Data
    foreach ($_POST as $key => $value) {
        $$key = purify($value);
    }

    // Group
    $user = compact("fullname", "email", "password");

    // Check if Email Exist already or not
    foreach ($users as $kuser) {
        if ($kuser["email"] === $email) {
            $errors["register-auth"] = "Email already exist";
            header("Location: /register");
            die(); // without die() the script will continue to run
        }
    }


    // Validate Data
    if (
        !validate($fullname, fn($input) => strlen($input) >= 4 && preg_match("/[a-zA-Z\s]+/", $input))
    )
        $errors["fullname"] = "Fullname must be at least 4 characters and only letters are allowed";

    if (!email($email))
        $errors["email"] = "Email is not valid";

    if (
        !validate($password, fn($input) => preg_match("/[a-zA-Z0-9!@#$%^&*()_]+/", $input))
    )
        $errors["password"] = "Password must contain at least one lowercase, uppercase, number and special character";


    if (!empty($errors)) {
        setFlash("errors", $errors);
        header("Location: /register");
        die();
    }

    // Add to users array
    $users[] = [
        ...$user,
        "password" => password_hash($password, PASSWORD_DEFAULT),
        "id" => count($users),
    ];


    // Save to file
    file_put_contents($file_path, json_encode($users));
    header("Location: /login");
} else {
    header("Location: /register");
}