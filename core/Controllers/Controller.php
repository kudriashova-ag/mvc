<?php 
namespace Core\Controllers;
class Controller{

  public static function redirect($path)
  {
    header('Location: ' . $path);
    exit();
  }
}