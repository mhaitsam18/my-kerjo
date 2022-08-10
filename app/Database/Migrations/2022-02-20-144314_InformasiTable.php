<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InformasiTable extends Migration
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
                'null' => true,
            ],
            'judul_informasi' => [
                'type' => 'VARCHAR',
                'constraint' => "255",
            ],
            'thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => "255",
                'null' => true,
            ],
            'isi_informasi' => [
                'type' => "TEXT",
            ],
            "created_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
            "updated_at" => [
                "type" => "DATETIME",
                "null" => true,
            ],
        ]);
        $this->forge->addForeignKey('id_penilai', 'penilai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('informasi');
    }

    public function down()
    {
        $this->forge->dropTable('informasi');
    }
}
