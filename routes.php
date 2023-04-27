<?php
$routes = [
  '/' => ['MainController', 'index'],
  'contacts' => ['MainController', 'contacts'],
  'news/(\d+)' => ['MainController', 'news']
];