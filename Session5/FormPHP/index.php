<?php

    $x = 2;

    if($x) echo "true One\n";

    if($x) { 
        echo "true Two\n";
    }

    $x = 0;
    if($x)
        echo "true Three\n";
        echo "true Four\n";