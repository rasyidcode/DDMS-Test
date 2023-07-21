<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HobbyMigration extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'nama'  => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'hobi'  => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP() null',
        ]);
        $this->forge->createTable('hobi');
    }

    public function down()
    {
        $this->forge->dropTable('hobi');
    }
}
