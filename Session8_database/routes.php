<?php

return $routes = [
    "/" => [
        "actions" => [
            "GET" => "index.php"
        ],
        "routable" => true,
        "name" => "Home",
        "only" => ["guest"]
    ],
    "/about" => [
        "actions" => [
            "GET" => "about.php"
        ],
        "routable" => true,
        "name" => "About",
        "only" => ["auth", "guest"]
    ],
    "/contact" => [
        "actions" => [
            "GET" => "contact.php"
        ],
        "routable" => true,
        "name" => "Contact",
        "only" => ["auth", "guest"]
    ],
    "/notes" => [
        'actions' => [
            "GET" => "notes/index.php",
            "POST" => "notes/store.php"
        ],
        "routable" => true,
        "name" => "Notes",
        "only" => ["auth"]
    ],
    "/notes/create" => [
        "actions" => [
            "GET" => "notes/create.php"
        ],
        "routable" => true,
        "name" => "Create Note",
        "only" => ["auth"]
    ],
    "/note" => [
        "actions" => [
            "GET" => "notes/show.php",
            "PATCH" => "notes/update.php",
            "DELETE" => "notes/destroy.php"
        ],
        "routable" => false,
        "name" => "Show Note",
        "only" => ["auth"]
    ],
    "/note/edit" => [
        "actions" => [
            "GET" => "notes/edit.php",
        ],
        "routable" => false,
        "name" => "Edit Note",
        "only" => ["auth"]
    ],
    "/login" => [
        "actions" => [
            "GET" => "auth/login.php",
            "POST" => "auth/signin.php"
        ],
        "routable" => false,
        "name" => "Login",
        // "only" => ["guest"]
    ],
    "/register" => [
        "actions" => [
            "GET" => "auth/register.php",
            "POST" => "auth/store.php"
        ],
        "routable" => false,
        "name" => "Register",
        // "only" => ["guest"]
    ],
    "/logout" => [
        "actions" => [
            "POST" => "auth/logout.php"
        ],
        "routable" => false,
        "name" => "Logout",
        "only" => ["auth"]
    ],
];