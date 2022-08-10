<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class IzinTable extends Migration
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
            'id_pegawai' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'tahun' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
            ],
            'bulan' => [
                'type' => 'INT',
                'constraint' => 2,
                'unsigned' => true,
            ],
            'tanggal_mulai' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'tanggal_selesai' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'durasi_izin' => [
                'type' => 'INT',
                "constraint" => 11,
                'null' => true,
            ],
            'alasan' => [
                'type' => 'VARCHAR',
                'constraint' => "255",
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'bukti_pendukung' => [
                'type' => 'VARCHAR',
                "constraint" => "255",
                'null' => true,
            ],
            'status' => [
                'type' => 'INT',
                "constraint" => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('izin');
    }

    public function down()
    {
        $this->forge->dropTable('izin');
    }
}
