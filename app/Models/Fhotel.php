<?php

namespace App\Models;

use CodeIgniter\Model;

class Fhotel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'fasilitas_umum';
    protected $primaryKey       = 'id_hotel';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_fasilitas_hotel','foto','deskripsi'];

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

    // public function join_kamar()
    // {
    //     return $this->db->table('fasilitas_kamar')
    //     ->select('*')
    //     ->join('kamar', 'kamar.id_kamar = fasilitas_kamar.id_kamar')
    //     ->get()->getResultArray();
    // }
}
