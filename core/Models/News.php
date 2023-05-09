<?php
namespace Core\Models;

class News extends Model{
  public $id;
  public $title;
  public $content;
  public $category_id;

  public function getCategory()
  {
   return Category::find($this->category_id);
  }

  public static function getTable()
  {
    return 'news';
  }
}


