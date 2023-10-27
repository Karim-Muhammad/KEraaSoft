<?php

class CartItem
{
    private $id;
    private $product_id;
    private $user_id;
    private $quantity;

    public static function addToCart($product_id, $user_id, $quantity)
    {
        global $database;
        $cart_id = $database->sql("SELECT id FROM CARTS WHERE user_id = ?")->run("i", $user_id)->get_result()->fetch_assoc()['id'];
        // dd($cart_id);
        $database->sql("INSERT INTO CART_ITEM (product_id, cart_id, quantity) VALUES (?, ?, ?)")->run("iii", $product_id, $cart_id, $quantity);
    }

    public static function removeFromCart($product_id, $user_id)
    {
        global $database;
        // My Database Wrongly Designed!
        // Only store product_id without user_id, so deleteing by product_id can delete all users' cart items

        $database->sql("DELETE FROM CART_ITEM WHERE product_id = ?")->run("i", $product_id);
    }

    public static function getCart($user_id)
    {
        global $database;
        // user_id field i didn't added in database, so i can't get cart by user_id
        $cart = $database->sql("SELECT * FROM CART_ITEM WHERE user_id = ?")->run("i", $user_id)->get_result()->fetch_all();
        return $cart;
    }
}