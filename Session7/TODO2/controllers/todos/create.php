<?php


$errors = getFlash("errors") ?? [];
$old = getFlash("old") ?? [];
$fields_count = getFlash("fields_count") ?? 1;

view("todos/create.view.php", [
    "errors" => $errors,
    "old" => !count($errors) ?? $old,
    "fields_count" => $fields_count
]);
return;