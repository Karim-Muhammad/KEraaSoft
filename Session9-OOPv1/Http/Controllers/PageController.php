<?php

require_once base_path('Core/Session.php');

class PageController
{
    public function home()
    {
        view("index", [
            'name' => "Home",
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
