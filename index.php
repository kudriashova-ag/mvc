<?php

use Core\Exceptions\NotFoundException;
use Core\Lib\View;

spl_autoload_register(function ($class) {
  $class = str_replace('\\', '/', $class);
  require_once "./$class.php";
});

try {
  \Core\Lib\Route::start();
} catch (NotFoundException $e) {
  View::render('errors/404');
} catch (PDOException $e) {
  echo $error->getMessage();
}
