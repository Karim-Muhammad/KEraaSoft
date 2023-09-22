<?php

  // There is not Database in this assignment, Oh I Forgot :(
  class Database {
    private $connection;
    private $statement;
    public function __construct($config) {
      $dsn = "mysql:".http_build_query($config, arg_separator: ";");
      try {
        $this->connection = new PDO($dsn, $config["username"], $config["password"], [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
      }catch(PDOException $e) {
        die($e->getMessage());
      }
    }

    public function query($query, $params = []) {
      $this->statement = $this->connection->prepare($query);
      $this->statement->execute($params);

      return $this;
    }

    public function find() {
      $record = $this->statement->fetch();
      if($record) {
        return $record;
      }else {
        abort(404);
      }
    }

    public function register($fullname, $email, $password) {
      $this->query("SELECT * FROM users");
    }
  }