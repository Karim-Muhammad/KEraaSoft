<?php
class Validator
{

    // Pure function not depend on any state, we translate it in OOP to `static` method
    private static $error_messages = [];
    private static $inputs = [];

    /**
     * General Purpose method for validation based on preference programmer
     */
    public static function validate(string $field, string $value, callable $validateFn, string $error_msg): bool
    {
        if (!is_callable($validateFn))
            throw new \InvalidArgumentException("validateFn Argument must be Callback!");

        $is_validated = $validateFn($value);

        if (!$is_validated) {
            self::$error_messages[$field] = $error_msg;
        }

        self::$inputs[$field] = $value;
        return $is_validated;
    }

    /**
     * Method for Validating names, username, text
     */
    public static function text(string $value, ?int $min = 3, ?int $max = 20): bool
    {
        $value = trim($value);

        if (empty($value)) {
            self::$error_messages["text"] = "content is required (cannot be empty)";
            return false;
        }

        if (strlen($value) > $max) {
            self::$error_messages["text"] = "content must be maximum $max characters";
            return false;
        }

        if (strlen($value) < $min) {
            self::$error_messages["text"] = "content must be at least $min characters";
            return false;
        }

        return true;
    }

    public static function email(string $value): bool
    {
        $is_valid = filter_var(trim($value), FILTER_VALIDATE_EMAIL);

        if (!$is_valid) {
            self::$error_messages['email'] = "Please Enter Valid Email Address!";
            return false;
        }

        self::$inputs['email'] = $value;
        return true;
    }

    public static function password(string $value, string $regex): bool
    {
        $is_valid = preg_match($regex, $value);

        if (!$is_valid)
            self::$error_messages['password'] = "Please Enter A Valid Password";


        self::$inputs['password'] = $value;
        return $is_valid;
    }

    public static function confirmPassword(string $value)
    {
        if (!$value === self::$inputs['password']) {
            self::$error_messages['password'] = "Password is not matched!";
            return false;
        }

        return true;
    }

    public static function phone(string $value)
    {
        $is_valid = preg_match('/^(\+20|0)[0-9]{9,12}$/', $value); // +201234567890 (copilot)

        if (!$is_valid)
            self::$error_messages['phone'] = "Please Enter A Valid Phone Number (start with +20)";

        self::$inputs['phone'] = $value;
        return $is_valid;
    }

    public static function getError($field)
    {
        if (isset(self::$error_messages[$field])) {
            return self::$error_messages[$field];
        }
    }

    public static function getErrors()
    {
        return self::$error_messages;
    }
}