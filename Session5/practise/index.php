<?php

    // setcookie("name", "value", time() + 86400, "/"); // 86400 = 1 day
    setcookie("name", "value", time() + 86400, "/", "localhost", true, true);



    // learn new thing
    echo "Welcome to Index Page";
    ini_set("max_execution_time", 2);
    sleep(2);
    echo "Continue Welcome to Index Page";

    ?>

    <a href="practise/cookie.php">Cookie</a>

    //