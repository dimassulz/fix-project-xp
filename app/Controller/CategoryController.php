<?php

namespace App\Controller;

use App\Provider\TemplateProvider;

class CategoryController {

  public function index($data)
  {
    $data['title'] = 'Category';
    TemplateProvider::returnView($data['title'], 'index', $data);
  }

  public function form($data)
  {
    $data['title'] = 'New Category';
    TemplateProvider::returnView('Category', 'form', $data);
  }
}