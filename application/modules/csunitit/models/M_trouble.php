<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trouble extends CI_Model {

	public function status()
	{
		return $this->db->order_by('id','asc')->get('troubleshooting_status')->result();
	}

}

/* End of file M_trouble.php */
/* Location: ./application/modules/csunitit/models/M_trouble.php */