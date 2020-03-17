<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	public function detail($id='')
	{
		if($id=='' or !$id or $id<=0) redirect('adminpusat/auth','refresh');
		$id = $this->session->id ?? redirect('adminpusat/auth','refresh');
		return $this->db->select('c.id, c.name, c.unit_id, c.status, c.email, c.phone, a.username, a.password, u.name as unitname, u.id as unitid, r.name as rolename')
				 ->from('user_accounts c')
				 ->join('user_admin a','a.useraccount_id=c.id')
				 ->join('units u','u.id=c.unit_id')
				 ->join('roles r','r.id=a.role_id')
				 ->where('c.id', $id)
				 ->get()
				 ->row();
	}

	public function ubah()
	{
		$post = $this->input->post();
		$id = $this->session->id ?? redirect('adminpusat/auth','refresh');

		// input ke user_admin
		$data = [
			'role_id' => htmlspecialchars(trim($post['role_id'])),
			'unit_id' => htmlspecialchars(trim($post['unit_id'])),
			'username' => htmlspecialchars(trim($post['username'])),
			'password' => htmlspecialchars(trim($post['password'])),
			'user_ent' => $this->session->id
		];
		$this->db->set('date_ent','now()',false);
		$where = ['useraccount_id', $id];
		$cek = $this->db->update('user_admin', $data, $where);

		if ($cek) {
			// input ke user_accounts
			$data = [
				'unit_id' => htmlspecialchars(trim($post['unit_id'])),
				'name' => htmlspecialchars(trim($post['name'])),
				'email' => htmlspecialchars(trim($post['email'])),
				'phone' => htmlspecialchars(trim($post['phone'])),
				'status' => htmlspecialchars(trim($post['status'])),
				'user_ent' => $this->session->id
			];
			$this->db->set('date_ent','now()',false);
			$where = ['id', $id];
			$cek = $this->db->update('user_accounts', $data, $where);
			if ($cek) {
				return true;
			} else {
				return false;
			}	
		} else {
			return false;
		}	
	}

}

/* End of file M_Profil.php */
/* Location: ./application/modules/adminpusat/models/M_Profil.php */