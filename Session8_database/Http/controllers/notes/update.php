<?php


global $database_connection;

$id = $_POST["id"];
$user_id = $_POST["user_id"];
$content = $_POST["note-content"];


// Check length of content
if (strlen($content) < 3) {
    view("notes/edit.view.php", [
        "heading" => "Edit Note",
        "note" => $note,
        "errors" => [
            "string" => "Must have at least 3 characters"
        ],
    ]);
    exit();
}

mysqli_query($database_connection, "UPDATE notes SET `content` = '$content' WHERE `id` = '$id'");

redirect("/notes");
exit();