<?php

  return [
    "/" => [
      "name" => "Home",
      "controller" => "controllers/index.php",
    ],
    "/register" => [
      "name" => "Register",
      "controller" => "controllers/register.php",
    ],
    "/login" => [
      "name" => "Login",
      "controller" => "controllers/login.php",
    ],
    "/logout" => [
      "name" => "!Logout", // ! means this route is not linked in the navbar
      "controller" => "controllers/logout.php",
    ],
  ];