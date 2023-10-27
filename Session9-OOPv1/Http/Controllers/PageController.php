<?php

require_once base_path('Core/Session.php');
require_once base_path('Models/Product.php');

class PageController
{
    public function home()
    {
        $products = Product::allJoin();

        // dd($products);
        view("pages/products/index", [
            'name' => "Home",
            'products' => $products
        ]);
    }

    public function about()
    {
        view("about", [
            'name' => "About",
        ]);
    }

    public function error()
    {
        // dd(Session::get('errors'));
        view("error", [
            'name' => "Error",
            "errors" => Session::get('errors')
        ]);
    }
}

return new PageController();
