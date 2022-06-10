<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCategory extends AbstractMigration
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
    $category = $this->table('categories', [
      'id'      => 'category_id',
      'signed'  => false
    ]);

    $category->addColumn('name', 'string', [
      'limit' => 20,
      'null'  => false
    ])
      ->addColumn('description', 'text', [
        'limit' => 256,
        'null'  => true
      ])
      ->addIndex('category_id', [
        'unique' => true
      ])
      ->addIndex('category_id')
      ->create();
  }
}
