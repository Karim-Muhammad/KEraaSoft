<?php

require_once base_path("Core/Session.php");

class User
{
    public static function findByEmail($email)
    {
        global $database;

        try {
            $database->sql("SELECT * FROM USERS WHERE email = ?");
            $database->run('s', $email);
            $result = $database->fetch(fn($result) => $result->fetch_assoc()); // get single result
        } catch (Exception $e) {
            throw new Exception($e->getMessage() . " Couldn't Find User!");
        }

        return $result ?? null;
    }

    public static function create(string $admin, string $username, string $email, string $password)
    {
        global $database;

        $user = self::findByEmail($email);

        if ($user !== null) {
            echo "Email Already Exists!";
            Session::flash('errors', ['email' => 'Email Already Exists!']);
            Session::flash('inputs', ['username' => $username]);
            redirect('/auth/register');
        }


        try {
            $database->sql("INSERT INTO USERS (name, email, password, admin) VALUES (?, ?, ?, ?)");
            $database->run('ssss', $username, $email, $password, $admin);
        } catch (Exception $e) {
            throw new Exception($e->getMessage() . " Couldn't Create User!");
        }
    }
}