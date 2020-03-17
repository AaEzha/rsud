<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function login()
	{
		$data = $this->input->post();
		$this->db->select('a.unit_id, a.role_id, c.id, c.name as nama');
		$this->db->join('user_accounts c', 'c.id = a.useraccount_id');
		$this->db->where('a.username', $data['username']);
		$this->db->where('a.password', $data['password']);
		$this->db->where('a.role_id', '1'); // 1 untuk Admin Pusat
		return $this->db->get('user_admin a')->row();
	}

	public function cek()
	{
		$data = $this->input->post();
		$auth = $data['auth'];
		$where = "c.email='$auth' and a.role_id='1' or c.phone='$auth' and a.role_id='1'";
		$this->db->select('c.email, c.name, a.username, a.password');
		$this->db->join('user_accounts c', 'c.id = a.useraccount_id');
		$this->db->where($where);
		return $this->db->get('user_admin a')->row();
	}

}

/* End of file M_auth.php */
/* Location: ./application/modules/adminpusat/models/M_auth.php */