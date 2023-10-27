<?php

require_once base_path("Models/User.php");

class UserController
{
    public function index()
    {
        $user = User::findByEmail(Session::get('user')['email']);

        // dd($user);

        return view('pages/profile', [
            'user' => $user,
        ]);
    }
}

return new UserController();