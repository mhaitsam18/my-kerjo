<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tugas extends Migration
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
            'id_bagian' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_detail_pekerjaan' => [
                'type' => 'INT',
                'constraint' => 11,
                // 'unsigned' => true,
            ],
            // 'nama_tugas' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => '100',
            // ],
            'penilaian' => [
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
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('id_bagian', 'bagian', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('tugas');
    }

    public function down()
    {
        $this->forge->dropTable('tugas');
    }
}
