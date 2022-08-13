<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPekerjaan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "auto_increment" => true,
            ],
            'id_pekerjaan' => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            'detail_pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            "created_at" => [
                "type" => "TIMESTAMP",
                "null" => true,
            ],
            "updated_at" => [
                "type" => "TIMESTAMP",
                "null" => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_pekerjaan', 'pekerjaan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('detail_pekerjaan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pekerjaan');
    }
}
