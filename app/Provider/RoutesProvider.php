<?php

namespace App\Provider;

use CoffeeCode\Router\Router;

class RoutesProvider {

  private $router;

  public function __construct($sysUrl)
  {
    $this->router = new Router($sysUrl);
  }

  public function router()
  {
    return $this->router;
  }

  public function dispatch(): void
  {
    $this->router->namespace('App\Controller');

    $this->router->get("/", function () {
      $this->router()->redirect("/dashboard");
    });

    $this->router->get("/dashboard", 'DashboardController:index');



    $this->router->group('product');
    $this->router->get("/",     'ProductController:index');
    $this->router->get("/add",  'ProductController:form');

    $this->router->group('product/edit');
    $this->router->get("/{id_product}",  'ProductController:form');



    $this->router->group('category');
    $this->router->get("/",     'CategoryController:index');
    $this->router->get("/add",  'CategoryController:form');

    $this->router->group('category/edit');
    $this->router->get("/{id_category}",  'CategoryController:form');



    $this->router->group('error');
    $this->router->get("/{errcode}", 'ErrorController:index');


    $this->router->dispatch();

    if ($this->router->error()) {
      $this->router->redirect("/error/{$this->router->error()}");
    }
  }

}