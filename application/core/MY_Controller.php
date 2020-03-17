<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

class MY_Controller extends MX_Controller
{	

	function __construct() 
	{
		parent::__construct();
		$this->_hmvc_fixes();
	}
	
	function _hmvc_fixes()
	{		
		//fix callback form_validation		
		//https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc
		$this->load->library('form_validation');
		$this->form_validation->CI =& $this;
	}

	/**
	Fungsi yang mencegah seseorang untuk mengakses halaman bertanda ini
	kecuali orang-orang yang sudah login terlebih dahulu sebelumnya
	*/
	public function auth($modul)
	{
		if(@!$this->session->id) { 
			redirect("$modul/auth",'refresh');
		}else{
			switch ($modul) {
				case 'adminpusat':
					$role = 1;
					break;

				case 'adminunit':
					$role = 2;
					break;

				case 'petugas':
					$role = 3;
					break;

				case 'csunitit':
					$role = 4;
					break;
				
				default:
					# code...
					break;
			}
			if($this->session->role_id != $role){
				redirect("$modul/auth",'refresh');
			}
		}
	}

	/**
	Fungsi yang mencegah seseorang untuk mengakses halaman yang bertanda ini
	jika seseorang itu telah login sebelumnya dan diarahkan ke dashboard
	*/
	public function login($modul)
	{
		if (isset($this->session->id)) {
			redirect("$modul/dashboard",'refresh');
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
