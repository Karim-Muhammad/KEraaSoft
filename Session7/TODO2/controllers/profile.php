<?php

$todos = file_get_contents(base_path("database/todos.json"));
$todos = json_decode($todos, true);


$todos_of_user = array_filter($todos, function ($todo) {
  global $user_id;
  return $todo["user_id"] === $_SESSION["user"]['id'];
});

view("profile.view.php", [
  "user" => $_SESSION["user"],
  "todos" => $todos_of_user,
]);