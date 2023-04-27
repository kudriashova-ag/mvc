<?php
namespace Core\Lib;

class Route{
  private static $url;

  public static function start()
  {
    self::$url = $_GET['url'] ?? '/';  // 'news/12'
    require_once './routes.php';

    $isRouteFound = false;

    foreach($routes as $route => $controllerAndMethod){
      preg_match('~^' . $route . '$~', self::$url, $matches);
      if(!empty($matches)){
        $isRouteFound = true;
        break;
      }
    }

    if( !$isRouteFound ){
      die('Page not found');
    }

    list($ctrlName, $methodName) = $controllerAndMethod;
    if( !file_exists('Core/Controllers/' . $ctrlName . '.php') ){
      die('Controller ' . $ctrlName . ' not found');
    }

    $controller = new ('Core\\Controllers\\' . $ctrlName)();

    if(!method_exists($controller, $methodName)){
      die("Method $methodName in controller $ctrlName not found" );
    }
    unset($matches[0]);
    $controller->$methodName(...$matches);

  }


}