<?php

namespace Core\Services;

class Db
{
  private $connect;
  private static $instance = null;


  private function __construct()
  {
    require __DIR__ . '/../../config.php';
    $this->connect = new \PDO("mysql:host=$host_db;dbname=$name_db;charset=$charset_db", $user_db, $pass_db);
  }

  public function query(string $sql, array $params = [], string $className = 'stdClass')
  {
    $stmt = $this->connect->prepare($sql);
    $result = $stmt->execute($params);
    return $result ? $stmt->fetchAll(\PDO::FETCH_CLASS, $className) : null;
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }
}
