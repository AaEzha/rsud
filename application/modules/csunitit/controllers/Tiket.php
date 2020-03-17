<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('csunitit');
		$this->load->model('csunitit/M_tiket','mtiket');
		$this->load->model('csunitit/M_ruangan','mruang');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('area', 'Area', 'trim|required|numeric');
		$this->form_validation->set_rules('detail', 'Detail Area', 'trim|required|numeric');
		$this->form_validation->set_rules('aset', 'Aset', 'trim|required|numeric');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$cek = $this->mtiket->simpan();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data gagal disimpan!</div>');
			}
		}
		redirect('csunitit/dashboard','refresh');
	}

	public function getkamar()
	{
		$ruangan = $this->input->get('ruangan');
		$area = $this->input->get('area');
		$data = [
			'data' => $this->mruang->getkamar($ruangan, $area)
		];
		$this->load->view('tiket/detailarea', $data);
	}

	public function getaset()
	{
		$this->load->model('csunitit/M_aset','maset');
		$kamar = $this->input->get('kamar');
		$data = [
			'data' => $this->maset->getaset($kamar)
		];
		$this->load->view('tiket/detailaset', $data);
	}

	public function idaset()
	{
		$this->load->model('csunitit/M_aset','maset');
		$kamar = $this->input->get('id');
		$data = [
			'data' => $this->maset->detailaset($kamar)
		];
		$this->load->view('tiket/detailaset2', $data);
	}

	public function namaaset()
	{
		$this->load->model('csunitit/M_aset','maset');
		$kamar = $this->input->get('id');
		$data = [
			'data' => $this->maset->detailaset($kamar)
		];
		$this->load->view('tiket/detailaset3', $data);
	}

}

/* End of file Tiket.php */
/* Location: ./application/modules/csunitit/controllers/Tiket.php */