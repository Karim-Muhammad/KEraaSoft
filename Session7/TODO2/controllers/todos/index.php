<?php

// Get all Todos of the user
$user = (object) $_SESSION["user"] ?? null;
$user_id = $user?->id ?? null;

if ($user_id === null) {
    header("Location: /login");
    exit();
}



$todos = file_get_contents(base_path("database/todos.json"));
$todos = json_decode($todos, true);


$todos_of_user = array_filter($todos, function ($todo) {
    $user_id = $_SESSION["user"]["id"];
    return $todo["user_id"] === $user_id;
});

view("todos/index.view.php", [
    "todos" => $todos_of_user,
]);
return;