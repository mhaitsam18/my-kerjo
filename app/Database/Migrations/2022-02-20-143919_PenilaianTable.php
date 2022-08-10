<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenilaianTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_penilai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_bagian' => [
                "type" => "INT",
                "constraint" => 11,
                "unsigned" => true,
                "null" => true,
            ],
            "tanggal_penilaian" => [
                "type" => "DATE",
                "null" => true,
            ],
            'masukan' => [
                'type' => 'VARCHAR',
                'constraint' => "255",
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addForeignKey('id_penilai', 'penilai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_bagian', 'bagian', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('penilaian');
    }

    public function down()
    {
        $this->forge->dropTable('penilaian');
    }
}
