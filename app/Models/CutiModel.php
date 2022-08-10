<?php

namespace App\Models;

use CodeIgniter\Model;

class CutiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'cuti';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_pegawai", "tahun", "bulan", "tanggal_mulai", "tanggal_selesai", "durasi_cuti", "alasan", "keterangan", "bukti_pendukung", "status", "created_at", "updated_at"
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

    public function getAllCuti()
    {
        $this->select("cuti.*, pegawai.nama_lengkap as nama_pegawai, pegawai.nik");
        $this->join("pegawai", "pegawai.id = cuti.id_pegawai");
        $this->orderBy("cuti.id", "DESC");
        return $this->findAll();
    }

    public function getAllCutiByPegawaiId($id)
    {
        $this->select("cuti.*, pegawai.nama_lengkap as nama_pegawai");
        $this->join("pegawai", "pegawai.id = cuti.id_pegawai");
        $this->orderBy("cuti.id", "DESC");
        $this->where("cuti.id_pegawai", $id);
        return $this->findAll();
    }
}
