<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'transaksi';
    protected $allowedFields    = ['id_transaksi', 'product_id', 'order_status', 'user_id', 'bukti', 'keterangan', 'qty', 'harga', 'alamat', 'provinsi', 'kota', 'service'];
    protected $returnType       = 'object';
    protected $primaryKey       = 'id';

    function getAll(){
        $builder = $this->db->table('transaksi');
        $query   = $builder->get();
        return $query->getResultArray();
      }
    function getPaginated($num, $keyword = null){
      $builder = $this->builder();
      $builder->select('*');
      $builder->join('product', 'product.id = transaksi.product_id');
      $builder->join('users', 'users.id = transaksi.user_id');
      if ($keyword != '') {
        $builder->like('nama', $keyword);
      }
    return [
        'transaksi' => $this->paginate($num),
        'pager' =>$this->pager,
    ];
    }

}
