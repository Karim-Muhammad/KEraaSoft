<?php

require_once 'Model.php';

class Product extends Model
{
    // ============================= CRUD =======================
    public static function create($data_assoc)
    {
        // Child inherit Static from parent
        if (!self::validate($data_assoc)) {
            return false;
        }

        $data_assoc['slug'] = slugify($data_assoc['name']);

        global $database;
        // dd($data_assoc);
        return $database->insert("PRODUCTS", $data_assoc);
    }

    public static function update($data_assoc, $id)
    {
        global $database;
        return $database->update("PRODUCTS", $data_assoc, $id);
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

    public static function allJoin()
    {
        global $database;
        return $database->selectJoin("PRODUCTS.*,CATEGORIES.`name` as category_name", "PRODUCTS", "CATEGORIES", "PRODUCTS.category_id = CATEGORIES.id");
    }

    public static function find($id)
    {
        global $database;
        return $database->where("PRODUCTS", "id", $id)[0];
    }
}