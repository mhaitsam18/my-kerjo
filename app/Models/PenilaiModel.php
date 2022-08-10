<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penilai';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_pengguna", "nama_lengkap", "alamat", "no_telepon", "pas_foto", "created_at", "updated_at"
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

    public function getAllPenilai()
    {
        // join with pengguna table
        $this->select('penilai.*, pengguna.email');
        $this->join('pengguna', 'pengguna.id = penilai.id_pengguna');
        return $this->findAll();
    }

    public function getDataPenilai($id)
    {
        $this->select('penilai.*, pengguna.email');
        $this->join('pengguna', 'pengguna.id = penilai.id_pengguna');
        return $this->find($id);
    }

}
