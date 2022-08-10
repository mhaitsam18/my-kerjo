<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\IzinModel;
use Config\Services;

class Izin extends BaseController
{
    protected $izin_model;

    public function __construct()
    {
        $this->izin_model = new IzinModel();
    }

    public function index()
    {
        $data = [
            "title" => "List Permohonan Izin",
            "data_izin" => $this->izin_model->getAllIzinByPegawaiId(session()->get("id_pegawai"))
        ];

        return view("pegawai/izin/index_view", $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Permohonan Izin",
            "validation" => Services::validation()
        ];

        return view("pegawai/izin/create_view", $data);
    }

    public function store()
    {
        if (!$this->validate([
            "tanggal_mulai" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal mulai izin harus diisi."
                ]
            ],
            "tanggal_selesai" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal selesai izin harus diisi"
                ]
            ],
            "alasan" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Alasan izin tidak boleh kosong"
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $tanggal_mulai = $this->request->getVar("tanggal_mulai");
        $tanggal_selesai = $this->request->getVar("tanggal_selesai");
        $tahun = date("Y", strtotime($tanggal_mulai));
        $bulan = date("m", strtotime($tanggal_mulai));

        $start = date_create($tanggal_mulai);
        $end = date_create($tanggal_selesai);
        $diff = date_diff($start, $end);
        $durasi_izin = intval($diff->format("%a"));

        if ($durasi_izin > 5) {
            session()->setFlashdata("error", "Durasi izin melebihi batas, durasi izin maksimal 5 hari");
            return redirect()->back()->withInput();
        }

        $is_exist = $this->izin_model->where("id_pegawai", session()->get("id_pegawai"))
            ->where("bulan", $bulan)
            ->where("tahun", $tahun)
            ->first();

        if ($is_exist) {
            session()->setFlashdata("error", "Permohonan Izin hanya dapat dilakukan 1 kali per bulan");
            return redirect()->back();
        }

        if ($this->request->getFile("bukti_pendukung")->getName() !== "") {
            $bukti_pendukung = $this->request->getFile("bukti_pendukung");
            $nama_file = $bukti_pendukung->getRandomName();
            $bukti_pendukung->move("uploads/bukti_pendukung/izin/", $nama_file);
        } else {
            $nama_file = null;
        }

        $data = [
            "id_pegawai" => session()->get("id_pegawai"),
            "tahun" => $tahun,
            "bulan" => $bulan,
            "tanggal_mulai" => $tanggal_mulai,
            "tanggal_selesai" => $tanggal_selesai,
            "durasi_izin" => $durasi_izin,
            "alasan" => $this->request->getVar("alasan"),
            "keterangan" => $this->request->getVar("keterangan"),
            "bukti_pendukung" => $nama_file,
            "status" => 0
        ];

        $this->izin_model->insert($data);
        session()->setFlashdata("success", "Permohonan izin berhasil dibuat.");

        return redirect()->route("pegawai/permohonan-izin");
    }
}
