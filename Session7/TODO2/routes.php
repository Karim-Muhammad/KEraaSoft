<?php

static $ROUTES = [];

if (count($ROUTES) > 0)
    return $ROUTES;

route("GET", "/", "Home", "controllers/index.php", "auth", true);

route("GET", "/register", "Register", "controllers/register.php", "guest", true);
route("POST", "/register", null, "controllers/register.php", "guest", false);

route("GET", "/login", "Login", "controllers/login.php", "guest", true);
route("POST", "/login", null, "controllers/login.php", "guest", false);

// should be POST, but it works fine
route("GET", "/logout", "Logout", "controllers/logout.php", "auth", true);

route("GET", "/profile", "Profile", "controllers/profile.php", "auth", true);

route("GET", "/todos", "Todolists", "controllers/todos/index.php", "auth", true);
route("GET", "/todo/show", null, "controllers/todos/show.php", "auth", false);

route("GET", "/todos/create", "Create Todo", "controllers/todos/create.php", "auth", false);
route("POST", "/todos/create", null, "controllers/todos/create.php", "auth", false);

route("POST", "/todos/store", null, "controllers/todos/store.php", "auth", false);

route("GET", "/todo/edit", "Edit Todo", "controllers/todos/edit.php", "auth", false);
route("POST", "/todo/update", null, "controllers/todos/update.php", "auth", false);

route("POST", "/todo/delete", null, "controllers/todos/destroy.php", "auth", true);

route("POST", "/fields", null, "controllers/fields.php", "auth", false);

return $ROUTES;