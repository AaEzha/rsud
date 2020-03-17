<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::auth('adminpusat');
		$this->load->model('adminpusat/M_pengguna','mp');
		$this->load->model('adminpusat/M_unit','munit');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('unit_id', 'Unit', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Data Pengguna',
				'hal' => 'pengguna/index',
				'u' => $this->munit->detail('1'),
				'units' => $this->munit->data(),
				'datas' => $this->mp->data(),
				'js' => 'pengguna/js',
				'css' => 'pengguna/css'
			];
			$this->load->view('layout', $data);
		}else{
			$data = $this->input->post();
			// var_dump($data); die();
			$data = [
				'title' => 'Data Pengguna',
				'hal' => 'pengguna/index',
				'u' => $this->munit->detail($data['unit_id']),
				'units' => $this->munit->data(),
				'datas' => $this->mp->cari(),
				'css' => 'pengguna/css',
				'js' => 'pengguna/js'
			];
			$this->load->view('layout', $data);
		}		
	}

	public function tambah()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]');
		$this->form_validation->set_rules('phone', 'No.Telp', 'trim|required|numeric|max_length[15]');
		$this->form_validation->set_rules('unit', 'Posisi', 'trim|required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|is_natural_no_zero');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Pengguna',
				'hal' => 'pengguna/tambah',
				'units' => $this->munit->data(),
			];
			$this->load->view('layout', $data);
		} else {
			$cek = $this->mp->tambah();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
				redirect('adminpusat/pengguna','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Data gagal disimpan!</div>');
				redirect('adminpusat/pengguna','refresh');
			}
		}
	}

	public function detail($id)
	{
		$data = [
			'title' => 'Detail Data Pengguna',
			'hal' => 'pengguna/detail',
			'data' => $this->mp->detail($id),
		];
		$this->load->view('layout', $data);
	}

	public function edit($id)
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
			$data = [
				'title' => 'Edit Data Pengguna',
				'hal' => 'pengguna/edit',
				'data' => $this->mp->detail($id),
				'units' => $this->munit->data(),
			];
			$this->load->view('layout', $data);
		} else {
			$cek = $this->mp->ubah();
			if ($cek) {
				$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>');
				redirect('adminpusat/pengguna','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Data gagal diubah!</div>');
				redirect('adminpusat/pengguna','refresh');
			}
		}
	}

	public function hapus($id='1')
	{
		$cek = $this->mp->hapus($id);
		if ($cek) {
			$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Data berhasil dihapus!</div>');
				redirect('adminpusat/pengguna','refresh');
		} else {
			$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Data gagal dihapus!</div>');
				redirect('adminpusat/pengguna','refresh');
		}
		
	}

}

/* End of file Pengguna.php */
/* Location: ./application/modules/adminpusat/controllers/Pengguna.php */