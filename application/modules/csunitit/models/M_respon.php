<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_respon extends CI_Model {

	public function detail($id)
	{
		$query = "
				SELECT  troubleshooting_tickets.id_ticket_register as tiket,
				        troubleshooting_tickets.ticket_date as tanggal,
				        user_accounts.name as pelapor,
				        troubleshooting_types.name as jenis,
				        room_details.name as ruangan,
				        troubleshootings.id as idtrouble

				FROM    troubleshooting_tickets,
				        troubleshootings,
				        assets,
				        asset_products,
				        troubleshooting_types,
				        user_admin,
				        user_accounts,
				        room_details

				WHERE   troubleshooting_tickets.useradmin_id = user_admin.id AND  
						troubleshooting_tickets.roomdetail_id = room_details.id AND  
				        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
				        troubleshootings.assetproduct_id = asset_products.id AND
				        asset_products.asset_id = assets.id AND
				        troubleshooting_tickets.useradmin_id = user_admin.id AND
				        user_admin.useraccount_id = user_accounts.id AND
				        troubleshooting_tickets.troubleshootingtype_id = troubleshooting_types.id AND 
				        troubleshooting_tickets.id = '$id'
		";
		return $this->db->query($query)->row();
	}

	public function barang($id)
	{
		$query = "
				SELECT  troubleshootings.id_asset_register as idaset,
						asset_products.name as namaaset,
						asset_products.description as deskripsiproduk,
						assets.description as deskripsiaset,
						asset_categories.name as kategoriaset,
						asset_sub_categories.name as subkategoriaset,
						assets.name as detailkategori,
						room_details.name as noruangan,
						room_areas.name as area,
						room_categories.name as ruangan,
						troubleshooting_tickets.description as keluhan

				FROM    troubleshooting_tickets,
				        troubleshootings,
				        assets,
				        asset_products,
				        asset_categories,
				        asset_sub_categories,
				        room_details,
				        room_areas,
				        room_categories

				WHERE   troubleshooting_tickets.troubleshootingtype_id = 2 AND    
				        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
				        troubleshootings.assetproduct_id = asset_products.id AND
				        asset_products.asset_id = assets.id AND
				        asset_products.assetcategory_id = asset_categories.id AND
				        assets.assetsubcategory_id = asset_sub_categories.id AND
						troubleshooting_tickets.roomdetail_id = room_details.id AND 
						room_details.roomarea_id=room_areas.id AND 
						room_details.roomcategory_id=room_categories.id AND 
				        troubleshooting_tickets.id = '$id'
		";
		return $this->db->query($query)->result();
	}

	public function respon()
	{
		$post = $this->input->post();

		$id = htmlspecialchars(trim($post['idtiket']));
		$idtrouble = htmlspecialchars(trim($post['idtrouble']));

		$tiket = [
			'useradmin_id' => htmlspecialchars(trim($post['petugas'])),
			'troubleshootingstatus_id' => '1'
		];
		$where = ['id' => $id];
		$cek = $this->db->update('troubleshooting_tickets', $tiket, $where);
		if ($cek) {
			$trouble = [
				'useradmin_id' => htmlspecialchars(trim($post['petugas'])),
				'troubleshootingactivity_id' => '1',
				'user_ent' => $this->session->id
			];
			$this->db->set('date_ent','now()');
			$where = ['id' => $idtrouble];
			$cek = $this->db->update('troubleshootings', $trouble, $where);
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

/* End of file M_respon.php */
/* Location: ./application/modules/csunitit/models/M_respon.php */