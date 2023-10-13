<?php

global $database_connection;

$note_content = $_POST["note-content"];
// dd($note_content);
$user_id = $_POST["user_id"];

$errors = [];

if (strlen($note_content) < 3) {
    $errors["string"] = "You Must Enter At least one 3 char";
}

if (count($errors) > 0) {
    $heading = "Create Note";
    view("notes/create.view.php", compact("errors", "heading")); // new way (compact)
    return;
}

$content = mysqli_real_escape_string($database_connection, $note_content);
$user_id = mysqli_real_escape_string($database_connection, $user_id);
mysqli_real_query($database_connection, "INSERT INTO notes (`id`, `content`, `user_id`) VALUES (NULL, '$content', $user_id)");
redirect("/notes");
exit();