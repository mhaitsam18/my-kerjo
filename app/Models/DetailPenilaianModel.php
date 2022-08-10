<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPenilaianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail_penilaian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id",  "id_penilaian", "id_tugas", "status", "created_at", "updated_at"
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function deleteByIdPenilaian($id)
    {
        $this->where('id_penilaian', $id);
        $this->delete();
    }

    public function getDetailPenilaian($id)
    {
        $this->select('tugas.nama_tugas, detail_penilaian.status');
        $this->join('tugas', 'detail_penilaian.id_tugas = tugas.id');
        $this->where('detail_penilaian.id_penilaian', $id);
        return $this->findAll();
    }

    public function getAllKinerjaByKaryawan($id)
    {
        $this->select("penilaian.*, detail_penilaian.id_tugas, detail_penilaian.status");
        $this->join("penilaian", "detail_penilaian.id_penilaian = penilaian.id");
        $this->where("penilaian.id_pegawai", $id);
        $this->where("detail_penilaian.status", 1);
        return $this->findAll();;
    }

    public function countTercapaiStatusByPegawai($id)
    {
        $this->select("COUNT(detail_penilaian.status) as jumlah");
        $this->join("penilaian", "detail_penilaian.id_penilaian = penilaian.id");
        $this->where("detail_penilaian.status", 1);
        $this->where("penilaian.id_pegawai", $id);
        return $this->findAll()[0]['jumlah'];
    }

    public function countTidakTercapaiStatusByPegawai($id)
    {
        $this->select("COUNT(detail_penilaian.status) as jumlah");
        $this->join("penilaian", "detail_penilaian.id_penilaian = penilaian.id");
        $this->where("detail_penilaian.status", 0);
        $this->where("penilaian.id_pegawai", $id);
        return $this->findAll()[0]['jumlah'];
    }

    public function showStatusByMonth($id)
    {
        $this->select("MONTH(penilaian.tanggal_penilaian) as bulan, COUNT(
            CASE WHEN detail_penilaian.status = 1 THEN 1 END
        ) as tercapai, COUNT(
            CASE WHEN detail_penilaian.status = 0 THEN 1 END
        ) as tidak_tercapai");
        $this->join("penilaian", "detail_penilaian.id_penilaian = penilaian.id");
        $this->where("penilaian.id_pegawai", $id);
        $this->groupBy("MONTH(penilaian.tanggal_penilaian)");
        return $this->findAll();
    }
}
