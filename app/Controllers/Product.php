<?php

namespace App\Controllers;
use App\Models\DetailProductModel;


class Product extends BaseController
{
  public function __construct()
  {
      $this->product = new DetailProductModel();
  }
  public function details($id = 0)
  {
    $keyword = $this->request->getGet('keyword');
    $data = $this->product->getPaginated(5, $keyword);
    $data['keyword'] = $keyword;
    $builder = $this->db->table('product');
    $builder->select('id, nama, stock, harga, gambar, gambar_2, gambar_3, gambar_4, deskripsi');
    $builder->where('id', $id);
    $query   = $builder->get();
    $data['product'] = $query->getRow();
    if (empty($data['product'])) {
      return redirect()->to('');
    }
      return view('themes/store/product/detail', $data);
  }

  public function save(){
    
  {
  if (!$this->validate([
    'nama_kategori' => [
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Tidak boleh kosong'
      ]
    ]
  ])) {
    session()->setFlashdata('error', $this->validator->listErrors());
    return redirect()->to(site_url('kategori'))->with('error', 'Field Harus di isi');
  }
  $this->kategoriModel->save([
    'nama_kategori' => $this->request->getVar('nama_kategori')
  ]);
  session()->setFlashdata('success', 'Kategori Data Saved Successfully');
  return redirect()->to(base_url('kategori'));
}
}

}
