<?php

namespace App\Provider;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TemplateProvider {

  public static function getFileSystem()
  {
    return new FilesystemLoader('app/View', '/assessment-backend-xp');
  }

  public static function render($loader, $file, $data)
  {
    $file = 'Module/'.$file.'.twig';

    (new Environment($loader))->display($file, $data);
  }

  public static function returnView($module, $page, $data)
  {
    $view = $module.'/'.$page;

    $fileSystem = TemplateProvider::getFileSystem();

    self::render($fileSystem, $view, $data);
  }
}