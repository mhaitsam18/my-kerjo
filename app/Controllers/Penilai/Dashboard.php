<?php

namespace App\Controllers\Penilai;

use App\Controllers\BaseController;
use App\Models\InformasiModel;
use App\Models\PegawaiModel;
use App\Models\PenggunaModel;
use App\Models\PenilaiModel;

class Dashboard extends BaseController
{
    protected $pegawai_model;
    protected $penilai_model;
    protected $informasi_model;
    protected $pengguna_model;

    public function __construct()
    {
        $this->pegawai_model = new PegawaiModel();
        $this->penilai_model = new PenilaiModel();
        $this->informasi_model = new InformasiModel();
        $this->pengguna_model = new PenggunaModel();
    }
    
    public function index()
    {
        $data = [
            "title" => "Dashboard Penilai",
            "jumlah_pegawai" => $this->pegawai_model->countAllResults(),
            "jumlah_penilai" => $this->penilai_model->countAllResults(),
            "jumlah_informasi" => $this->informasi_model->countAllResults(),
            "jumlah_pengguna" => $this->pengguna_model->countAllResults(),
        ];

        return view("penilai/dashboard_view", $data);
    }
}
