<?php

require_once 'Model.php';

class Product extends Model
{
    public $title;
    private $slug;
    public $description;
    public $price;
    public $image;
    public $category_id;

    public function __construct($title, $description, $price, $image, $category_id)
    {
        $this->title = $title;
        $this->slug = slugify($title);
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;

        // Now i can add one category to product not many
        $this->category_id = $category_id;
    }

    // ============================= CRUD =======================
    public static function create($data_assoc)
    {
        if (!self::validate($data_assoc)) {
            return false;
        }

        $data_assoc['slug'] = slugify($data_assoc['name']);

        global $database;
        // dd($data_assoc);
        return $database->insert("PRODUCTS", $data_assoc);
    }

    public static function update($id, $column, $value)
    {
        global $database;
        return $database->update("PRODUCTS", $column, $value, $id);
    }

    public static function delete($id)
    {
        global $database;
        return $database->delete("PRODUCTS", $id);
    }


    // ============================= HELPERS =======================
    public static function all()
    {
        global $database;
        return $database->select("PRODUCTS");
    }

    public static function find($id)
    {
        global $database;
        return $database->where("PRODUCTS", "id", $id)[0];
    }
}