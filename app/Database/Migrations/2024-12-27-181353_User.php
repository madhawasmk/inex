<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
            ],
            'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
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
        $this->forge->addPrimaryKey('username');
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
