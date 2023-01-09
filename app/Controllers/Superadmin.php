<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Superadmin extends BaseController
{
  protected $usersModel;
    public function __construct()
    {
        $this->user = new UsersModel();
    }
    public function get_user()
    {
      $keyword = $this->request->getGet('keyword');
      $data = $this->user->getPaginated(5, $keyword);
      $data['keyword'] = $keyword;
        return view('superadmin/manage-user', $data);
    }
    public function detail_user($id = 0)
    {
      $builder = $this->db->table('users');
      $builder->select('users.id as userid, username, telp, alamat, image, email, name, fullname');
      $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
      $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
      $builder->where('users.id', $id);
      $query   = $builder->get();
      $data['user'] = $query->getRow();
      if (empty($data['user'])) {
        return redirect()->to('/superadmin');
      }
        return view('superadmin/detail', $data);
    }
    public function update_user($id)
    {
      $builder = $this->db->table('auth_groups_users');
       $data = [
         'group_id' => $this->request->getVar('group_id')
       ];
      unset($data['_method']);
      $this->db->table('auth_groups_users')->where(['user_id' => $id]) -> update($data);
      return redirect()->to(site_url('superadmin/'.$id))->with('success', 'Profile Data Updated Successfully');
    }
}
