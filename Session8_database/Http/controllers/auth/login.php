<?php

redirect('/');

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    return view("auth/login.view.php", [
        "title" => "Login",
        "errors" => $_SESSION['__flash']["errors"] ?? [],
        "inputs" => $_SESSION['__flash']["inputs"] ?? [],
    ]);

    // exit(); // prevented my root(index.php) from continuing
}

// cool way
foreach ($_POST as $key => $value) {
    $$key = $value;
}

// Validate Form Inputs
$form = LoginForm::validate($_POST);

$signIn = (new Authenticator)->login($email, $password);

if (!$signIn) {
    $form
        ->error("auth-msg", "Email or password is not correct!")
        ->throws();
}


redirect("/");