<?php

namespace App\Controller;

use App\Provider\TemplateProvider;

class DashboardController {

  public function index($data)
  {
    $data['title'] = 'Dashboard';

    TemplateProvider::returnView($data['title'], 'index', $data);
  }
}