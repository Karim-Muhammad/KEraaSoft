<?php

class Session
{

    static public function has($key)
    {
        return (bool) static::get($key);
    }

    static public function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    static public function get($key, $default = [])
    {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? $default;
    }

    static public function flash($key, $value)
    {
        $_SESSION["_flash"][$key] = $value;
    }

    static public function unflash()
    {
        unset($_SESSION["_flash"]);
    }

    static public function flush()
    {
        $_SESSION = [];
    }

    static public function destroy()
    {
        static::flush();
        session_destroy();

        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 10, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }
}