<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected   $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_pengguna", "id_bagian", "nik", "nama_lengkap", "alamat", "no_telepon", "pas_foto", "created_at", "updated_at"
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

    public function getAllPegawai()
    {
        $this->select('pegawai.*, pengguna.email');
        $this->join('pengguna', 'pengguna.id = pegawai.id_pengguna');
        return $this->findAll();
    }

    public function getDataPegawai($id)
    {
        $this->select('pegawai.*, pengguna.email');
        $this->join('pengguna', 'pengguna.id = pegawai.id_pengguna');
        return $this->find($id);
    }

    public function getIdBagianByPegawai($id)
    {
        $this->select('pegawai.id_bagian');
        return $this->find($id);
    }
}
