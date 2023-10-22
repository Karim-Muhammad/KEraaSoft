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