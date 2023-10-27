<?php

class AdminController
{
    public function index()
    {
        return view('admin/dashboard');
    }
}

return new AdminController();