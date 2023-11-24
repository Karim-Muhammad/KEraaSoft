<?php

require_once base_path('Core/Session.php');
require_once base_path('App/Models/Doctor.php');

class PageController
{
    public function home()
    {
        $doctors = Doctor::allJoins();

        view("pages/doctors/index", [
            'name' => "Home",
            "errors" => Session::get('errors'),
            'doctors' => $doctors
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
