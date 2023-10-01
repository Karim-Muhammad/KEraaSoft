<?php


$todo_id = $_GET['id'];

$todos = getTodos();

$todo_idx = array_search($todo_id, array_column($todos, "id"));


if ($todo_idx === false) {
    abort(404);
}



$todo = $todos[$todo_idx];

setFlash("old", $todo);

setFlash("fields_count", getFlash('fields_count') ?? count($todo['content']));
// if you delete more than default, will get default data

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    view("todos/edit.view.php", [
        "todo" => $todo,
        "errors" => getFlash("errors") ?? [],
        "old" => getFlash("old") ?? [],
        "fields_count" => getFlash("fields_count") ?? 1,
    ]);
}