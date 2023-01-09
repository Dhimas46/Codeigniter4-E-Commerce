<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\ProductModel;

class History extends BaseController
{
  protected $orderModel;
  public function __construct()
  {
      $this->orderModel = new OrderModel();
      $this->productModel = new productModel();
  }
    public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->orderModel->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
        return view('order/get', $data);
    }


    public function get($id = 0)
    {
      $status_dipesan = 'diterima';
      $builder_1 = $this->db->table('transaksi');
      $builder_1->select('*');
      $builder_1->join('product', 'product.id = transaksi.product_id');
      $builder_1->join('users', 'users.id = transaksi.user_id');
      $builder_1->where('users.id', $id);
      $builder_1->where('order_status', $status_dipesan);
      $query_1   = $builder_1->get();

      $status_dipesan = 'selesai';
      $builder_2 = $this->db->table('transaksi');
      $builder_2->select('*');
      $builder_2->join('product', 'product.id = transaksi.product_id');
      $builder_2->join('users', 'users.id = transaksi.user_id');
      $builder_2->where('users.id', $id);
      $builder_2->where('order_status', $status_dipesan);
      $query_2   = $builder_2->get();


      $data = array(
        'konfirmasi' => $query_1->getResult(),
        'selesai' => $query_2->getResult(),
      );
      // $data['product'] = $query->getRow();
      // if (empty($data['dipesan'])) {
      //   return redirect()->to('/dashboard');
      // }
        return view('order/history', $data);
  }


}
