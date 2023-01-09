<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'product';
    protected $allowedFields    = ['id', 'nama', 'stock', 'harga', 'gambar', 'berat', 'deskripsi', 'id_kategori'];
    protected $returnType       = 'object';
    protected $primaryKey       = 'id';

    function getAll(){
        $builder = $this->db->table('product');
        //$builder->select('id_course', 'judul', 'dokumen', 'deskripsi', 'pemilik', 'tgl', 'jumlah_download');
        $query   = $builder->get();
        return $query->getResult();
      }
      function getStock(){
          $builder = $this->db->table('product');
          $builder->select('stock');
          $query   = $builder->get();
          return $query->getRow();
        }


    function getPaginated($num, $keyword = null){
      $builder = $this->builder();
      $builder->select('product.id as id_product, nama, stock, harga, gambar, berat, deskripsi, id_kategori, nama_kategori');
      $builder->join('kategori', 'kategori.id = product.id_kategori');
      if ($keyword != '') {
        $builder->like('nama', $keyword);
      }
    return [
        'product' => $this->paginate($num),
        'pager' =>$this->pager,
    ];
    }


}
