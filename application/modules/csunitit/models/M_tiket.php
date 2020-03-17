<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tiket extends CI_Model {

	public function id()
	{
		$data = $this->db->select('id')
						 ->from('troubleshooting_tickets')
						 ->order_by('id','desc')
						 ->get();

		$jum = $data->num_rows();
		$res = $data->row();
		if($jum>=1){
			$d = $res->id + 1;
		}else{
			$d = 1;
		}
		
		return $d;
	}

	public function cek($id)
	{
		return $this->db->where('id', $id)->get('troubleshooting_tickets')->row();
	}

	public function simpan()
	{
		$post = $this->input->post();
		$data = [
			'id' => htmlspecialchars(trim($post['idtroubleshooting'])),
			'roomdetail_id' => htmlspecialchars(trim($post['detail'])),
			'roomcategory_id' => htmlspecialchars(trim($post['ruangan'])),
			'unit_id' => $this->session->unit_id,
			'id_ticket_register' => htmlspecialchars(trim($post['tiket'])),
			'useradmin_id' => $this->session->id,
			'user_name' => htmlspecialchars(trim($post['nama'])),
			'description' => htmlspecialchars(trim($post['keluhan'])),
			'troubleshootingstatus_id' => 1,
			'user_ent' => $this->session->id,
			'troubleshootingtype_id' => 1
		];
		$this->db->set('ticket_date','now()');
		$this->db->set('ticket_closed_date','now()');
		$this->db->set('date_ent','now()');
		$cek = $this->db->insert('troubleshooting_tickets', $data);
		if ($cek) {
			$data = [
				'troubleshootingticket_id' => htmlspecialchars(trim($post['idtroubleshooting'])),
				'assetproduct_id' => htmlspecialchars(trim($post['aset'])),
				'troubleshootingactivity_id' => 1,
				'useradmin_id' => $this->session->id,
				'id_ticket_register' => htmlspecialchars(trim($post['tiket'])),
				'id_asset_register' => htmlspecialchars(trim($post['id_asset_register'])),
				'asset_name' => htmlspecialchars(trim($post['asset_name'])),
				'description' => htmlspecialchars(trim($post['keluhan'])),
				'user_ent' => $this->session->id
			];
			$this->db->set('date_ent','now()');
			$this->db->set('process_date','now()');
			$cek = $this->db->insert('troubleshootings', $data);
			if ($cek) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	// public function simpan()
	// {
	// 	$post = $this->input->post();
	// 	var_dump($post); die();
	// 	$cek = $this->cek($post['idtroubleshooting']);
	// 	if($cek){
	// 		var_dump($this->input->post()); die();

	// 		$id = $this->session->t_idtroubleshooting;
	// 		$data = [
	// 			'troubleshootingticket_id' => $id,
	// 			'assetproduct_id' => htmlspecialchars(trim($post['aset'])),
	// 			'troubleshootingactivity_id' => 1,
	// 			'id_ticket_register' => $this->session->t_tiket,
	// 			'id_asset_register' => htmlspecialchars(trim($post['id_asset_register'])),
	// 			'asset_name' => htmlspecialchars(trim($post['asset_name'])),
	// 			'description' => htmlspecialchars(trim($post['keluhan'])),
	// 			'user_ent' => $this->session->id
	// 		];
	// 		$this->db->set('process_date','now()');
	// 		$this->db->set('date_ent','now()');
	// 		$cek = $this->db->insert('troubleshootings', $data);
	// 		if ($cek) {
	// 			return true;
	// 		} else {
	// 			return false;
	// 		}

	// 	}else{

	// 		$id = $this->id();

	// 		$data = [
	// 			'id' => $id,
	// 			'roomdetail_id' => htmlspecialchars(trim($post['detail'])),
	// 			'roomcategory_id' => htmlspecialchars(trim($post['ruangan'])),
	// 			'unit_id' => $this->session->unit_id,
	// 			'id_ticket_register' => $this->session->t_tiket,
	// 			'useradmin_id' => $this->session->id,
	// 			'user_name' => $this->session->t_nama,
	// 			'troubleshootingstatus_id' => 1,
	// 			'user_ent' => $this->session->id,
	// 			'troubleshootingtype_id' => 1
	// 		];
	// 		$this->db->set('ticket_date','now()');
	// 		$this->db->set('ticket_closed_date','now()');
	// 		$this->db->set('date_ent','now()');
	// 		$cek = $this->db->insert('troubleshooting_tickets', $data);
	// 		if ($cek) {
	// 			$data = [
	// 				'troubleshootingticket_id' => $id,
	// 				'assetproduct_id' => htmlspecialchars(trim($post['aset'])),
	// 				'troubleshootingactivity_id' => 1,
	// 				'id_ticket_register' => $this->session->t_tiket,
	// 				'id_asset_register' => htmlspecialchars(trim($post['id_asset_register'])),
	// 				'asset_name' => htmlspecialchars(trim($post['asset_name'])),
	// 				'description' => htmlspecialchars(trim($post['keluhan'])),
	// 				'user_ent' => $this->session->id
	// 			];
	// 			$this->db->set('process_date','now()');
	// 			$this->db->set('date_ent','now()');
	// 			$cek = $this->db->insert('troubleshootings', $data);
	// 			if ($cek) {
	// 				return true;
	// 			} else {
	// 				return false;
	// 			}
	// 		} else {
	// 			return false;
	// 		}
	// 	}		
		
	// }

	public function alat($idtiket)
	{
		$query = "
		select asset_products.id, asset_products.id_asset_register, asset_products.name, asset_products.description
		from asset_products, troubleshootings
		where asset_products.id_asset_register=troubleshootings.id_asset_register AND
		troubleshootings.troubleshootingticket_id=1
		";
		$this->db->select('apro.id_asset_register as idbarang, apro.name, apro.description as deskripsi');
		$this->db->from('asset_products apro');
		$this->db->join('troubleshootings t', 't.id_asset_register = apro.id_asset_register');
		$this->db->where('t.troubleshootingticket_id', $idtiket);
		return $this->db->get()->result();
	}

}

/* End of file M_tiket.php */
/* Location: ./application/modules/csunitit/models/M_tiket.php */