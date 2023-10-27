<?php

class Cart
{
    private $id;

    public static function create($id)
    {
        global $database;
        $database->sql("INSERT INTO CARTS (user_id) VALUES (?)")->run("i", $id);
    }

    public static function getCart($user_id)
    {
        global $database;
        $cart_id = $database->sql("SELECT id FROM CARTS WHERE user_id = ?")->run("i", $user_id)->get_result()->fetch_assoc()['id'];

        $cart_items = $database->selectJoin('PRODUCTS.*', 'CART_ITEM', 'PRODUCTS', 'CART_ITEM.product_id = PRODUCTS.id', "CART_ITEM.cart_id = $cart_id");

        // $cart_items = $database->sql("SELECT * FROM CART_ITEM WHERE cart_id = ?")->run("i", $cart_id)->get_result()->fetch_all(MYSQLI_ASSOC);

        return $cart_items;
    }
}