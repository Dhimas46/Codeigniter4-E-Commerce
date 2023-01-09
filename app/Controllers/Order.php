<?php

namespace App\Controllers;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\DetailProductModel;
use App\Models\DetailTransaksi;

class Order extends BaseController
{
  protected $orderModel;
  public function __construct()
  {
      $this->orderModel = new OrderModel();
      $this->productModel = new ProductModel();
      $this->detailModel = new DetailTransaksi();
  }
    public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->orderModel->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
        return view('order/get', $data);
    }
    public function get_transaksi()
    {

      $status_dipesan = 'dipesan';
      $builder_1 = $this->db->table('transaksi');
      $builder_1->select('*');
      $builder_1->join('product', 'product.id = transaksi.product_id');
      $builder_1->join('users', 'users.id = transaksi.user_id');
      $builder_1->where('order_status', $status_dipesan);
      $query_1   = $builder_1->get();

      $status_diproses = 'diproses';
      $builder_2 = $this->db->table('transaksi');
      $builder_2->select('*');
      $builder_2->join('product', 'product.id = transaksi.product_id');
      $builder_2->join('users', 'users.id = transaksi.user_id');
      $builder_2->where('order_status', $status_diproses);
      $query_2   = $builder_2->get();

      $status_dikirim = 'dikirim';
      $builder_3 = $this->db->table('transaksi');
      $builder_3->select('*');
      $builder_3->join('product', 'product.id = transaksi.product_id');
      $builder_3->join('users', 'users.id = transaksi.user_id');
      $builder_3->where('order_status', $status_dikirim);
      $query_3   = $builder_3->get();

      $status_selesai = 'selesai';
      $builder_4 = $this->db->table('transaksi');
      $builder_4->select('*');
      $builder_4->join('product', 'product.id = transaksi.product_id');
      $builder_4->join('users', 'users.id = transaksi.user_id');
      $builder_4->where('order_status', $status_selesai);
      $query_4   = $builder_4->get();


      $data = array(
        'dipesan' => $query_1->getResult(),
        'diproses' => $query_2->getResult(),
        'dikirim' => $query_3->getResult(),
        'selesai' => $query_4->getResult(),
        // 'transaksi' => $query_1->getResult()
      );

        return view('order/get', $data);
    }

    public function get($id = 0)
    {
      $status_dipesan = 'dipesan';
      $builder_1 = $this->db->table('transaksi');
      $builder_1->select('*');
      $builder_1->join('product', 'product.id = transaksi.product_id');
      $builder_1->join('users', 'users.id = transaksi.user_id');
      $builder_1->where('users.id', $id);
      $builder_1->where('order_status', $status_dipesan);
      $query_1   = $builder_1->get();

      $status_diproses = 'diproses';
      $builder_2 = $this->db->table('transaksi');
      $builder_2->select('*');
      $builder_2->join('product', 'product.id = transaksi.product_id');
      $builder_2->join('users', 'users.id = transaksi.user_id');
      $builder_2->where('users.id', $id);
      $builder_2->where('order_status', $status_diproses);
      $query_2   = $builder_2->get();

      $status_dikirim = 'dikirim';
      $builder_3 = $this->db->table('transaksi');
      $builder_3->select('*');
      $builder_3->join('product', 'product.id = transaksi.product_id');
      $builder_3->join('users', 'users.id = transaksi.user_id');
      $builder_3->where('users.id', $id);
      $builder_3->where('order_status', $status_dikirim);
      $query_3   = $builder_3->get();

      $status_selesai = 'selesai';
      $builder_4 = $this->db->table('transaksi');
      $builder_4->select('*');
      $builder_4->join('product', 'product.id = transaksi.product_id');
      $builder_4->join('users', 'users.id = transaksi.user_id');
      $builder_4->where('users.id', $id);
      $builder_4->where('order_status', $status_selesai);
      $query_4   = $builder_4->get();
      $data = array(
        'dipesan' => $query_1->getResult(),
        'diproses' => $query_2->getResult(),
        'dikirim' => $query_3->getResult(),
        'selesai' => $query_4->getResult(),
      );
      // $data['product'] = $query->getRow();
      // if (empty($data['dipesan'])) {
      //   return redirect()->to('/dashboard');
      // }
        return view('order/detail', $data);
    }
    public function save(){
    {
		// if (!$this->validate([
		// 	'bukti' => [
		// 		'rules' => 'required',
		// 		'errors' => [
		// 			'required' => '{field} Tidak boleh kosong'
		// 		]
		// 	]
		// ])) {
		// 	session()->setFlashdata('error', $this->validator->listErrors());
    //   return redirect()->to(site_url('kategori'))->with('error', 'Field Harus di isi');
		// }
    // $barang = $$this->productModel->getStock();
    //
    // $jumlah_pembelian = $this->request->getPost('qty');
    //
    // $stock = $query_1-$jumlah_pembelian;
    $fileImage = $this->request->getFile('bukti');
    $namaImage = $fileImage->getRandomName();
    $fileImage->move('bukti/', $namaImage);

		$this->orderModel->save([
			'product_id' => $this->request->getVar('id'),
      'order_status' => 'dipesan',
      'user_id' => $this->request->getVar('user'),
      'bukti' => $namaImage,
      'keterangan' => $this->request->getVar('keterangan'),
      'qty' => $this->request->getVar('qty'),
      'alamat' => $this->request->getVar('alamat'),
      'provinsi' => $this->request->getVar('provinsi'),
      'kota' => $this->request->getVar('kota'),
      'harga' => $this->request->getVar('harga'),
      'service' => $this->request->getVar('service'),
		]);

    // $id_transaksi = $this->orderModel->insertID();
    //
    // if (!empty($this->request->getVar('id_product[]'))) {
    //   foreach ($this->request->getVar('id_product[]') as $key => $value) {
    //
    //     $this->detailModel->save([
    // 			'id_transaksi' => $id_transaksi,
    //       'id_product' => $value,
    //       'id_user' => $this->request->getVar('user'),
    //       'qty' => $qty,
    //       'harga' => $this->request->getVar('harga'),
    // 		]);
    //   }
    // }
		session()->setFlashdata('success', 'Pembayaran sedang diproses tunggu 1x24 jam');
		return redirect()->to(base_url('/'));
	}
}

public function status($id)
  {
    {
     $data = [
       'order_status' => $this->request->getVar('order_status'),
     ];
    unset($data['_method']);
    $this->db->table('transaksi')->where(['id_transaksi' => $id]) -> update($data);
    return redirect()->to(site_url('transaksi'))->with('success', 'Data Berhasil Diproses');
  }
  }
}
