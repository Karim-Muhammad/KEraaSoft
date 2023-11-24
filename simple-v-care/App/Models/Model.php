<?php

require_once base_path("Core/Session.php");

class Model
{
    protected string $table = "";
    public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $role = "";
    public $bio;
    public $image;

    // this will be used to store the data from the database
    protected array $fillable = [];

    public function __construct($name = null, $email = null, $password = null, $phone = null, $role = null, $image = null, $bio = "No bio yet")
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->role = $role;
        $this->bio = $bio;
        $this->image = $image;

        foreach ($this->fillable as $key => $value) {
            if (isset($this->{$key})) {
                $this->fillable[$key] = $this->{$key};
            }
        }
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;

        if (in_array($name, $this->fillable)) {
            $this->fillable[$name] = $this->{$name};
        }
    }

    public function save()
    {
        global $database;

        $existingUser = $this->findByEmail($this->email);

        if ($existingUser) {
            return false; // Email already exists
        }

        // 1# (won't be generic)

        // $data = get_object_vars($this); it will get all the properties of the object
        // unset($data["table"], $data["id"]);
        // $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        // $result = $database->insert($this->table, $data);

        // 2#

        // how to make this line generic?
        $this->fillable["password"] = password_hash($this->fillable["password"], PASSWORD_DEFAULT);
        $result = $database->insert($this->table, $this->fillable);

        $this->id = $result['LAST_INSERT_ID()'];
        // dd($result);

        return true;
    }

    public function update($newData)
    {
        global $database;
        $database->update($this->table, $newData, $this->id);
    }

    public function delete()
    {
        global $database;
        $database->delete($this->table, $this->id);
    }

    public static function all()
    {
        global $database;
        return $database->all(static::getTable(), '*');
    }

    public static function findByEmail($email)
    {
        // dd($email);
        global $database;
        return $database->where(static::getTable(), 'email', $email);
    }

    public static function findById($id)
    {
        global $database;
        return $database->where(static::getTable(), 'id', $id);
    }

    public static function getTable()
    {
        return (new static())->table; // works fine
        // return (new self())->table; // not works fine

        /**
         * https://stackoverflow.com/questions/11710099/what-is-the-difference-between-selfbar-and-staticbar-in-php
         */
    }
}
