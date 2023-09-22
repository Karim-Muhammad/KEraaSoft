<?php

  /**
   * =================================== HELPERS FUNCTIONS ===================================
   */

  /**
   * Function for Debugging
   */
  function dd($data) {
    echo "<pre>";
      print_r($data);
    echo "</pre>";

    die();
  }

  /**
   * Function's Job is show Error Page with Error Code
   */
  function abort($code) {
    require_once view("errors/generic.php", [
      "code" => $code
    ]);

    die();
  }

  /**
   * Function to access folders, files with relative paths based on ROOT constant
   */
  function base_path(string $path) {
    return ROOT.$path;
  }

  /**
   * Function to render view with data
   */
  function view($path, $data = []) {
    extract($data);
    require_once base_path("views/$path");
  }

  /**
   * Function to validate string (username, email)
   */

   
   function purify($input) {
    return trim(htmlspecialchars(htmlentities($input)));
   }

   function string($input) {
      return trim(empty($input))? false : true;
   }
   function email($input) {
      return filter_var($input, FILTER_VALIDATE_EMAIL);
   }
   function password($input, ?callable $validateFn) {
      return $validateFn($input) ?? ($input >= 8);
   }

   function validate($input, callable $validateFn) {
    return $validateFn($input);
   }

   function _validate($input, $type, ?callable $validateFn) {
      switch($type) {
        case "string":
          return string($input)? ($validateFn($input) ?? string($input)) : false; // 
        case "email":
          return email($input);
        case "password":
          return password($input);
      }
   }

   // check if these keys exists in some array
   function validateKeys($array, $keys):array {
      $errors = [];

      foreach($keys as $key) {
        if(!isset($array[$key])) {
          $errors[$key] = "$key is required!";
        }elseif(empty($array[$key])) {
          $errors[$key] = "$key is cannot be empty!";
        }
      }

      if(count($errors) > 0) return $errors;
      else return [];
   }

   function validateKey($array, $key) {
      if(isset($array[$key]))
        return true;
      else
        return false;
   }


   /**
    *  ============================= Business Logic Implementation ============================= 
    */

   function routeToController($path, $ROUTES) {
      session_start();
      if(!array_key_exists($path, $ROUTES))
        abort(404); // Page Not Found

      require_once base_path($ROUTES[$path]["controller"]);
   }