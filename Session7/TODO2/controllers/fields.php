<?php

$fields = $_POST['fields_count'] ?? 1;

if ($_POST["action"] === "delete") {
    if ($fields > 1) {
        setFlash("fields_count", ($fields - 1));
    }
    header("Location:" . $_SERVER["HTTP_REFERER"]);
    return;
}

setFlash("fields_count", ($fields + 1));
header("Location:" . $_SERVER["HTTP_REFERER"]);