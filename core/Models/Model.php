<?php
namespace Core\Models;

use Core\Exceptions\NotFoundException;
use Core\Services\Db;

abstract class Model{
  public $id;

  public static function all()
  {
    $db = Db::getInstance();
    return $db->query('select * from ' . static::getTable(), [], static::class);
  }

  public static function find($id)
  {
    $db = Db::getInstance();
    $result = $db->query('select * from ' . static::getTable() . ' where id=?', [$id], static::class);
    return $result ? $result[0] : null;
  }

  public static function findOrFail($id)
  {
    $item = self::find($id);
    if($item === null){
      throw new NotFoundException();
    }
    return $item;
  }


  abstract public static function getTable();
}