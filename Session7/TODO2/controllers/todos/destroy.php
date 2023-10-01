<?php

$todo_id = $_POST["todo_id"];

$todos = getTodos();

$todos = array_filter($todos, function ($todo) use ($todo_id) {
    return (int) $todo['id'] !== (int) $todo_id;
});


$todos = [...$todos];
$todos = json_encode($todos);

// dd($todos);

file_put_contents(base_path("database/todos.json"), $todos);


header("Location: /todos");