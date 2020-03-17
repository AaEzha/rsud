<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_petugas extends CI_Model {

	public function data($unit='2')
	{
		$query = "
				SELECT 	name, user_admin.id
				FROM 	user_accounts, user_admin
				WHERE 	user_accounts.id=user_admin.useraccount_id AND user_admin.role_id='3' AND user_accounts.unit_id='$unit' and user_accounts.status='1'
		";
		return $this->db->query($query)->result();
	}

}

/* End of file M_petugas.php */
/* Location: ./application/modules/csunitit/models/M_petugas.php */