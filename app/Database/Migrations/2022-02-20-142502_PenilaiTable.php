<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PenilaiTable extends Migration
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
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'nama_lengkap' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'no_telepon' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pas_foto' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->addForeignKey('id_pengguna', 'pengguna', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('penilai');
    }

    public function down()
    {
        $this->forge->dropTable('penilai');
    }
}
