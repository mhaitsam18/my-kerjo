<?php

namespace App\Controllers\Pegawai;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\BagianModel;
use App\Models\DetailPenilaianModel;
use App\Models\InformasiModel;
use App\Models\PenilaianModel;
use App\Models\TugasModel;

class Dashboard extends BaseController
{
    protected $informasi_model;
    protected $penilaian_model;
    protected $detail_penialain_model;
    protected $bagian_model;
    protected $tugas_model;
    protected $absensi_model;

    public function __construct()
    {
        $this->informasi_model = new InformasiModel();
        $this->penilaian_model = new PenilaianModel();
        $this->detail_penialain_model = new DetailPenilaianModel();
        $this->bagian_model = new BagianModel();
        $this->tugas_model = new TugasModel();
        $this->absensi_model = new AbsensiModel();
    }

    public function index()
    {

        $tercapai = $this->detail_penialain_model->countTercapaiStatusByPegawai(session()->get('id_pegawai'));
        $tidak_tercapai = $this->detail_penialain_model->countTidakTercapaiStatusByPegawai(session()->get('id_pegawai'));
        $status_by_month = $this->detail_penialain_model->showStatusByMonth(session()->get('id_pegawai'));
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
            "data_bagian" => $this->bagian_model->find($id),
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


}
