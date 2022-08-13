<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BagianPegawai extends Migration
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
            'id_pegawai' => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
            ],
            'id_bagian' => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
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
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_bagian', 'bagian', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('bagian_pegawai');
    }

    public function down()
    {
        $this->forge->dropTable('bagian_pegawai');
    }
}
