<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('adminpusat');
	}

	public function index()
	{
		$data = [
			'title' => "Backup Data ". strtoupper($this->uri->segment(3)),
			'hal' => 'backup/index'
		];
		$this->load->view('layout', $data);
	}

}

/* End of file Backup.php */
/* Location: ./application/modules/adminpusat/controllers/Backup.php */