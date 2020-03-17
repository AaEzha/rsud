<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('csunitit');
		$this->load->model('csunitit/M_profil','mpro');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'ID', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
		$this->form_validation->set_rules('phone', 'No.Telp', 'trim|required|numeric|max_length[15]');
		$this->form_validation->set_rules('unit', 'Posisi', 'trim|required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|is_natural_no_zero');

		if ($this->form_validation->run() == FALSE) {
			$this->load->model('csunitit/M_unit','munit');
			$data = [
				'title' => 'Akun Saya',
				'hal' => 'profil/detail',
				'units' => $this->munit->data(),
				'data' => $this->mpro->detail($this->session->id)
			];
			$this->load->view('layout', $data);
		} else {
			$this->load->model('csunitit/M_pengguna','mp');
			$cek = $this->mp->ubah();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
				redirect('csunitit/profil','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>');
				redirect('csunitit/profil','refresh');
			}
		}
	}

	public function edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
		$this->form_validation->set_rules('phone', 'No.Telp', 'trim|required|numeric|max_length[15]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit Profil',
				'hal' => 'profil/edit',
				'data' => $this->mpro->detail($this->session->id)
			];
			$this->load->view('layout', $data);
		} else {
			$id = $this->session->id ?? redirect('csunitit/auth','refresh');
			$cek = $this->mpro->ubah();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
				redirect('csunitit/profil','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data gagal diubah!</div>');
				redirect('csunitit/profil','refresh');
			}
		}
	}

	public function password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('passkonf', 'Konfirmasi Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Ubah Kata Sandi',
				'hal' => 'profil/pass',
				'data' => $this->mpro->detail($this->session->id)
			];
			$this->load->view('layout', $data);
		} else {
			$id = $this->session->id ?? redirect('csunitit/auth','refresh');
			$cek = $this->mpro->password();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Password berhasil diubah!</div>');
				redirect('csunitit/profil','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Password gagal diubah!</div>');
				redirect('csunitit/profil','refresh');
			}
		}
	}

}

/* End of file Profil.php */
/* Location: ./application/modules/csunitit/controllers/Profil.php */