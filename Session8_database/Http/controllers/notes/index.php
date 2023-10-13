<?php

global $database_connection;

// user_id should comes from the session
$user_id = 1;
$notes = mysqli_query($database_connection, "SELECT * FROM notes where user_id = $user_id")->fetch_all(MYSQLI_ASSOC);

// dd($notes);

view("notes/index.view.php", [
    "heading" => "Notes",
    "notes" => $notes,
]);


/**
 * POST, PUT, DELETE, are not item potent, means that if you call them multiple times, they will change the state of the application
 * so you canont use anchor tag to call them, you have to use form tag or ajax
 */

exit();