<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respon extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('csunitit');
		$this->load->model('csunitit/M_respon','mrespon');
	}

	public function index()
	{
		redirect('csunitit/dashboard','refresh');
	}

	public function tiket($id='0')
	{
		$this->load->model('csunitit/M_petugas','mpetugas');
		if($id<=0) redirect('csunitit/dashboard','refresh');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('idtiket', 'Respon', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('idtrouble', 'Respon', 'trim|required|is_natural_no_zero');
		$this->form_validation->set_rules('petugas', 'Petugas', 'trim|required|is_natural_no_zero');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Respon Tiket Permintaan',
				'hal' => 'respon/index',
				'datanya' => $this->mrespon->detail($id),
				'petugas' => $this->mpetugas->data(),
				'alat' => $this->mrespon->barang($id),
				'id' => $id
			];
			$this->load->view('layout', $data);
		} else {
			$cek = $this->mrespon->respon();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('csunitit/dashboard','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('csunitit/dashboard','refresh');
			}
		}
	}

}

/* End of file Respon.php */
/* Location: ./application/modules/csunitit/controllers/Respon.php */