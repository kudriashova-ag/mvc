<?php
namespace Core\Lib;

class View{
  public static function render(string $path, array $data = [])
  {
    extract($data);
    unset($data);
    require_once './Core/views/header.php';
    require_once './Core/views/' . $path . '.php';
    require_once './Core/views/footer.php';

  }
}