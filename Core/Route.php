<?php
namespace Core;

class Route{
  static public function start()
  {
    $url = $_GET['url'] ?? '/';
    $routes = require_once './Core/web.php';
    
    if(!isset($routes[$url])){
      die('Page Not Found');
    }

    list($nameController, $nameMethod) = $routes[$url]; // 'HomeController', 'index'

    $classController = 'Core\\Controllers\\' . $nameController;
    if(!file_exists($classController . '.php')){
      die("Controller $classController not Found");
    }
    $objController = new $classController();
    
    if(!method_exists($objController, $nameMethod)){
      die("Method $nameMethod not Found");
    }
    $objController->$nameMethod();

  }
}

