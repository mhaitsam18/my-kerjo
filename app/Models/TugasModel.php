<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tugas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_bagian", "nama_tugas", "created_at", "updated_at"
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

    public function getAllTugas()
    {
        $this->select("tugas.*, bagian.nama_bagian");
        $this->join("bagian", "tugas.id_bagian = bagian.id");
        return $this->findAll();
    }

    public function getTugasByIdBagian($id_bagian)
    {
        $this->select('tugas.id, tugas.nama_tugas');
        $this->where('id_bagian', $id_bagian);  
        return $this->findAll();
    }
}
