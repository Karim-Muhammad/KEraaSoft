<?php

global $database_connection;

$id = $_GET["id"]; // Weird, right? see file show.view.php

$note = mysqli_query($database_connection, "SELECT * FROM notes WHERE id = $id")->fetch_assoc();

view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "note" => $note,
]);

exit();