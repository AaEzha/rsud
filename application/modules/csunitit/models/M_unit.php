<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unit extends CI_Model {

	public function data()
	{
		return $this->db->get('units')->result();
	}

	public function jumlah() // jumlah seluruh unit
	{
		return $this->db->get('units')->num_rows();
	}

	public function detail($id)
	{
		return $this->db->where('id', $id)->get('units')->row();
	}

	public function dashboard_info($unit, $status)
	{
		/**

		$unit 
			1 => Pusat
			2 => Unit IT
			3 => Unit IPS
			4 => Unit ITP
			5 => Unit Ruangan
			Yang dipakai hanya 2, 3 dan 4

		$status
			1 => Open
			2 => Close
			3 => Pending
			Yang dipakai hanya 1 dan 2

		*/
		$query = "
				select t.id
				from troubleshooting_tickets t
				join troubleshooting_status s on s.id=t.troubleshootingstatus_id
				where t.unit_id='$unit' and s.id='$status'
		";
		return $this->db->query($query)->num_rows();
	}

	public function cari($type='1', $unit='2')
	{
		$query ="
					SELECT  troubleshooting_types.name AS Jenis,
					        troubleshooting_tickets.id_ticket_register AS Tiket,
					        troubleshooting_tickets.id AS idtiket,
					        troubleshooting_tickets.ticket_date AS Waktu,
					        room_categories.name AS Ruangan,
					        asset_products.id_asset_register AS ID_Aset,
					        asset_products.name AS Nama_aset,
					        troubleshooting_activities.name AS Status_Pelayanan,
					        troubleshooting_status.name AS Status_Ticket,
					        user_accounts.name AS Petugas

					FROM    troubleshooting_types,
					        troubleshooting_tickets,
					        troubleshooting_activities,
					        troubleshooting_status,
					        troubleshootings,     
					        room_categories,
					        asset_products,
					        user_accounts,
					        user_admin,
					        units

					WHERE   troubleshooting_activities.id = 1 AND
					        troubleshooting_tickets.unit_id = units.id AND
					        troubleshooting_tickets.troubleshootingstatus_id = troubleshooting_status.id AND
					        troubleshooting_tickets.troubleshootingtype_id = troubleshooting_types.id AND
					        troubleshooting_tickets.roomcategory_id = room_categories.id AND
					        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
					        troubleshootings.useradmin_id = user_admin.id AND
					        troubleshootings.assetproduct_id = asset_products.id AND
					        troubleshootings.troubleshootingactivity_id = troubleshooting_activities.id AND
					        user_admin.useraccount_id = user_accounts.id AND
							troubleshooting_tickets.troubleshootingtype_id in (1,3) AND
							troubleshooting_types.id = '$type' AND
							troubleshooting_tickets.unit_id = '2'
		";

		return $this->db->query($query)->result();
	}

	public function jumlah_dashboard($activity='1', $unit='2')
	{
		$query ="
					SELECT  troubleshooting_types.name AS Jenis,
					        troubleshooting_tickets.id_ticket_register AS Tiket,
					        troubleshooting_tickets.ticket_date AS Waktu,
					        room_categories.name AS Ruangan,
					        asset_products.id_asset_register AS ID_Aset,
					        asset_products.name AS Nama_aset,
					        troubleshooting_activities.name AS Status_Pelayanan,
					        troubleshooting_status.name AS Status_Ticket,
					        user_accounts.name AS Petugas

					FROM    troubleshooting_types,
					        troubleshooting_tickets,
					        troubleshooting_activities,
					        troubleshooting_status,
					        troubleshootings,     
					        room_categories,
					        asset_products,
					        user_accounts,
					        user_admin,
					        units

					WHERE   troubleshooting_tickets.unit_id = '$unit' AND
							troubleshooting_activities.id = '$activity' AND
					        troubleshooting_tickets.unit_id = units.id AND
					        troubleshooting_tickets.troubleshootingstatus_id = troubleshooting_status.id AND
					        troubleshooting_tickets.troubleshootingtype_id = troubleshooting_types.id AND
					        troubleshooting_tickets.roomcategory_id = room_categories.id AND
					        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
					        troubleshootings.useradmin_id = user_admin.id AND
					        troubleshootings.assetproduct_id = asset_products.id AND
					        troubleshootings.troubleshootingactivity_id = troubleshooting_activities.id AND
					        user_admin.useraccount_id = user_accounts.id
		";

		return $this->db->query($query)->num_rows();
	}

}

/* End of file M_unit.php */
/* Location: ./application/modules/csunitit/models/M_unit.php */