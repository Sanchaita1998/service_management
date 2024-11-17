<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
    public function up()
    {
        // Create admin table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
          'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'default' => null,
                'null' => true,
                'on_update' => 'DATETIME', // Automatically updates on change
            ],
        ]);
        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('admin'); // Create the table
    }

    public function down()
    {
        // Drop the admin table
        $this->forge->dropTable('admin');
    }
}
