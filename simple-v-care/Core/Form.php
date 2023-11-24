<?php


// Validation
require_once base_path('Core/Validator.php');

// Models
require_once base_path("App/Models/User.php");
require_once base_path("App/Models/Doctor.php");
require_once base_path("App/Models/Patient.php");

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
            } else if ($key === 'phone') {
                if (!Validator::phone($value))
                    $this->errors['phone'] = Validator::getError('phone');
            }
        }

        // echo "Count Errors: " . count($this->errors) . "\n";
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

        // I did take field of user in consideration only
        [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'bio' => $bio,
            'role' => $role,
            'image' => $image,
            // if doctor
            'major_id' => $major_id,
            // if patient
            'checkup' => $checkup
        ] = $this->formData;

        if ($role === 'admin') {
            $user = new User($name, $email, $password, $phone, $role, $image, $bio);
        } elseif ($role === 'doctor') {
            $user = new Doctor($name, $email, $password, $phone, $role, $image, $major_id, $bio);
        } elseif ($role === 'patient') {
            $user = new Patient($name, $email, $password, $phone, $role, $image, $checkup, $bio);
        }

        if ($user->save()) {
            Session::flash(
                'auth-msg',
                'Registered Successfully!'
            );
            return true;
        } else {
            Session::flash('errors', ['auth-msg' => 'Email Already Exists!']);
            Session::flash('old', $this->formData);
            return false;
        }
    }

    public function login()
    {

        [
            "email" => $email,
        ] = $this->formData;

        $userEntity = User::findByEmail($email);

        // if empty
        if (count($userEntity) === 0) {
            // TODO : Redirect with errors
            Session::flash('errors', ['auth-msg' => 'Email is not registered!']);
            Session::flash("old", $this->formData);

            redirect('/auth/login');
            return false;
        }

        $user = $userEntity[0];

        // dd($user);
        // dd(password_verify($this->formData["password"], $user["password"]));


        if (!password_verify($this->formData["password"], $user["password"])) {
            // TODO : Redirect with errors
            Session::flash("errors", ['auth-msg' => 'Password is incorrect!']);
            Session::flash("old", ["email" => $email]);

            redirect('/auth/login');
            return false;
        }

        Session::put("user", [
            "id" => $user['id'],
            "name" => $user['name'],
            "email" => $user['email'],
            "role" => $user['role'],
            "image" => $user['image'],
        ]);

        return true;
    }
}