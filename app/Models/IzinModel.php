<?php

namespace App\Models;

use CodeIgniter\Model;

class IzinModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'izin';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_pegawai", "tahun", "bulan", "tanggal_mulai", "tanggal_selesai", "durasi_izin", "alasan", "keterangan", "bukti_pendukung", "status", "created_at", "updated_at"
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

    public function getAllIzin()
    {
        $this->select("izin.*, pegawai.nama_lengkap as nama_pegawai, pegawai.nik");
        $this->join("pegawai", "pegawai.id = izin.id_pegawai");
        $this->orderBy("izin.id", "DESC");
        return $this->findAll();
    }

    public function getAllIzinByPegawaiId($id)
    {
        $this->select("izin.*, pegawai.nama_lengkap as nama_pegawai");
        $this->join("pegawai", "pegawai.id = izin.id_pegawai");
        $this->where("izin.id_pegawai", $id);
        $this->orderBy("izin.id", "DESC");
        return $this->findAll();
    }

    public function checkIzinThisMonth($date)
    {
        $this->select("izin.*, pegawai.nama_lengkap as nama_pegawai");
        $this->join("pegawai", "pegawai.id = izin.id_pegawai");
        $this->where("izin.tanggal_mulai", $date);
        return $this->findAll();
    }
}
