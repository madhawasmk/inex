<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaction extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'trid' => [
				'type' => 'BIGINT',
				'constraint' => 255,
				'unsigned' => true,
				'auto_increment' => true,
            ],
			'trdate' => [
				'type' => 'DATE',
				'null' => false
            ],
            'trname' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
            ],
            'trcategory' => [
				'type' => 'INT',
				'null' => false
            ],
			'tramount' => [
				'type' => 'DOUBLE',
				'default' => 0,
				'null' => false
            ],
            'created_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
            ],
            'updated_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
            ],
            'deleted_at' => [
				'type' => 'TIMESTAMP',
				'null' => true
            ],
        ]);
        $this->forge->addPrimaryKey('trid');
		$this->forge->addForeignKey('trcategory', 'category', 'catid');
        $this->forge->createTable('transaction');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
