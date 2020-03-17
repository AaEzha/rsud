<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('csunitit');
	}

	public function index()
	{
		$data = [
			'title' => 'Download Data',
			'hal' => 'download/index',
			'css' => 'download/css',
			'js' => 'download/js'
		];
		$this->load->view('layout', $data);
	}

}

/* End of file Download.php */
/* Location: ./application/modules/csunitit/controllers/Download.php */