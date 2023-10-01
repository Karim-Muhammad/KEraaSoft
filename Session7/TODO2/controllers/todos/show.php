<?php


$todo_id = $_GET['id'];

$todos = getTodos();

$todo_idx = array_search($todo_id, array_column($todos, "id"));

$todo = $todos[$todo_idx];

setFlash("old", $todo);

setFlash("fields_count", count($todo['content']));

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    view("todos/show.view.php", [
        "todo" => $todo,
        "old" => getFlash("old") ?? [],
        "fields_count" => getFlash("fields_count") ?? 1,
    ]);
}