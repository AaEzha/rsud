<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		parent::auth('adminpusat');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required|numeric');
		$this->form_validation->set_rules('aktifitas', 'aktifitas', 'trim|required|numeric');
		$this->load->model('adminpusat/M_unit','munit');

		if ($this->form_validation->run() == FALSE) {
			$data = $this->munit->cari();
			$hal = 'unit/index';
			$teks = 'Perbaikan';
			$unit = 'IT';
			$data = [
				'title' => 'Aktifitas Unit',
				'hal' => $hal,
				'units' => $this->munit->data(),
				'datas' => $data,
				'teks' => $teks,
				'unit' => $unit,
				'js' => 'unit/js'
			];
		} else {
			$post = $this->input->post();
			$unit = htmlspecialchars(trim($post['unit']));
			$aktifitas = htmlspecialchars(trim($post['aktifitas']));

			// Unit IT
			if( $unit=='2' and $aktifitas=='1' ){
				$data = $this->munit->cari();
				$data2 = '';
				$hal = 'unit/it_perbaikan';
				$teks = 'Perbaikan';
				$unit = 'IT';
			}elseif( $unit=='2' and $aktifitas=='2' ){
				$data = $this->munit->cari($unit, $aktifitas);
				$data2 = '';
				$hal = 'unit/it_maintenance';
				$teks = 'Maintenance';
				$unit = 'IT';
			}elseif( $unit=='2' and $aktifitas=='3' ){
				$data = $this->munit->cari($unit);
				$data2 = $this->munit->jumlah_pelayanan($unit);
				$hal = 'unit/it_petugas';
				$teks = 'Petugas';
				$unit = 'IT';
			}elseif( $unit=='2' and $aktifitas=='4' ){
				$data = $this->munit->it_pending($unit);
				$data2 = '';
				$hal = 'unit/it_pending';
				$teks = 'Pending Tugas';
				$unit = 'IT';
			}

			// Unit IPS
			if( $unit=='3' and $aktifitas=='1' ){
				$data = $this->munit->cari($unit);
				$data2 = '';
				$hal = 'unit/it_perbaikan';
				$teks = 'Perbaikan';
				$unit = 'IPS';
			}elseif( $unit=='3' and $aktifitas=='2' ){
				$data = $this->munit->cari($unit, $aktifitas);
				$data2 = '';
				$hal = 'unit/it_maintenance';
				$teks = 'Maintenance';
				$unit = 'IPS';
			}elseif( $unit=='3' and $aktifitas=='3' ){
				$data = $this->munit->cari($unit);
				$data2 = $this->munit->jumlah_pelayanan($unit);
				$hal = 'unit/it_petugas';
				$teks = 'Petugas';
				$unit = 'IPS';
				$js;
			}elseif( $unit=='3' and $aktifitas=='4' ){
				$data = $this->munit->it_pending($unit);
				$data2 = '';
				$hal = 'unit/it_pending';
				$teks = 'Pending Tugas';
				$unit = 'IPS';
				$js;
			}

			// Unit ITP
			if( $unit=='4' and $aktifitas=='5' ){
				$data = '';
				$data2 = '';
				$hal = 'unit/itp_pindah';
				$teks = 'Pindah Pasien';
				$unit = 'ITP';
			}elseif( $unit=='4' and $aktifitas=='6' ){
				$data = '';
				$data2 = '';
				$hal = 'unit/itp_petugas';
				$teks = 'Petugas';
				$unit = 'ITP';
			}

			// Unit Ruangan
			if( $unit=='5' and $aktifitas=='8' ){
				$data = $this->munit->ruangan_perbaikan();
				$data2 = '';
				$hal = 'unit/ruangan_perbaikan';
				$teks = 'Permintaan Perbaikan';
				$unit = 'Ruangan';
			}elseif( $unit=='5' and $aktifitas=='9' ){
				$data = '';
				$data2 = '';
				$hal = 'unit/ruangan_pindah_pasien';
				$teks = 'Permintaan Perpindahan Pasien';
				$unit = 'Ruangan';
			}

			switch ($unit) {
				case '1':
				case '2':
					$uu = 'IT/IPS';
					break;

				case '3':
					$uu = 'ITP';
					break;

				case '4':
					$uu = 'Ruangan';
					break;
			}

			$hals = $hal ?? 'unit/nodisplay';
			$d = $data ?? '';
			$dd = $data2 ?? '';
			$t = $teks ?? '';
			$u = $unit ?? $uu;
			$data = [
				'title' => 'Aktifitas Unit',
				'hal' => $hals,
				'units' => $this->munit->data(),
				'datas' => $d,
				'datas2' => $dd,
				'teks' => $t,
				'unit' => $u,
				'js' => 'unit/js'
			];
		}
		$this->load->view('layout', $data);
	}

	public function laporan()
	{
		$data = [
			'title' => 'Laporan Aktifitas',
			'hal' => 'unit/laporan'
		];
		$this->load->view('layout', $data);
	}

	public function tes()
	{
		$this->load->model('adminunit/M_unit','munit');
		echo $this->munit->tes();
	}
}

/* End of file Unit.php */
/* Location: ./application/modules/adminpusat/controllers/Unit.php */