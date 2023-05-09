<?php

namespace Core\Controllers;

use Core\Lib\View;
use Core\Models\Category;
use Core\Models\News;

class MainController extends Controller
{
  public function index(): void
  {
    $news = News::all();
    $categories = Category::all();

    View::render('home', compact('news', 'categories'));
  }

  public function contacts(): void
  {
    View::render('pages/contacts');
  }

  public function news(int $id): void
  {
    $new = News::findOrFail($id);
    View::render('new', compact('new'));
  }
}


