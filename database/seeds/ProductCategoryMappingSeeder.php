<?php

require '../../vendor/autoload.php';

use App\Provider\DataProvider;
use Phinx\Seed\AbstractSeed;

class ProductCategoryMappingSeeder extends AbstractSeed
{
  /**
   * Run Method.
   *
   * Write your database seeder using this method.
   *
   * More information on writing seeders is available here:
   * http://docs.phinx.org/en/latest/seeding.html
   */
  public function run()
  {
    $productCategoryMapping = DataProvider::getProductCategoryMapping();

    $productCategoryMappingTable = $this->table('product_category_mapping');
    $productCategoryMappingTable->insert($productCategoryMapping)
      ->saveData();
  }
}
