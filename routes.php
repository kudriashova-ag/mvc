<?php
$routes = [
  '/' => ['MainController', 'index'],
  'contacts' => ['MainController', 'contacts'],
  'news/(\d+)' => ['MainController', 'news'],
  'news/add' => ['NewsController', 'add'],
  'news/store' => ['NewsController', 'store'],
  'news/edit/(\d+)' => ['NewsController', 'edit'],
  'news/update/(\d+)' => ['NewsController', 'update'],
  'news/remove/(\d+)' => ['NewsController', 'remove'],
  'news/pdf' => ['NewsController', 'pdf'],
];