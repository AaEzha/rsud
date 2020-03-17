<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth','ma');

	}

	public function index()
	{
		parent::login('csunitit');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Masuk ke Dashboard Admin Pusat',
				'hal' => 'auth/index'
			];
			$this->load->view('auth', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$cek = $this->ma->login();
		if ($cek) {
			$data = [
				'id' => $cek->id,
				'nama' => $cek->nama,
				'role_id' => $cek->role_id,
				'unit_id' => $cek->unit_id,
				'unit' => $cek->unitname,
				'role' => $cek->rolename,
			];
			$this->session->set_userdata($data);
			$this->session->set_flashdata('name', '<div class="alert alert-success" role="alert">Selamat datang kembali!</div>');
			redirect('csunitit/dashboard/board','refresh');
		} else {
			$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Gagal masuk sistem!</div>');
			redirect('csunitit/auth','refresh');
		}
	}

	public function lupa()
	{
		parent::login('csunitit');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('auth', 'Email/No.Handphone', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Lupa Password Admin Pusat',
				'js' => 'auth/lupa_js',
				'css' => 'auth/lupa_css',
				'hal' => 'auth/lupa'
			];
			$this->load->view('auth', $data);
		} else {
			$cek = $this->ma->cek();
			if ($cek) {
				$this->kirim($cek->email,$cek->name,$cek->username,$cek->password);
				$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Gagal masuk sistem!</div>');
				redirect('csunitit/auth/berhasil','refresh');
			} else {
				$this->session->set_flashdata('name', '<div class="alert alert-danger" role="alert">Gagal masuk sistem!</div>');
				redirect('csunitit/auth/gagal','refresh');
			}
		}
	}

	public function kirim($email, $name, $username, $password)
	{
		$email_akun = "ummul.rodhiyah.noreply@gmail.com"; // Email gmail ummul.rodhiyah.noreply@gmail.com
		$email_pass = "ummul2019"; // Password gmail : ummul2019

		$config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => $email_akun,
            'smtp_pass'   => $email_pass,
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
		$this->load->library('email', $config);
		$this->email->from($email_akun, 'Admin Pusat RSUD');
		$this->email->to($email);
		$this->email->bcc('rezanurfachmi@gmail.com');
		$this->email->subject('Password Recovery - RSUD Sidoarjo');

		$teks = "<p>Helo $name.</p>";
		$teks.= "<p>Seseorang telah meminta tautan untuk memberikan informasi akun Anda.<br>";
		$teks.= "Username : $username<br>";
		$teks.= "Password : $password</p>";
		$teks.= "<p>Jika Anda tidak merasa melakukan ini, mohon tetap rahasiakan informasi akun Anda agar tidak terjadi kesalahan di kemudian waktu.</p>";
		$teks.= "<p>Terima kasih<br>Admin Pusat RSUD Sidoarjo</p>";
		$this->email->message($teks);
		if( !$this->email->send() ){
			die( $this->email->print_debugger() );
		}
	}

	public function gagal()
	{
		$data = [
			'title' => 'Recovery Password',
			'hal' => 'auth/email',
			'css' => 'auth/lupa_css',
			'js' => 'auth/gagal'
		];
		$this->load->view('auth', $data);
	}

	public function berhasil()
	{
		$data = [
			'title' => 'Recovery Password',
			'hal' => 'auth/email',
			'css' => 'auth/lupa_css',
			'js' => 'auth/berhasil'
		];
		$this->load->view('auth', $data);
	}

	public function recover()
	{
		parent::login('csunitit');
		$data = [
			'title' => 'Masuk ke Dashboard Admin',
			'js' => 'auth/recover_js',
			'css' => 'auth/lupa_css',
			'hal' => 'auth/recover'
		];
		$this->load->view('auth', $data);
	}

	public function dilarang()
	{
		echo "<h1>Dilarang</h1>";
	}

	public function keluar()
	{
		unset($_SESSION['id']);
		unset($_SESSION['nama']);
		unset($_SESSION['role_id']);
		unset($_SESSION['unit_id']);
		session_destroy();
		redirect('csunitit/auth','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/modules/csunitit/controllers/Auth.php */