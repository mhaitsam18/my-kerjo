<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class BagianTable extends Migration
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
            // 'id_pegawai' => [
            //     'type' => 'INT',
            //     'constraint' => 11,
            //     'unsigned' => true,
            // ],
            'id_pekerjaan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            // 'nama_bagian' => [
            //     'type' => 'VARCHAR',
            //     'constraint' => '100',
            // ],
            'plat_mobil' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_mobil' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            "status" => [
                'type' => "INT",
                'constraint' => 11,
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

        // $this->forge->addForeignKey('id_pegawai', 'pegawai', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addKey('id', true);
        $this->forge->createTable('bagian');
    }

    public function down()
    {
        $this->forge->dropTable('bagian');
    }
}
