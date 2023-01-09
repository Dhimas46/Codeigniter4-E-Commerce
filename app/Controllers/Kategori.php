<?php

namespace App\Controllers;
use App\Models\KategoriModel;
class Kategori extends BaseController
{
  protected $kategoriModel;
  public function __construct()
  {
      $this->kategoriModel = new KategoriModel();
  }
    public function index()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->kategoriModel->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
      return view('master/kategori/get', $data);
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
public function edit($id = null)
  {
      if ($id != null) {
        $query = $this->db->table('kategori')->getWhere(['id' => $id]);
        if ($query->resultID->num_rows > 0) {
          $data['kategori'] = $query->getRow();
          return view ('master/kategori/edit', $data);
        } else{
          throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
      } else {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
  }
public function update($id)
{
  {
     $data = [
       'nama_kategori' => $this->request->getVar('nama_kategori')
     ];
    unset($data['_method']);
    $this->db->table('kategori')->where(['id' => $id])->update($data);
    return redirect()->to(site_url('kategori'))->with('success', 'Kategori Data Updated Successfully');
  }
}
public function destroy($id)
    {
      //$dokumen =  $this->db->table('course')->where(['id_course' => $id]) -> delete();
      $kategori = new KategoriModel();
      $kategori->delete($id);
      return redirect()->to(site_url('kategori'))->with('success', 'Kategori Data Deleted Successfully');
    }

}
