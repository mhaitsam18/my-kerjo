<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\CutiModel;
use Config\Services;
use DateTime;

class Cuti extends BaseController
{
    protected $cuti_model;

    public function __construct()
    {
        $this->cuti_model = new CutiModel();
    }

    public function index()
    {
        $data = [
            "title" => "List Permohonan Cuti",
            "data_cuti" => $this->cuti_model->getAllCutiByPegawaiId(session()->get("id_pegawai"))
        ];

        return view("pegawai/cuti/index_view", $data);
    }

    public function create()
    {
        $tahun_ini = date('Y');
        $this->cuti_model->where('YEAR(tanggal_mulai)', $tahun_ini);
        $this->cuti_model->where('id_pegawai', session()->get('id_pegawai'));
        $this->cuti_model->where('status !=', 2);
        $this->cuti_model->selectSum('durasi_cuti');
        $cuti = $this->cuti_model->find();
        $sisa_cuti = 15 - $cuti[0]['durasi_cuti'];
        $data = [
            "title" => "Tambah Permohonan Cuti",
            "sisa_cuti" => $sisa_cuti,
            "validation" => Services::validation()
        ];

        return view("pegawai/cuti/create_view", $data);
    }

    public function jsonTanggalSelesai()
    {
        $tanggal_mulai = $this->request->getVar('tanggal_mulai');
        $sisa_cuti = $this->request->getVar('sisa_cuti');

        $tanggal_selesai = date('Y-m-d', strtotime("+$sisa_cuti days", strtotime($tanggal_mulai)));

        echo json_encode(['tanggal_selesai' => $tanggal_selesai, 'tanggal_mulai' => $tanggal_mulai]);
    }

    public function store()
    {
        if (!$this->validate([
            "tanggal_mulai" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal mulai cuti harus diisi."
                ]
            ],
            "tanggal_selesai" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Tanggal selesai cuti harus diisi"
                ]
            ],
            "alasan" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Alasan Cuti tidak boleh kosong"
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
        $durasi_cuti = intval($diff->format("%a"));

        if ($durasi_cuti > 15) {
            session()->setFlashdata("error", "Durasi cuti melebihi batas, durasi cuti maksimal 15 hari");
            return redirect()->back()->withInput();
        }

        // $is_exist = $this->cuti_model->where("id_pegawai", session()->get("id_pegawai"))
        //     ->where("tahun", $tahun)
        //     ->first();

        // if ($is_exist) {
        //     // session()->setFlashdata("error", "Anda hanya bisa melakukan permohonan cuti 1 kali dalam 1 tahun");
        //     session()->setFlashdata("error", "Anda hanya bisa melakukan permohonan cuti maksimal 15 hari dalam 1 tahun");
        //     return redirect()->back()->withInput();
        // }
        $tahun_ini = date('Y');
        $this->cuti_model->where('YEAR(tanggal_mulai)', $tahun_ini);
        $this->cuti_model->where('id_pegawai', session()->get('id_pegawai'));
        $this->cuti_model->where('status !=', 2);
        $this->cuti_model->selectSum('durasi_cuti');
        $cuti = $this->cuti_model->find();
        $sisa_cuti = 15 - $cuti[0]['durasi_cuti'];
        if ($sisa_cuti <= 0) {
            session()->setFlashdata("error", "Anda hanya bisa melakukan permohonan cuti maksimal 15 hari dalam 1 tahun");
            return redirect()->back()->withInput();
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
            "durasi_cuti" => $durasi_cuti,
            "alasan" => $this->request->getVar("alasan"),
            "keterangan" => $this->request->getVar("keterangan"),
            "bukti_pendukung" => $nama_file,
            "status" => 0
        ];

        $this->cuti_model->insert($data);
        session()->setFlashdata("success", "Data Cuti Berhasil Diajukan");
        return redirect()->route("pegawai/permohonan-cuti");
    }
}
