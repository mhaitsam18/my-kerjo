<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PenggunaSeeder::class);
        $this->call(PenilaiSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(BagianSeeder::class);
        $this->call(TugasSeeder::class);
    }
}
