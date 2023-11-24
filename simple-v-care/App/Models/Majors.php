<?php


class Majors
{
    protected string $table = "majors";
    public int $id;
    public string $name;
    public string $description;
    public string $image;

    public function __construct($name = null, $description = null, $image = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }

    public function save()
    {
        global $database;

        $result = $database->insert($this->table, [
            "name" => $this->name,
            "description" => $this->description,
            "image" => $this->image,
        ]);
    }

    public static function all()
    {
        global $database;

        $result = $database->select('majors', '*');
        return $result;
    }
}