<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use Config\Services;

class Absensi extends BaseController
{
    protected $absensi_model;

    public function __construct()
    {
        $this->absensi_model = new AbsensiModel();
    }

    public function index()
    {
        $data = [
            "title" => "Data Absensi Saya",
            "data_absensi" => $this->absensi_model->getAllAbsensiByPegawai(session()->get("id_pegawai"))
        ];

        return view("pegawai/absensi/index_view", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Rekam Absensi",
            "validation" => Services::validation()
        ];

        return view("pegawai/absensi/create_view", $data);
    }

    public function store()
    {
        if (!$this->validate([
            "tanggal" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal tidak boleh kosong"
                ],
            ],
            "status_kehadiran" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Centang Status Kehadiran"
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $is_exist = $this->absensi_model->where("id_pegawai", session()->get("id_pegawai"))
            ->where("tanggal", $this->request->getPost("tanggal"))
            ->first();

        if ($is_exist) {
            session()->setFlashdata("error", "Anda sudah pernah melakukan absensi hari ini");
            return redirect()->back();
        }

        $data = [
            "id_pegawai" => session()->get("id_pegawai"),
            "tanggal" => $this->request->getVar("tanggal"),
            "status_kehadiran" => $this->request->getVar("status_kehadiran")
        ];

        $this->absensi_model->insert($data);
        session()->setFlashdata("success", "Data Absensi Berhasil Direkam");
        return redirect()->route("pegawai/absensi");
    }
}
