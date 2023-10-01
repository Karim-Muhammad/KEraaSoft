<?php

$errors = [];
setFlash("old", $_POST);


foreach ($_POST as $data => $value) {
    $$data = $value;
}

if (!string($title)) {
    $errors["title"] = "Title is required";
}

$fields = $_POST['fields'];
foreach ($fields as $field) {
    if (!string($field)) {
        $errors["fields"] = "All Fields is required";
        break;
    }
}

if (count($errors) > 0) {
    setFlash("errors", $errors);
    header("Location: /todos/create");
    exit;
}


$todo = [
    "user_id" => $_SESSION["user"]['id'],
    "title" => $title,
    "content" => $fields
];


$todos = file_get_contents(base_path("database/todos.json"));
$todos = json_decode($todos, true);

$todos[] = [
    ...$todo,
    'id' => sha1(time() . rand(0, 1000)),
    'created_at' => date("M d, Y, g:i a"),
    'updated_at' => date("M d, Y, g:i a"),
];

$todos = json_encode($todos);

file_put_contents(base_path("database/todos.json"), $todos);
header("Location: /todos");