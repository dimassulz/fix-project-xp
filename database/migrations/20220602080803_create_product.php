<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateProduct extends AbstractMigration
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
    $product = $this->table('products', [
      'id'      => 'product_id',
      'signed'  => false
    ]);

    $product->addColumn('name', 'string', [
      'limit' => 120,
      'null'  => false
    ])
      ->addColumn('sku', 'string', [
        'limit' => 64,
        'null'  => false
      ])
      ->addColumn('price', 'decimal', [
        'signed'    => false,
        'default'   => 0.00,
        'limit'     => 40,
        'null'      => false,
        'precision' => 9,
        'scale'     => 2
      ])
      ->addColumn('description', 'text', [
        'limit' => 512,
        'null'  => true
      ])
      ->addColumn('amount', 'integer', [
        'limit'   => 4,
        'null'    => false,
        'signed'  => false,
        'default' => 0
      ])
      ->addIndex('product_id', [
        'unique' => true
      ])
      ->addIndex('product_id')
      ->create();
  }
}
