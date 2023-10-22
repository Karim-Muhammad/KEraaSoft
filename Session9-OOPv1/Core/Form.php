<?php


// Validation
require_once base_path('Core/Validator.php');

// Models
require_once base_path("Models/Cart.php");
require_once base_path("Models/Users.php");

// Session
require_once base_path("Core/Session.php");

class Form
{

    private $formData = [];
    private $errors = [];


    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    public function validate()
    {
        if (count($this->formData) === 0) {
            throw new Exception("No Form Data is Received!");
        }

        foreach ($this->formData as $key => $value) {
            if ($key === 'username') {
                if (!Validator::text($value, 3, 20))
                    $this->errors["username"] = Validator::getError('text');
            } elseif ($key === 'email') {
                if (!Validator::email($value))
                    $this->errors['email'] = Validator::getError('email');
            } elseif ($key === 'password') {
                if (!Validator::password($value, '/.*/'))
                    $this->errors['password'] = Validator::getError('password');
            } elseif ($key === 'passwordConfirm') {
                if (!Validator::confirmPassword($value))
                    $this->errors['passwordConfirm'] = Validator::getError('password');
            }
        }

        echo "Count Errors: " . count($this->errors) . "\n";
        return count($this->errors) === 0 ? true : false;
    }

    public function register()
    {
        if (!$this->validate()) {

            // TODO : Session Flash
            Session::flash("errors", $this->errors);
            Session::flash('old', $this->formData);

            return false;
        }

        $data = [
            'admin' => $this->formData['is_admin'] ?? 0,
            'username' => $this->formData['username'],
            'email' => $this->formData['email'],
            'password' => $this->formData['password'],
        ];

        Users::create($data['admin'], $data['username'], $data['email'], password_hash($data['password'], PASSWORD_DEFAULT));
        return true;
    }

    public function login()
    {
        $data = [
            "email" => $this->formData["email"],
        ];

        $user = Users::findByEmail($data["email"]);

        if ($user === null) {
            // TODO : Redirect with errors
            Session::flash('auth-msg', 'Email is not registered!');
            Session::flash("old", $this->formData);

            redirect('/auth/login');
            return false;
        }

        if (!password_verify($this->formData["password"], $user["password"])) {
            // TODO : Redirect with errors
            Session::flash("errors", ['auth-msg' => 'Password is incorrect!']);
            Session::flash("old", $data);

            redirect('/auth/login');
            return false;
        }

        $data['id'] = $user['id'];
        $data['username'] = $user['name'];
        $data['admin'] = $user['admin'];

        Cart::create($user['id']);
        Session::put("user", $data);
        return true;
    }
}