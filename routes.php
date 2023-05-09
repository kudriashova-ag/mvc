<?php
$routes = [
  '/' => ['MainController', 'index'],
  'contacts' => ['MainController', 'contacts'],
  'news/(\d+)' => ['MainController', 'news'],
  'news/add' => ['NewsController', 'add'],
  'news/store' => ['NewsController', 'store'],
];