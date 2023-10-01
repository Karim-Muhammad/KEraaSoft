<?php


$todo_id = $_POST['id'];

$todos = getTodos();

$todo_idx = array_search($todo_id, array_column($todos, "id"));

$todo = &$todos[$todo_idx];

foreach ($_POST as $data => $value) {
    $$data = $value;
}

$todo = [
    ...$todo,
    "title" => $title,
    "content" => $fields,
    "updated_at" => date("M d, Y, g:i a"),
];

$todos = json_encode($todos);

file_put_contents(base_path("database/todos.json"), $todos);

header("Location: /todos");