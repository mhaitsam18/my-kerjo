<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPenilaian extends Migration
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
            "id_penilaian" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "id_tugas" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "status" => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            "created_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "updated_at" => [
                "type" => "DATETIME",
                "null" => true
            ]
        ]);

        $this->forge->addForeignKey('id_penilaian', 'penilaian', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_tugas', 'tugas', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('detail_penilaian');

    }

    public function down()
    {
        $this->forge->dropTable('detail_penilaian');
    }
}
