<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_aset extends CI_Model {

	public function getaset($ruangan)
	{
		$this->db->select('apro.id, apro.name');
		$this->db->from('asset_products apro');
		$this->db->join('room_inventories rv', 'rv.assetproduct_id = apro.id');
		$this->db->join('room_details rd', 'rd.id = rv.roomdetail_id');
		$this->db->where('rd.id', $ruangan);
		return $this->db->get()->result();
	}

	public function detailaset($id)
	{
		return $this->db->where('id', $id)->get('asset_products')->row();
	}

}

/* End of file M_aset.php */
/* Location: ./application/modules/csunitit/models/M_aset.php */