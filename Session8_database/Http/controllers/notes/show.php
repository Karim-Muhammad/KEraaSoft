<?php

// dd($_GET);
global $database_connection;

// user_id should comes from the session
$user_id = 1;
$note_id = $_GET["id"];

$note = mysqli_query($database_connection, "SELECT * FROM notes where id = $note_id")->fetch_assoc();

view("notes/show.view.php", [
    "heading" => "Note",
    "note" => $note,
]);

exit();