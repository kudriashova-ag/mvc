<?php
namespace Core\Models;

class Category extends Model{
  public $name;

  public static function getTable()
  {
    return 'categories';
  }
}


