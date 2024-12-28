<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'catid' => [
				'type' => 'BIGINT',
				'constraint' => 255,
				'unsigned' => true,
				'auto_increment' => true,
            ],
            'catname' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
            ],
            'cattype' => [
				'type' => 'TEXT'
            ],
			'isdeleted' => [
				'type' => 'INT',
				'default' => 0
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
        $this->forge->addPrimaryKey('catid');
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
