<?php

require_once base_path('Core/Form.php');
require_once base_path('Core/Session.php');

require_once base_path('database/Database.php');

class AuthController
{
    public function login()
    {
        view("pages/auth/login", [
            "errors" => Session::get("errors"),
            "inputs" => Session::get("old"),
        ]);
    }

    public function handleLogin()
    {
        $user = $_POST;
        $LoginForm = new Form($user);
        if (!$LoginForm->login()) {
            // TODO: Redirect with errors
            redirect('/auth/login');
        }

        $userModel = User::findByEmail($user['email']);

        // dd($userModel);

        if ($userModel['admin'] == 1) {
            redirect('/admin');
            return;
        }
        redirect('/');
    }

    public function register()
    {
        view("pages/auth/register", [
            "errors" => Session::get("errors"),
            "inputs" => Session::get("old"),
        ]);
    }

    public function handleRegister()
    {
        $formData = $_POST;
        $RegisterForm = new Form($formData);
        if (!$RegisterForm->register()) {
            // TODO: Redirect with errors
            redirect('/auth/register');
        }
        redirect('/auth/login');
    }

    public function logout()
    {
        // Clear Session
        // Redirect to login
        Session::destroy();
        redirect('/auth/login');
    }
}

return new AuthController();