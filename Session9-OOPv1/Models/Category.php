<?php

require_once 'Model.php';

class Category extends Model
{
    public $title;
    private $slug;


    public function __construct($title)
    {
        $this->title = $title;
        $this->slug = slugify($title);
    }

    public static function create($data_assoc)
    {
        global $database;
        $database->insert('CATEGORIES', $data_assoc);
    }

    public static function update($data_assoc, $id)
    {
        global $database;
        $database->update('CATEGORIES', $data_assoc, $id);
    }

    public static function delete($id)
    {
        global $database;
        $database->delete('CATEGORIES', $id);
    }

    public static function all()
    {
        global $database;
        $result = $database->select('CATEGORIES');
        return $result;
    }

    public static function find($id)
    {
        global $database;
        return $database->where('CATEGORIES', 'id', $id);
    }
}