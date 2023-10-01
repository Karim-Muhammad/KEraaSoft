<?php

/**
 * =================================== HELPERS FUNCTIONS ===================================
 */

/**
 * Function for Debugging
 */
function dd($data)
{
  echo "<pre>";
  print_r($data);
  echo "</pre>";

  die();
}

/**
 * Function's Job is show Error Page with Error Code
 */
function abort($code)
{
  view("errors/generic.php", [
    "code" => $code
  ]);

  die();
}

/**
 * Function to access folders, files with relative paths based on ROOT constant
 */
function base_path(string $path)
{
  return ROOT . $path;
}

/**
 * Function to render view with data
 */
function view($path, $data = [])
{
  extract($data);
  require_once base_path("views/$path");
}

/**
 * Function to validate string (username, email)
 */

function purify($input)
{
  return trim(htmlspecialchars(htmlentities($input)));
}

function string($input)
{
  return trim(empty($input)) ? false : true;
}
function email($input)
{
  return filter_var($input, FILTER_VALIDATE_EMAIL);
}
function password($input, ?callable $validateFn)
{
  return $validateFn($input) ?? ($input >= 8);
}

function validate($input, callable $validateFn)
{
  return $validateFn($input);
}

// check if these keys exists in some array
function validateKeys($array, $keys): array
{
  $errors = [];

  foreach ($keys as $key) {
    if (!isset($array[$key])) {
      $errors[$key] = "$key is required!";
    } elseif (empty($array[$key])) {
      $errors[$key] = "$key is cannot be empty!";
    }
  }

  if (count($errors) > 0)
    return $errors;
  else
    return [];
}

function validateKey($array, $key)
{
  if (isset($array[$key]))
    return true;
  else
    return false;
}

function setFlash($key, $value)
{
  $_SESSION['__flash'][$key] = $value;
}

function getFlash($key)
{
  $value = $_SESSION['__flash'][$key] ?? $_SESSION[$key] ?? null;
  unset($_SESSION['__flash'][$key]);
  return $value;
}

function inspect($key)
{
  echo "<pre>";
  print_r($_SESSION['__flash'][$key] ?? $_SESSION[$key] ?? null);
  echo "</pre>";
}


/**
 *  ============================= Business Logic Implementation ============================= 
 */

function getTodos()
{
  $todos = file_get_contents(base_path("database/todos.json"));
  $todos = json_decode($todos, true);

  return $todos;
}

function route(string $method, string $path, ?string $name, string $controller, string $role, bool $routable)
{
  global $ROUTES;

  $ROUTES[] = [
    "method" => $method,
    "path" => $path,
    "name" => $name,
    "controller" => $controller,
    "role" => $role,
    "routable" => $routable
  ];
}

function getRoutable($ROUTES)
{
  return array_filter($ROUTES, function ($route) {
    return $route["routable"] ?? null === true;
  });
}

function routeToController($path, $ROUTES)
{
  foreach ($ROUTES as $route) {
    if ($route["path"] === $path && $route["method"] === $_SERVER["REQUEST_METHOD"]) {
      $user = $_SESSION["user"] ?? null;
      if ($route["role"] === ($user ? "auth" : "guest")) {
        return base_path($route["controller"]);
      }
    }
  }

  abort(404); // Page Not Found
  exit();
}