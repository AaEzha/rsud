<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_profil extends CI_Model {

	public function detail($id='')
	{
		if($id=='' or !$id or $id<=0) redirect('csunitit/auth','refresh');
		$id = $this->session->id ?? redirect('csunitit/auth','refresh');
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
		$id = $this->session->id ?? redirect('csunitit/auth','refresh');
		$data = [
			'name' => htmlspecialchars(trim($post['nama'])),
			'email' => htmlspecialchars(trim($post['email'])),
			'phone' => htmlspecialchars(trim($post['phone'])),
			'user_ent' => $this->session->id
		];
		$this->db->set('date_ent','now()',false);
		$where = ['id' => $id];
		$cek = $this->db->update('user_accounts', $data, $where);
		if ($cek) {
			return true;
		} else {
			return false;
		}
	}

	public function password()
	{
		$post = $this->input->post();
		$id = $this->session->id ?? redirect('csunitit/auth','refresh');
		$password = htmlspecialchars(trim($post['password']));
		$nama = $this->session->nama;
		$query = "
					WITH user_admin AS (
					        UPDATE user_admin
					        SET password = '$password'
					        WHERE useraccount_id = '$id'
					        RETURNING *
					        )
					UPDATE user_accounts
					SET name='$nama'
					FROM user_admin
					WHERE user_accounts.id = '$id'
		";
		// $data = [
		// 	'username' => htmlspecialchars(trim($post['password']))
		// ];
		// $where = ['id' => $id];
		$cek = $this->db->query($query);
		if ($cek) {
			return true;
		} else {
			return false;
		}
	}

}

/* End of file M_Profil.php */
/* Location: ./application/modules/csunitit/models/M_Profil.php */