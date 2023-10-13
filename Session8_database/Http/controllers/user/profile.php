<?php

    $db = \Core\App::resolve(\Core\Database::class);
    $notes_of_user = $db->query("SELECT * FROM notes WHERE user_id = :user_id", [
        "user_id" => $_SESSION["user"]["id"],
    ])->findAll();


    view("user/profile.view.php", [
        "heading" => "Profile",
        "user" => $_SESSION["user"],
        "notes" => $notes_of_user,
    ]);
    exit();