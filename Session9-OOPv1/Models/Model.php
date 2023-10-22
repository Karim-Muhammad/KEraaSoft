<?php

class Model
{
    public static $errors = [];
    public static function validate($data)
    {
        $errors = &self::$errors;

        if (empty($data['name'])) {
            $errors['name'] = "Name is required";
        }

        if (empty($data['description'])) {
            $errors['description'] = "Description is required";
        }

        if (empty($data['image'])) {
            $errors['image'] = "Image is required";
        }

        return empty($errors);
    }

    // ============================= CRUD =======================
    public static function create(string $table, array $data_assoc)
    {
        if (!self::validate($data_assoc)) {
            return false;
        }

        $data_assoc['slug'] = slugify($data_assoc['name']);

        global $database;
        // dd($data_assoc);
        return $database->insert($table, $data_assoc);
    }

    public static function update(string $table, int $id, string $column, $value)
    {
        global $database;
        return $database->update($table, $column, $value, $id);
    }

    public static function delete(string $table, int $id)
    {
        global $database;
        return $database->delete($table, $id);
    }


    // ============================= HELPERS =======================
    public static function all(string $table)
    {
        global $database;
        return $database->select($table);
    }

    public static function find(string $table, $id)
    {
        global $database;
        return $database->where($table, "id", $id)[0];
    }
}