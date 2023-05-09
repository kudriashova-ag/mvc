<?php

namespace Core\Controllers;

use Core\Lib\View;
use Core\Models\Category;
use Core\Models\News;

class NewsController
{
  public function add(): void
  {
   
    View::render('news/add');
  }

 
}


