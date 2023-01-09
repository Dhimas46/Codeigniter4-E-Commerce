<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailProductModel extends Model
{
    protected $table            = 'product';
    protected $allowedFields    = ['id,nama, stock, harga, gambar, gambar_2, gambar_3, gambar_4, deskripsi'];
    protected $returnType       = 'object';
    protected $primaryKey       = 'id';

    function getPaginated($id= 0, $num, $keyword = null){
      $builder = $this->builder();
      $builder->select('id, nama, stock, harga, gambar, gambar_2, gambar_3, gambar_4, deskripsi');
      $builder->select('id', $id);
      if ($keyword != '') {
        $builder->like('nama', $keyword);
      }
    return [
        'product' => $this->paginate($num),
        'pager' =>$this->pager,
    ];
    }

}
