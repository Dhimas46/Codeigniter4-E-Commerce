<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table            = 'kategori';
    protected $allowedFields    = ['id','nama_kategori'];
    protected $returnType       = 'object';
    protected $primaryKey       = 'id';

    function getAll(){
        $builder = $this->db->table('kategori');
        $query   = $builder->get();
        return $query->getResultArray();
      }
    function getPaginated($num, $keyword = null){
      $builder = $this->builder();
      $builder->select('id, nama_kategori');
      if ($keyword != '') {
        $builder->like('nama_kategori', $keyword);
      }
    return [
        'kategori' => $this->paginate($num),
        'pager' =>$this->pager,
    ];
    }

}
