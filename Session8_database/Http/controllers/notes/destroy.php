<?php

global $database_connection;

mysqli_query($database_connection, "DELETE FROM notes where id = {$_POST['id']}");


redirect("/notes");
exit();