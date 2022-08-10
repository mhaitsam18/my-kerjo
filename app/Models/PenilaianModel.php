<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penilaian';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_penilai", "id_pegawai", "id_bagian", "tanggal_penilaian", "masukan", "created_at", "updated_at"
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

    public function getAllPenilaian()
    {
        $this->select("penilaian.*, penilai.nama_lengkap as nama_penilai, penilai.no_telepon as no_telepon_penilai, pegawai.nama_lengkap as nama_pegawai, pegawai.nik, pegawai.no_telepon as no_telepon_pegawai");
        $this->join("penilai", "penilaian.id_penilai = penilai.id");
        $this->join("pegawai", "penilaian.id_pegawai = pegawai.id");
        $this->orderBy("penilaian.id", "DESC");
        return $this->findAll();
    }

    public function getAllPenilaianByIdPegawai($id)
    {
        $this->select("penilaian.*, penilai.nama_lengkap as nama_penilai, penilai.no_telepon as no_telepon_penilai, pegawai.nama_lengkap as nama_pegawai, pegawai.nik, pegawai.no_telepon as no_telepon_pegawai");
        $this->join("penilai", "penilaian.id_penilai = penilai.id");
        $this->join("pegawai", "penilaian.id_pegawai = pegawai.id");
        $this->where("penilaian.id_pegawai", $id);
        $this->orderBy("penilaian.id", "DESC");
        return $this->findAll();
    }

    public function getPenilaianByIdPegawai($id)
    {
        // join with pegawai table
        $this->select('kriteria.nama_tugas, penilaian.status');
        $this->join('kriteria', 'penilaian.id_kriteria = kriteria.id');
        $this->where('penilaian.id_pegawai', $id);
        return $this->findAll();
    }

    public function deletePenilaianByIdPegawai($id)
    {
        $this->where('id_pegawai', $id);
        return $this->delete();
    }

    public function getLatestIdPenilaian()
    {
        $this->select("id");
        $this->orderBy("id", "DESC");
        $this->limit(1);
        return $this->findAll();
    }

}
