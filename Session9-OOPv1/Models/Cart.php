<?php

class Cart
{
    private $id;

    public static function create($id)
    {
        global $database;
        $database->sql("INSERT INTO CARTS (user_id) VALUES (?)")->run("i", $id);
    }
}