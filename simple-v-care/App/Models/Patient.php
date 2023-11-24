<?php

require_once base_path("Core/Session.php");
require_once base_path("App/Models/Model.php");

class Patient extends Model
{
    protected string $table = "patients";
    public $role = "patient";

    public string $checkup;

    protected array $fillable = [
        "user_id" => "",
        "checkup" => "",
    ];

    public function __construct($name = null, $email = null, $password = null, $phone = null, $role = 'patient', $image = null, $checkup = "No Checkup Yet", $bio = 'No bio yet')
    {
        // Constructor of the parent class will be called
        parent::__construct($name, $email, $password, $phone, $role, $bio, $image);
        $this->checkup = $checkup;

        $this->fillable['checkup'] = $this->checkup;
    }

    public function save()
    {
        global $database;

        // Insert it as User First
        $user = new User($this->name, $this->email, $this->password, $this->phone, $this->role, $this->image, $this->bio);
        $user->save();

        // dd($user);
        // After saving, user will have an id
        $this->fillable['user_id'] = (int) $user->id;

        // dd($this->fillable);
        // Insert it as Patient
        $result = $database->insert($this->table, $this->fillable);
        // -> insert() method returns the last inserted id

        return $result['LAST_INSERT_ID()'];
    }

    public static function allJoin()
    {
        global $database;

        return $database->selectJoin('*', 'patients', 'users', 'patients.`user_id` = users.`id`');
    }


    public static function count()
    {
        global $database;

        return $database->aggrgate('COUNT', 'patients');
    }
}