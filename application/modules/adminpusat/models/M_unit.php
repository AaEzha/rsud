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
		$query = "
				select t.id
				from troubleshooting_tickets t
				join troubleshooting_status s on s.id=t.troubleshootingstatus_id
				where t.unit_id='$unit' and s.id='$status'
		";
		return $this->db->query($query)->num_rows();
	}

	public function cari($unit='2', $aktifitas='1')
	{
		$query ="
					SELECT  troubleshooting_tickets.ticket_date AS Tanggal,
			        troubleshooting_tickets.id_ticket_register AS Tiket,
			        troubleshooting_tickets.unit_id AS Unit,
			        troubleshooting_tickets.ticket_date AS Waktu,
			        room_categories.name AS Ruangan,
			        asset_products.id_asset_register AS ID_Aset,
			        asset_products.name AS Nama_Aset,
			        room_areas.name AS Area_Ruangan,
			        room_details.name AS Detail_Ruangan,
			        troubleshooting_status.name AS Status,
			        troubleshooting_activities.name AS statustugas,
			        user_accounts.name AS Petugas,
			        troubleshootings.process_date AS TanggalTindakan,
			        troubleshootings.solving_date AS TanggalTindakanSelesai
			FROM    troubleshooting_tickets,
				    troubleshooting_status,
				    troubleshooting_activities,
			        troubleshootings,
			        room_details,
			        room_categories,
			        room_areas,
			        asset_products,
			        user_accounts,
			        user_admin
			WHERE   troubleshooting_tickets.roomcategory_id = room_categories.id AND
			        troubleshooting_tickets.roomdetail_id = room_details.id AND
			        troubleshooting_tickets.troubleshootingstatus_id = troubleshooting_status.id AND
			        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
			        troubleshootings.assetproduct_id = asset_products.id AND
			        troubleshooting_activities.id = troubleshootings.troubleshootingactivity_id AND
			        troubleshootings.useradmin_id = user_admin.id AND
			        user_admin.useraccount_id = user_accounts.id AND
			        troubleshooting_tickets.troubleshootingtype_id = '$aktifitas' AND
			        troubleshooting_tickets.unit_id = '$unit' AND
			        room_details.roomarea_id = room_areas.id
		";

		return $this->db->query($query)->result();
	}

	public function jumlah_pelayanan($unit='2')
	{
		$query = "
				SELECT 	user_accounts.name, count(troubleshooting_tickets.id) as totaltiket
				FROM 	troubleshootings,
						troubleshooting_activities,
						troubleshooting_tickets,
						user_accounts,
						user_admin
				WHERE 	troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
						troubleshootings.troubleshootingactivity_id = troubleshooting_activities.id AND
						troubleshooting_tickets.useradmin_id = user_admin.id AND
						user_admin.useraccount_id = user_accounts.id AND
						troubleshooting_tickets.unit_id='$unit'
				GROUP BY user_accounts.name

		";
		return $this->db->query($query)->result();
	}

	public function it_pending($unit='2')
	{
		$query ="
					SELECT  troubleshooting_tickets.ticket_date AS Tanggal,
			        troubleshooting_tickets.id_ticket_register AS Tiket,
			        troubleshooting_tickets.unit_id AS Unit,
			        troubleshooting_tickets.ticket_date AS Waktu,
			        room_categories.name AS Ruangan,
			        asset_products.id_asset_register AS ID_Aset,
			        asset_products.name AS Nama_Aset,
			        room_areas.name AS Area_Ruangan,
			        room_details.name AS Detail_Ruangan,
			        troubleshooting_status.name AS Status,
			        user_accounts.name AS Petugas,
			        troubleshootings.process_date AS TanggalTindakan,
			        troubleshootings.solving_date AS TanggalTindakanSelesai
			FROM    troubleshooting_tickets,
				    troubleshooting_status,
			        troubleshootings,
			        room_details,
			        room_categories,
			        room_areas,
			        asset_products,
			        user_accounts,
			        user_admin
			WHERE   troubleshooting_tickets.roomcategory_id = room_categories.id AND
			        troubleshooting_tickets.roomdetail_id = room_details.id AND
			        troubleshooting_tickets.troubleshootingstatus_id = troubleshooting_status.id AND
			        troubleshooting_tickets.unit_id = '$unit' AND
			        troubleshooting_status.id = '3' AND
			        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
			        troubleshootings.assetproduct_id = asset_products.id AND
			        troubleshootings.useradmin_id = user_admin.id AND
			        user_admin.useraccount_id = user_accounts.id AND
			        room_details.roomarea_id = room_areas.id
		";

		return $this->db->query($query)->result();
	}

	public function ruangan_perbaikan()
	{
		$query = "
			SELECT  troubleshooting_tickets.id_ticket_register AS Tiket,
			        troubleshooting_tickets.ticket_date AS Waktu,
			        user_accounts.name AS Nama_Pelapor,
			        room_categories.name AS Ruangan,
			        asset_products.name AS Nama_aset,
			        room_areas.name AS Area_Ruangan,       
			        troubleshooting_tickets.description AS Keterangan,
			        troubleshooting_status.name AS Status_Ticket,
			        troubleshooting_activities.name AS Status_Pelayanan,
			        units.name AS unitpelayanan

			FROM    troubleshooting_tickets,
			        troubleshootings,
			        troubleshooting_types,
			        troubleshooting_activities,
			        troubleshooting_status,
			        room_areas,
			        room_categories,
			        room_details,
			        asset_products,
			        units,
			        user_admin,
			        user_accounts,
			        roles

			WHERE   troubleshooting_tickets.unit_id = 5 AND
			        troubleshooting_tickets.troubleshootingtype_id = 1 AND
			        user_admin.role_id = 4 AND
			        troubleshooting_tickets.troubleshootingtype_id = troubleshooting_types.id AND
			        troubleshooting_tickets.troubleshootingstatus_id = troubleshooting_status.id AND
			        troubleshooting_tickets.roomdetail_id = room_details.id AND
			        troubleshooting_tickets.unit_id = units.id AND
			        troubleshooting_tickets.useradmin_id = user_admin.id AND
			        troubleshootings.troubleshootingticket_id = troubleshooting_tickets.id AND
			        troubleshootings.assetproduct_id = asset_products.id AND
			        troubleshootings.troubleshootingactivity_id = troubleshooting_activities.id AND
			        room_details.roomarea_id = room_areas.id AND
			        room_details.roomcategory_id = room_categories.id AND
			        user_admin.useraccount_id = user_accounts.id AND
			        user_admin.role_id = roles.id
		";
		return $this->db->query($query)->result();
	}

}

/* End of file M_unit.php */
/* Location: ./application/modules/adminpusat/models/M_unit.php */