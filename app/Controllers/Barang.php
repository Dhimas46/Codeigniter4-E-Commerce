<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Models\KategoriModel;
use App\Models\DetailProductModel;

class Barang extends BaseController
{
  protected $productModel;
  public function __construct()
  {
      $this->product = new ProductModel();
      $this->kategori = new KategoriModel();
      $this->detail = new DetailProductModel();
  }
    public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->product->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
      return view('barang/get', $data);
    }

    public function details($id = 0)
    {
      $builder = $this->db->table('product');
      $builder->select('*');
      // $builder->join('kategori', 'kategori.id = product.id_kategori');
      $builder->where('id', $id);
      $query   = $builder->get();
      $data['product'] = $query->getRow();
      if (empty($data['product'])) {
        return redirect()->to('barang');
      }
        return view('barang/detail-barang', $data);
    }

    public function create()
  {
    $builder = $this->db->table('kategori');
    $builder->select('id, nama_kategori');
    $query   = $builder->get();
    $data['kategori'] = $query->getResult();
    return view('barang/add', $data);
  }
  public function edit($id = null)
    {
        if ($id != null) {
          $query = $this->db->table('product')->getWhere(['id' => $id]);
          $builder_kategori = $this->db->table('kategori');
          $builder_kategori->select('id, nama_kategori');
          $query_kategori   = $builder_kategori->get();
          if ($query->resultID->num_rows > 0) {
            $data['product'] = $query->getRow();
            $data['kategori'] = $query_kategori->getResult();
            return view ('barang/edit', $data);
          } else{
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
          }
        } else {
          throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
      $fileImage  = $this->request->getFile('gambar');
      if ($fileImage->getError() == 4) {
        $namaImage = $this->request->getVar('imageLama');
      } else{
        $namaImage = $fileImage->getRandomName();
        $fileImage->move('image_barang/', $namaImage);
        unlink('image_barang/'. $this->request->getVar('imageLama'));
      }
         $data = [
           'nama' => $this->request->getVar('nama'),
           'stock' => $this->request->getVar('stock'),
           'harga' => $this->request->getVar('harga'),
           'berat' => $this->request->getVar('berat'),
           'gambar' => $namaImage,
           'deskripsi' => $this->request->getVar('deskripsi'),
           'id_kategori' => $this->request->getVar('id_kategori')
         ];
        unset($data['_method']);
        $this->db->table('product')->where(['id' => $id])->update($data);
        return redirect()->to(site_url('barang'))->with('success', 'Peoduct Data Updated Successfully');

    }

  public function save(){
    {
    // if (!$this->validate([
    //   'nama' => [
    //     'rules' => 'required',
    //     'errors' => [
    //       'required' => '{field} Tidak boleh kosong'
    //     ]
    //   ]
    // ])) {
    //   session()->setFlashdata('error', $this->validator->listErrors());
    //   return redirect()->to(site_url('add-barang'))->with('error', 'The Image Ekstension Must Be a JPG,JPEG,PNG');
    // }
    $fileImage = $this->request->getFile('gambar');
    $namaImage = $fileImage->getRandomName();
    $fileImage->move('image_barang/', $namaImage);

    $this->product->save([
      'nama' => $this->request->getVar('nama'),
      'stock' => $this->request->getVar('stock'),
      'harga' => $this->request->getVar('harga'),
      'berat' => $this->request->getVar('berat'),
      'gambar' => $namaImage,
      'deskripsi' => $this->request->getVar('deskripsi'),
      'id_kategori' => $this->request->getVar('id_kategori')
    ]);
    // $dataimage->move('image/', $fileName);
    session()->setFlashdata('success', 'Product Data Saved Successfully');
    return redirect()->to(base_url('barang'));
  }

  }
  public function destroy($id)
    {
      //$dokumen =  $this->db->table('course')->where(['id_course' => $id]) -> delete();
      $product = new ProductModel();
      $data = $product->find($id);
      $fileImage = $data->gambar;
      if (file_exists('image_barang/'.$fileImage)) {
          unlink('image_barang/'.$fileImage);
      }
      $product->delete($id);
      return redirect()->to(site_url('barang'))->with('success', 'Product Data Deleted Successfully');
    }
}
