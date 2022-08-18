<?php
namespace Core\Controllers;

class Controller{
  static public function redirect($page)
  {
    header('Location: ' . $page);
    exit();
  }
}