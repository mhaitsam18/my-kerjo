<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'absensi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_pegawai", "tanggal", "status_kehadiran", "created_at", "updated_at"
    ];

    // Dates
    protected $useTimestamps = true;
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

    public function getAllAbsensiCount()
    {

        $this->select("absensi.id, absensi.id_pegawai, pegawai.nama_lengkap, pegawai.nik, COUNT(absensi.id) as total_absensi");
        $this->join("pegawai", "pegawai.id = absensi.id_pegawai");
        $this->groupBy("absensi.id_pegawai");
        return $this->findAll();
    }

    public function getAllAbsensi()
    {
        $this->select("absensi.*, pegawai.nama_lengkap, pegawai.nik");
        $this->join("pegawai", "pegawai.id = absensi.id_pegawai");
        return $this->findAll();
    }

    public function getAllAbsensiByPegawai($id_pegawai)
    {
        $this->select("absensi.*, pegawai.nama_lengkap, pegawai.nik");
        $this->join("pegawai", "pegawai.id = absensi.id_pegawai");
        $this->where("absensi.id_pegawai", $id_pegawai);
        $this->orderBy("absensi.tanggal", "DESC");
        return $this->findAll();
    }

    // check if absensi is exist today
    public function checkAbsensiToday($id_pegawai)
    {
        $this->select("absensi.*, pegawai.nama_lengkap, pegawai.nik");
        $this->join("pegawai", "pegawai.id = absensi.id_pegawai");
        $this->where("absensi.id_pegawai", $id_pegawai);
        $this->where("absensi.tanggal", date("Y-m-d"));
        return $this->findAll();
    }
}
