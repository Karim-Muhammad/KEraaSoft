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
}