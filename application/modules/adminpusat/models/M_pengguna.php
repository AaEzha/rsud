<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	
	public function id()
	{
		$data = $this->db->select('id')
						 ->from('user_accounts')
						 ->order_by('id','desc')
						 ->get()
						 ->row();
		$d = $data->id + 1;
		return $d;
	}

	public function data()
	{
		return $this->db->select('c.name, c.id, r.name as rolename')
				 ->from('user_admin a')
				 ->join('user_accounts c','c.id=a.useraccount_id')
				 ->join('roles r', 'r.id=a.role_id')
				 ->where('c.status', '1')
				 ->where('r.id', '1')
				 ->where('a.unit_id', '1')
				 ->get()
				 ->result();
	}

	public function cari()
	{
		$data = $this->input->post();
		if($data['unit_id']=='1'){
			$role_id = '1';
		}else{
			$role_id = '2';
		}
		$unit_id = $data['unit_id'];
		return $this->db->select('c.name, c.id, r.name as rolename')
				 ->from('user_admin a')
				 ->join('user_accounts c','c.id=a.useraccount_id')
				 ->join('roles r', 'r.id=a.role_id')
				 ->where('c.status', '1')
				 ->where('r.id', $role_id)
				 ->where('a.unit_id', $unit_id)
				 ->get()
				 ->result();
	}

	public function tambah() 
	{
		$post = $this->input->post();
		$id = $this->id(); // id user_accounts

		if($post['unit']=='1'){
			$role_id = '1';
		}else{
			$role_id = '2';
		}

		switch ($post['unit']) {
			case '1':
				$ids = "PUS_";
				break;
			case '2':
				$ids = "IT_";
				break;
			case '3':
				$ids = "IPS_";
				break;
			case '4':
				$ids = "ITP_";
				break;
			case '5':
				$ids = "RNG_";
				break;
			
			default:
				# code...
				break;
		}

		// input ke user_accounts
			$data = [
				'id' => htmlspecialchars(trim($id)),
				'unit_id' => htmlspecialchars(trim($post['unit'])),
				'name' => htmlspecialchars(trim($post['nama'])),
				'email' => htmlspecialchars(trim($post['email'])),
				'phone' => htmlspecialchars(trim($post['phone'])),
				'status' => htmlspecialchars(trim($post['status'])),
				'user_ent' => $this->session->id,
				'id_account_register' => $ids . time()
			];
			$this->db->set('date_ent','now()');
			$cek = $this->db->insert('user_accounts', $data);

			if ($cek) {
				// input ke user_admin
				$data = [
					'useraccount_id' => htmlspecialchars(trim($id)),
					'role_id' => htmlspecialchars(trim($role_id)),
					'unit_id' => htmlspecialchars(trim($post['unit'])),
					'username' => htmlspecialchars(trim($post['username'])),
					'password' => htmlspecialchars(trim($post['password'])),
					'user_ent' => $this->session->id
				];
				$this->db->set('date_ent','now()');
				$cek = $this->db->insert('user_admin', $data);
			if ($cek) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}

	public function detail($id='')
	{
		if($id=='' or !$id or $id<=0) redirect('adminpusat/pengguna','refresh');
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
		$id = htmlspecialchars(trim($post['id'])); // id user_accounts

		if($post['unit']=='1'){
			$role_id = '1';
		}else{
			$role_id = '2';
		}

		// input ke user_accounts
			$data = [
				'unit_id' => htmlspecialchars(trim($post['unit'])),
				'name' => htmlspecialchars(trim($post['nama'])),
				'email' => htmlspecialchars(trim($post['email'])),
				'phone' => htmlspecialchars(trim($post['phone'])),
				'status' => htmlspecialchars(trim($post['status'])),
				'user_ent' => $this->session->id,
			];
			$this->db->set('date_ent','now()');
			$cek = $this->db->update('user_accounts', $data, compact('id'));

			if ($cek) {
				// input ke user_admin
				$data = [
					'role_id' => htmlspecialchars(trim($role_id)),
					'unit_id' => htmlspecialchars(trim($post['unit'])),
					'username' => htmlspecialchars(trim($post['username'])),
					'password' => htmlspecialchars(trim($post['password'])),
					'user_ent' => $this->session->id
				];
				$this->db->set('date_ent','now()');
				$cek = $this->db->update('user_admin', $data, ['useraccount_id'=>$id]);
			if ($cek) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function hapus($id)
	{
		// $post = $this->input->post();
		$id = htmlspecialchars(trim($id));

		// hapus user_accounts
		$this->db->delete('user_admin', ['useraccount_id'=>$id]);
		
		return $this->db->delete('user_accounts', compact('id'));
	}

	public function jumlah($status='1')
	{
		$data = $this->db->select('a.id')
				 ->from('user_admin a')
				 ->join('user_accounts c','c.id=a.useraccount_id')
				 ->join('roles r','r.id=a.role_id')
				 ->where('c.status',$status)
				 ->get();
		return $data->num_rows();
	}

}

/* End of file M_pengguna.php */
/* Location: ./application/modules/adminpusat/models/M_pengguna.php */