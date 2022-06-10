<?php

namespace App\Controller;

use App\Provider\TemplateProvider;

class ErrorController {

  public function index($data)
  {
    $data['title'] = 'Error';
    TemplateProvider::returnView($data['title'], 'index', $data);
  }
}