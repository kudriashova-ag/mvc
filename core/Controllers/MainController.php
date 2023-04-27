<?php

namespace Core\Controllers;

use Core\Lib\View;

class MainController
{
  public function index(): void
  {
    $title = 'Home Page';
    $content = 'Content';
    View::render('home', compact('title', 'content'));
  }

  public function contacts(): void
  {
    View::render('pages/contacts');
  }

  public function news(int $id): void
  {
    echo $id;
  }
}


