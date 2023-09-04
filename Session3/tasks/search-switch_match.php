<?php

    /** DOCUMENTATION
     * Unlike `switch`, the comparison in `match` is an identity check (===) rather than a weak equality in `switch` check (==). Match expressions are available as of PHP 8.0.0.
     */

    // Switch
    $food = 'apple';
    $return_value = "";

    switch ($food) {
        case 'apple':
            $return_value = 'This food is an apple';
            break;

        case 'bar' :
            $return_value = 'This food is a bar';
            break;

        case 'cake' :
            $return_value = 'This food is a cake';
            break;
    };

    var_dump($return_value);


    // Match

    $food = 'cake';

    $return_value = match ($food) {
        'apple' => 'This food is an apple',
        'bar' => 'This food is a bar',
        'cake' => 'This food is a cake',
    };

    var_dump($return_value);