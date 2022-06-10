<?php

namespace App\Provider;

class DataProvider {

  /**
   * Path of csv with the data of products and your categories
   *
   * @var string
   */
  private static $path = '../../database/data.csv';

  /**
   * Return products without category
   *
   * @return array
   */
  public static function getProductsWithoutCategories()
  {
    $productsWithCategories = self::getProductsWithCategories();

    $productsWithoutCategories = [];
    foreach($productsWithCategories as $product) {
      unset($product['categories']);
      $productsWithoutCategories[] = $product;
    }

    return $productsWithoutCategories;
  }

  /**
   * Return products whit categories in an array
   *
   * @return array
   */
  public static function getProductsWithCategories(): array
  {
    $file = fopen(self::$path, 'r');

    $products = [];

    while ($row = fgetcsv($file, 1001, ';')) {
      $products[] = [
        'name'        => $row[0],
        'sku'         => $row[1],
        'description' => $row[2],
        'amount'      => $row[3],
        'price'       => $row[4],
        'categories'  => explode('|', $row[5])
      ];
    }

    unset($products[0]);

    fclose($file);

    return $products;
  }

  /**
   * Return categories
   *
   * @return array
   */
  public static function getCategories()
  {
    $products = self::getProductsWithCategories();

    $categories = [];
    foreach($products as $product) {
        foreach($product['categories'] as $category) {
          (!in_array($category,$categories)) ? $categories[] = $category : null;
        }
    }
    

    $categoriesWithDescriptionIndex = [];
    $categoriesWithDescriptionIndex[0] = 'to unset';
    foreach($categories as $category) {
      $categoriesWithDescriptionIndex[] = [
        'name'        => $category,
        'description' => 'Description of Category'
      ];
    }

    unset($categoriesWithDescriptionIndex[0]);

    return $categoriesWithDescriptionIndex;
  }

  /**
   * Return mapping bettwen product and category
   *
   * @return array
   */
  public static function getProductCategoryMapping()
  {
    $productsWithCategories = self::getProductsWithCategories();

    $categories = self::getCategories();

    $productCategoryMapping = [];
    foreach($productsWithCategories as $idProduct => $productData) {
      foreach($productData['categories'] as $idCategoryInProductsWithCategories => $categoryNameInProductsWithCategories) {
        foreach($categories as $idCategory => $categoryData) {
          if($categoryNameInProductsWithCategories === $categoryData['name'])
          $productCategoryMapping[] = [
            'product_id'  => $idProduct,
            'category_id' => $idCategory
          ];
        }
      }
    }

    return $productCategoryMapping;
  }
}