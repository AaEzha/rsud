<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	// role 4 : CS
	// unit 2 : IT

	public function login()
	{
		$data = $this->input->post();
		$this->db->select('a.unit_id, a.role_id, c.id, c.name as nama, u.name as unitname, r.name as rolename');
		$this->db->join('user_accounts c', 'c.id = a.useraccount_id');
		$this->db->join('units u', 'u.id = a.unit_id');
		$this->db->join('roles r', 'r.id = a.role_id');
		$this->db->where('a.username', $data['username']);
		$this->db->where('a.password', $data['password']);
		$this->db->where('a.role_id', '4');
		$this->db->where('a.unit_id', '2');
		return $this->db->get('user_admin a')->row();
	}

	public function cek()
	{
		$data = $this->input->post();
		$auth = $data['auth'];
		$where = "c.email='$auth' and a.role_id='4' and a.unit_id='2' or c.phone='$auth' and a.role_id='4' and a.unit_id='2'";
		$this->db->select('c.email, c.name, a.username, a.password');
		$this->db->join('user_accounts c', 'c.id = a.useraccount_id');
		$this->db->where($where);
		return $this->db->get('user_admin a')->row();
	}

}

/* End of file M_auth.php */
/* Location: ./application/modules/adminpusat/models/M_auth.php */