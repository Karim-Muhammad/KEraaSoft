<?php

require_once base_path("Models/CartItem.php");
require_once base_path("Models/Cart.php");

class CartController
{
    public function index()
    {
        // dd(Session::get('user') ?? null);
        $cart = Cart::getCart(Session::get('user')['id'] ?? null);

        // dd($cart);

        return view('pages/cart', [
            'cart' => $cart
        ]);
    }

    public function store()
    {
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $quantity = $_POST['quantity'];

        CartItem::addToCart($product_id, $user_id, $quantity);

        return redirect('/cart');
    }

    public function destroy()
    {
        $product_id = (int) $_POST['product_id'];
        $user_id = (int) $_POST['user_id'];

        CartItem::removeFromCart($product_id, $user_id);

        return redirect('/cart');
    }
}


return new CartController();