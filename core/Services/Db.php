<?php
namespace Core\Services;

class Db{
  public $connect;

  public function __construct()
  {
    require __DIR__ . '/../../config.php';
    $this->connect = new \PDO("mysql:host=$host_db;dbname=$name_db;charset=$charset_db", $user_db, $pass_db);
  }
}