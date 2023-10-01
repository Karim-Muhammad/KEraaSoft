<?php

  // session_start();
  // dd($_SESSION["user"]);
  if($_SESSION["user"] ?? false) {
    view("index.view.php");
    return;
  }else {
    header("Location: /login");
  }