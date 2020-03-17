<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perbaikan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('csunitit');
	}

	public function index()
	{
		unset($this->session->p_bulan);
		unset($this->session->p_tahun);
		unset($this->session->p_status);
		unset($this->session->p_ruangan);
		$this->load->model('M_trouble','mtro');
		$this->load->model('M_ruangan','mruang');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('bulan', 'Bulan', 'trim|required|numeric');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|numeric');
		$this->form_validation->set_rules('ruangan', 'Ruangan', 'trim|required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Perbaikan',
				'hal' => 'perbaikan/index',
				'status' => $this->mtro->status(),
				'ruangan' => $this->mruang->categories()
			];
			$this->load->view('layout', $data);
		}else{
			$this->_lock();
		}
	}

	private function _lock()
	{
		$post = $this->input->post();
		$ses = [
			'p_bulan' => htmlspecialchars(trim($post['bulan'])),
			'p_tahun' => htmlspecialchars(trim($post['tahun'])),
			'p_status' => htmlspecialchars(trim($post['status'])),
			'p_ruangan' => htmlspecialchars(trim($post['ruangan']))
		];
		$this->session->set_userdata($ses);
		redirect('csunitit/perbaikan/data','refresh');
	}

	public function data()
	{
		
	}

}

/* End of file Perbaikan.php */
/* Location: ./application/modules/csunitit/controllers/Perbaikan.php */