<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\DetailPenilaianModel;
use App\Models\PegawaiModel;
use App\Models\PenilaianModel;

class Penilaian extends BaseController
{
    protected $penilaian_model;
    protected $detail_penilaian_model;
    protected $pegawai_model;

    public function __construct()
    {
        $this->penilaian_model = new PenilaianModel();
        $this->detail_penilaian_model = new DetailPenilaianModel();
        $this->pegawai_model = new PegawaiModel();
    }

    public function index()
    {
        $data = [
            "title" => "List Penilaian Saya",
            "data_penilaian" => $this->penilaian_model->getAllPenilaianByIdPegawai(session()->get("id_pegawai")),
        ];

        return view("pegawai/penilaian/index_view", $data);
    }

    public function detail($id)
    {
        $detail_penilaian = $this->detail_penilaian_model->getDetailPenilaian($id);
        $data_penilaian = $this->penilaian_model->find($id);
        $data_pegawai = $this->pegawai_model->find($data_penilaian["id_pegawai"]);

        $data = [
            "title" => "Detail Penilaian",
            "detail_penilaian" => $detail_penilaian,
            "data_penilaian" => $data_penilaian,
            "data_pegawai" => $data_pegawai,
        ];

        return view("pegawai/penilaian/detail_view", $data);
    }
}
