<?php

require_once base_path("Core/Session.php");
require_once base_path("App/Models/Model.php");

class User extends Model
{
    protected string $table = "users";
    public $role = "patient";

    protected array $fillable = [
        "name" => "",
        "email" => "",
        "password" => "",
        "phone" => "",
        "role" => "",
        "bio" => "",
        "image" => "",
    ];

    public function __construct($name = null, $email = null, $password = null, $phone = null, $role = 'patient', $image = null, $bio = 'No bio yet')
    {
        parent::__construct($name, $email, $password, $phone, $role, $bio, $image);
    }
}
