<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\BagianModel;
use App\Models\BagianPegawaiModel;
use App\Models\PegawaiModel;
use App\Models\DetailPenilaianModel;
use App\Models\InformasiModel;
use App\Models\PenilaianModel;
use App\Models\TugasModel;

class Dashboard extends BaseController
{
    protected $informasi_model;
    protected $penilaian_model;
    protected $detail_penilaian_model;
    protected $bagian_pegawai_model;
    protected $bagian_model;
    protected $tugas_model;
    protected $absensi_model;
    protected $pegawai_model;

    public function __construct()
    {
        $this->informasi_model = new InformasiModel();
        $this->penilaian_model = new PenilaianModel();
        $this->detail_penilaian_model = new DetailPenilaianModel();
        $this->bagian_model = new BagianModel();
        $this->tugas_model = new TugasModel();
        $this->absensi_model = new AbsensiModel();
        $this->pegawai_model = new PegawaiModel();
        $this->bagian_pegawai_model = new BagianPegawaiModel();
    }

    public function index()
    {

        $tercapai = $this->detail_penilaian_model->countTercapaiStatusByPegawai(session()->get('id_pegawai'));
        $tidak_tercapai = $this->detail_penilaian_model->countTidakTercapaiStatusByPegawai(session()->get('id_pegawai'));
        $status_by_month = $this->detail_penilaian_model->showStatusByMonth(session()->get('id_pegawai'));
        $absensi = $this->absensi_model->checkAbsensiToday(session()->get('id_pegawai'));

        $data = [
            "title" => "Dashboard Pegawai",
            "jumlah_informasi" => $this->informasi_model->countAllResults(),
            "jumlah_tugas" => $this->bagian_model->countTotalByIdPegawai(session()->get('id_pegawai')),
            "tercapai" => $tercapai,
            "tidak_tercapai" => $tidak_tercapai,
            "status_bulanan" => $status_by_month,
            "absensi" => $absensi,
        ];

        return view("pegawai/dashboard_view", $data);
    }

    public function list_tugas()
    {
        $data = [
            "title" => "List Tugas Saya",
            "list_tugas" => $this->bagian_model->getBagianByPegawai(session()->get('id_pegawai')),
        ];

        return view("pegawai/list_tugas_view", $data);
    }

    public function detail_list_tugas($id)
    {
        $data = [
            "title" => "Detail List Tugas",
            "data_bagian" => $this->bagian_model->getBagianById($id),
            "data_pegawai" => $this->pegawai_model->getPegawaiByIdBagian($id),
            "detail_tugas" => $this->tugas_model->getTugasByIdBagian($id),
        ];

        return view("pegawai/detail_list_tugas_view", $data);
    }

    public function get_count_tugas_and_informasi()
    {
        $data = [
            "total_tugas" => $this->bagian_model->countTotalByIdPegawai(session()->get('id_pegawai')),
            "total_informasi" => $this->informasi_model->countAllResults(),
        ];

        echo json_encode($data);
    }

    public function tugas_selesai($id_bagian = null)
    {
        $data = ['status' => 1];
        $this->bagian_model->update($id_bagian, $data);

        $this->bagian_pegawai_model->where('id_bagian', $id_bagian);
        $bagian_pegawai = $this->bagian_pegawai_model->findAll();
        foreach ($bagian_pegawai as $bp) {
            $data_penilaian = [
                // "id_pegawai" => session()->get('id_pegawai'),
                "id_pegawai" => $bp['id_pegawai'],
                "id_bagian" => $id_bagian,
                "masukan" => "",
                "tanggal_penilaian" => date("Y-m-d"),
            ];

            $this->penilaian_model->insert($data_penilaian);
            $id_penilaian = $this->penilaian_model->insertID();

            $this->tugas_model->where('id_bagian', $id_bagian);
            $tugas = $this->tugas_model->findALl();

            foreach ($tugas as $t) {
                $data_detail_penilaian = [
                    "id_penilaian" => $id_penilaian,
                    "id_tugas" => $t['id'],
                    "status" => 0
                ];
                $this->detail_penilaian_model->insert($data_detail_penilaian);
            }
        }
        session()->setFlashdata("success", "Pekerjaan Telah Selesai");
        return redirect()->back();
    }
}
