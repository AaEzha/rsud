<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ruangan extends CI_Model {

	public function areas()
	{
		return $this->db->order_by('name','asc')->get('room_areas')->result();
	}

	public function area_by_id($id)
	{
		return $this->db->where('id',$id)->get('room_areas')->row();
	}

	public function categories()
	{
		return $this->db->order_by('name','asc')->get('room_categories')->result();
	}

	public function category_by_id($id)
	{
		return $this->db->where('id',$id)->get('room_categories')->row();
	}

	public function getkamar($ruangan, $area)
	{
		return $this->db->where('roomcategory_id',$ruangan)->where('roomarea_id', $area)->get('room_details')->result();
	}

}

/* End of file M_ruangan.php */
/* Location: ./application/modules/csunitit/models/M_ruangan.php */