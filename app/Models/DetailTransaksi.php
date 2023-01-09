<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksi extends Model
{
    protected $table            = 'detail_transaksi';
    protected $allowedFields    = ['id', 'id_transaksi', 'userid', 'id_product', 'qty', 'harga'];
    protected $returnType       = 'object';
    protected $primaryKey       = 'id';


    function getDetail(){
        $builder = $this->db->table('detail_transaksi');
        $status_dipesan = 'dipesan';
        $builder->select('*');
        $builder->join('transaksi', 'transaksi.id = detail_transaksi.id_transaksi');
        $builder->join('product', 'product.id = detail_transaksi.id_product');
        $builder->join('users', 'users.id = detail_transaksi.userid');
        $builder->where('order_status', $status_dipesan);
        $query   = $builder->get();
        return $query->getResult();
      }

    function getAll(){
        $builder = $this->db->table('detail_transaksi');
        $query   = $builder->get();
        return $query->getResultArray();
      }
      function getPaginated($num, $keyword = null){
        $builder = $this->builder();
        $builder->select('*');
        $builder->join('transaksi', 'transaksi.id = detail_transaksi.id_transaksi');
        $builder->join('product', 'product.id = detail_transaksi.id_product');
        $builder->join('users', 'users.id = detail_transaksi.userid');
        if ($keyword != '') {
          $builder->like('nama', $keyword);
        }
      return [
          'transaksi' => $this->paginate($num),
          'pager' =>$this->pager,
      ];
      }

}
