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
    $result = $db->query('select * from ' . static::getTable() . ' where id=:id', ['id'=>$id], static::class);
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

  public function save()
  {
    $db = Db::getInstance();

    $reflection = new \ReflectionObject($this);
    $properties = $reflection->getProperties();

    $props = [];
    $propsToUpdate = [];
    foreach($properties as $p){
      $name = $p->name;
      $props[$name] = $this->$name;
      $propsToUpdate[] = $name . '=:' . $name;
    }
    if($this->id){
      $sql = 'UPDATE ' . static::getTable() . ' SET ' . implode(', ', $propsToUpdate) . ' WHERE id=:id' ;
      $db->query($sql, $props);
    }
    else{
      $sql = 'INSERT INTO ' . static::getTable() . '('. implode(', ', array_keys($props)) .') VALUES (:' . implode(', :', array_keys($props)) . ')';
      $db->query($sql, $props);
    }
  }


  public function remove()
  {
    $db = Db::getInstance();
    $db->query('delete from ' . static::getTable() . ' where id=:id', ['id' => $this->id], static::class);
  }




  abstract public static function getTable();
}