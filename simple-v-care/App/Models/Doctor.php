<?php

require_once base_path("Core/Session.php");
require_once base_path("App/Models/Model.php");
require_once base_path("App/Models/User.php");

class Doctor extends Model
{
    protected string $table = "doctors";
    public $role = "doctor";

    public int $major_id;

    protected array $fillable = [
        "user_id" => "",
        "major_id" => ""
    ];

    public function __construct($name = null, $email = null, $password = null, $phone = null, $role = 'doctor', $image = null, $major_id = 0, $bio = 'No bio yet')
    {
        parent::__construct($name, $email, $password, $phone, $role, $bio, $image);
        $this->major_id = $major_id;

        $this->fillable['major_id'] = $this->major_id;
    }

    public function save()
    {
        global $database;

        // Insert it as User First
        $user = new User($this->name, $this->email, $this->password, $this->phone, $this->role, $this->image, $this->bio);
        $user->save();

        // After saving, user will have an id
        $this->fillable['user_id'] = (int) $user->id;

        // dd($this->fillable);
        // Insert it as Doctor
        $result = $database->insert($this->table, $this->fillable);
        // -> insert() method returns the last inserted id

        return $result['LAST_INSERT_ID()'];
    }

    public static function all()
    {
        global $database;

        return $database->select('doctors');
    }

    public static function allJoin()
    {
        global $database;

        return $database->selectJoin('*', 'doctors', 'users', 'doctors.`user_id` = users.`id`');
    }

    public static function allJoins($where = true)
    {
        global $database;

        return $database->selectJoins('users.*, doctors.*, majors.name as major_name', 'doctors', where: $where, tables_on: [
            "users" => "users.`id` = doctors.`user_id`",
            "majors" => "majors.`id` = doctors.`major_id`"
        ]);
    }


    public static function count()
    {
        global $database;
        return $database->aggrgate('COUNT', 'doctors');
    }
}
