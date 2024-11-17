<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateServiceManagementTables extends Migration
{
    public function up()
    {
        // Creating the services table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'service_type' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'service_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'duration' => [
                'type'       => 'ENUM',
                'constraint' => ['1 month', '3 months', '6 months', '1 year'],
                'default'    => '1 month',
            ],
            'notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'renewed_date' => [
                'type' => 'DATE',
                'null' => true,
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
            ],
        ]);
        $this->forge->addKey('id', true); // Set id as primary key
        $this->forge->createTable('services'); // Create the table

        // Creating the notifications table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'      => true,
                'auto_increment' => true,
            ],
            'service_id' => [
                'type'       => 'INT',
                'unsigned'  => true,
            ],
            'message' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['read', 'unread'],
                'default'    => 'unread',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'default' => null,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true); // Set id as primary key
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE'); // Foreign key to link notifications with services
        $this->forge->createTable('notifications'); // Create the table
    }

    public function down()
    {
        // This function will drop the tables if the migration is rolled back
        $this->forge->dropTable('services');
        $this->forge->dropTable('notifications');
    }
}
