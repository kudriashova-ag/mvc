<?php

namespace Core\Controllers;

use Core\Lib\View;
use Core\Models\Category;
use Core\Models\News;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class NewsController extends Controller
{
  public function add(): void
  {
    $categories = Category::all();
    View::render('news/add', compact('categories'));
  }

 public function store(): void
 {
    $news = new News();
    $news->title = $_POST['title'];
    $news->content = $_POST['content'];
    $news->category_id = $_POST['category'];
    $news->save(); // DB
    self::redirect('/');
 }

 public function edit(int $id)
 {
  $news = News::findOrFail($id);
  $categories = Category::all();
  View::render('news/edit', compact('news', 'categories'));
 }

 public function update(int $id)
 {
    $news = News::findOrFail($id);
    $news->title = $_POST['title'];
    $news->content = $_POST['content'];
    $news->category_id = $_POST['category'];
    $news->save(); // DB
    self::redirect('/');
 }


 public function remove(int $id)
 {
    $news = News::findOrFail($id);
    $news->remove();
    self::redirect('/');
 }

 public function pdf()
 {
      // $news = News::all();
      // $mpdf = new \Mpdf\Mpdf();
      // $mpdf->SetHeader('Document Title');
      // $mpdf->WriteHTML('<h1>News</h1>');
      // foreach($news as $item){
      //    $mpdf->WriteHTML('<h2>' . $item->title . '</h2>');
      //    $mpdf->WriteHTML('<strong>' . $item->getCategory()->name . '</strong>');
      //    $mpdf->WriteHTML('<div>' . $item->content . '</div>');
      //    $mpdf->WriteHTML('<hr>');
      // }
      // $mpdf->Output('News.pdf', 'D');


      $news = News::all();

      $spreadsheet = new Spreadsheet();
      $activeWorksheet = $spreadsheet->getActiveSheet();
      for ($i = 0; $i < count($news); $i++) { 
         $activeWorksheet->setCellValue('A' . ($i + 1), $news[$i]->title);
         $activeWorksheet->setCellValue('B' . ($i + 1), $news[$i]->content);
         $activeWorksheet->setCellValue('C' . ($i + 1), $news[$i]->getCategory() ? $news[$i]->getCategory()->name : null);
      }

      $writer = new Xlsx($spreadsheet);
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="hello_world.xlsx"');
      header('Cache-Control: max-age=0');
      $writer->save('php://output');

 }
}


/* 
title  content   category
*/