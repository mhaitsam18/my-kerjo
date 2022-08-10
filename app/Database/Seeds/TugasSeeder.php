<?php

namespace App\Database\Seeds;

use App\Models\TugasModel;
use CodeIgniter\Database\Seeder;

class TugasSeeder extends Seeder
{
    public function run()
    {
        $tugas = new TugasModel();

        $tugas->insertBatch([
            [
                "id_bagian" => 1,
                "nama_tugas" => "Membersihkan permukaan dengan amplas",
            ],
            [
                "id_bagian" => 1,
                "nama_tugas" => "Aplikasikan dempul",
            ],
            [
                "id_bagian" => 1,
                "nama_tugas" => "Pengamplasan permukaan dempul yang tidak rata setelah kering"
            ],
            [
                "id_bagian" => 1,
                "nama_tugas" => "Masking permukaan mobil yang tidak di cat",
            ],
            [
                "id_bagian" => 1,
                "nama_tugas" => "Penyemprotan cat dasar",
            ],
            [
                "id_bagian" => 1,
                "nama_tugas" => "Pengecatan warna cat akhir",
            ],
            [
                "id_bagian" => 1,
                "nama_tugas" => "Polishing dan pengilapan",
            ],
            [
                "id_bagian" => 2,
                "nama_tugas" => "Pembersihan dan penggantian saringan udara",
            ],
            [
                "id_bagian" => 2,
                "nama_tugas" => "Penggantian saringan oli",
            ],
            [
                "id_bagian" => 2,
                "nama_tugas" => "Pemeriksaan dan penyetelan kekencangan tali kipas"
            ],
            [
                "id_bagian" => 2,
                "nama_tugas" => "Penyetelan Pengapian (Busi, Kabel busi, Koil dan distributor)"
            ],
            [
                "id_bagian" => 2,
                "nama_tugas" => "Pengukuran tekanan kompresi"
            ],
            [
                "id_bagian" => 3,
                "nama_tugas" => "Pelepasan bodi panel"
            ],
            [
                "id_bagian" => 3,
                "nama_tugas" => "Perbaiki body yang rusak/penyok"
            ],
            [
                "id_bagian" => 3,
                "nama_tugas" => "Pengamplasan",
            ],
            [
                "id_bagian" => 3,
                "nama_tugas" => "Pelapisan Antikarat",
            ],
            [
                "id_bagian" => 3,
                "nama_tugas" => "Efoksi cat dasar",
            ],
            [
                "id_bagian" => 3,
                "nama_tugas" => "Poles Finishing",
            ],
            [
                "id_bagian" => 4,
                "nama_tugas" => "Cleaning kotoran pada mobil",
            ],
            [
                "id_bagian" => 4,
                "nama_tugas" => "Memperbaiki cat yang tergores",
            ],
            [
                "id_bagian" => 4,
                "nama_tugas" => "Mengoleskan Wax pada mobil"
            ],
            [
                "id_bagian" => 4,
                "nama_tugas" => "Poles Finishing"
            ],
            [
                "id_bagian" => 5,
                "nama_tugas" => "Menghilangkan baret mobil",
            ],
            [
                "id_bagian" => 5,
                "nama_tugas" => "Poles sisa baret mobil",
            ],
            [
                "id_bagian" => 5,
                "nama_tugas" => "Oleskan obat poles",
            ],
            [
                "id_bagian" => 5,
                "nama_tugas" => "Cat Body",
            ],
            [
                "id_bagian" => 5,
                "nama_tugas" => "Pelapisan cat dengan wax",
            ],
            [
                "id_bagian" => 5,
                "nama_tugas" => "Poles Finishing"
            ],
        ]);
    }
}
