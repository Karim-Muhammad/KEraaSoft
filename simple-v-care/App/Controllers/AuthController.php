<?php

require_once base_path('Core/Form.php');
require_once base_path('Core/Session.php');

// Models
require_once base_path("App/Models/Majors.php");

require_once base_path('database/Database.php');

class AuthController
{
    public function login()
    {
        // dd(password_hash("muhammad", PASSWORD_DEFAULT));

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
            redirect('/auth/login');
        }

        $userModel = User::findByEmail($user['email'])[0];
        // dd($userModel);


        if ($userModel['role'] == 'admin') {
            redirect('/admin');
            return;
        }

        redirect('/');
        return;
    }

    public function register()
    {
        $majors = Majors::all();

        view("pages/auth/register", [
            "errors" => Session::get("errors"),
            "inputs" => Session::get("old"),
            "majors" => $majors,
        ]);
    }

    public function handleRegister()
    {

        $formData = $_POST;

        if (file_upload($_FILES['upload_file'])) {
            $formData['image'] = $_FILES['upload_file']['name'];
        } else {
            $formData['image'] = 'https://via.placeholder.com/150';
        }

        $RegisterForm = new Form($formData);
        if (!$RegisterForm->register()) {
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