<?php

namespace App\Http\Controllers;

class UserController
{
    public function index()
    {
        return view('users.home');
    }

    public function show($id)
    {
        return view('users.show', ['id' => $id]);
    }
}