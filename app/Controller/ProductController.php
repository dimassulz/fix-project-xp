<?php

namespace App\Controller;

use App\Provider\TemplateProvider;

class ProductController {

  public function index($data)
  {
    $data['title'] = 'Product';
    TemplateProvider::returnView($data['title'], 'index', $data);
  }

  public function form($data)
  {
    $data['title'] = 'New Product';
    TemplateProvider::returnView('Product', 'form', $data);
  }
}