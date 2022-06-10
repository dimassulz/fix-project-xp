<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProductCategoryMapping extends AbstractMigration
{
  /**
   * Change Method.
   *
   * Write your reversible migrations using this method.
   *
   * More information on writing migrations is available here:
   * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
   *
   * Remember to call "create()" or "update()" and NOT "save()" when working
   * with the Table class.
   */
  public function change(): void
  {
    $productCategoryMapping = $this->table('product_category_mapping', [
      'id' => false,
      'primary_key' => [
        'product_id',
        'category_id'
      ]
    ]);

    $productCategoryMapping->addColumn('product_id', 'integer', [
      'null' => false,
      'signed' => false
    ])
      ->addColumn('category_id', 'integer', [
        'null' => false,
        'signed' => false
      ])
      ->addIndex('product_id')
      ->addIndex('category_id')
      ->create();
  }
}
