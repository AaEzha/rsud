<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $config = [
// 	'adminpusat/pengguna/tambah' => [
// 			[
// 				'field' => 'jabatan',
// 				'label' => 'Jabatan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'masakerja',
// 				'label' => 'Masa Kerja',
// 				'rules' => 'trim|required|is_natural_no_zero|max_length[2]'
// 			],
// 			[
// 				'field' => 'insentif',
// 				'label' => 'Insentif',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 			[
// 				'field' => 'bonus',
// 				'label' => 'Bonus',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 	],
	
// 	'pengaturan/ubah' => [
// 			[
// 				'field' => 'jabatan',
// 				'label' => 'Jabatan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'masakerja',
// 				'label' => 'Masa Kerja',
// 				'rules' => 'trim|required|is_natural_no_zero|max_length[2]'
// 			],
// 			[
// 				'field' => 'insentif',
// 				'label' => 'Insentif',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 			[
// 				'field' => 'bonus',
// 				'label' => 'Bonus',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 	],
	
// 	'jabatan/tambah' => [
// 			[
// 				'field' => 'kode',
// 				'label' => 'Kode Jabatan',
// 				'rules' => 'trim|required|is_unique[jabatan.kode]'
// 			],
// 			[
// 				'field' => 'jabatan',
// 				'label' => 'Jabatan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'gaji',
// 				'label' => 'Gaji',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 	],
	
// 	'jabatan/ubah' => [
// 			[
// 				'field' => 'kode',
// 				'label' => 'Kode Jabatan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'jabatan',
// 				'label' => 'Jabatan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'gaji',
// 				'label' => 'Gaji',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 	],
	
// 	'karyawan/tambah' => [
// 			[
// 				'field' => 'nama',
// 				'label' => 'Nama Karyawan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'jk',
// 				'label' => 'Jenis Kelamin',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'tgl_lahir',
// 				'label' => 'Tanggal Lahir',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'alamat',
// 				'label' => 'Alamat',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'email',
// 				'label' => 'Email',
// 				'rules' => 'trim|required|valid_email'
// 			],
// 			[
// 				'field' => 'telp',
// 				'label' => 'No.Telepon',
// 				'rules' => 'trim|required|numeric'
// 			],
// 			[
// 				'field' => 'nip',
// 				'label' => 'NIP',
// 				'rules' => 'trim|required|numeric|is_unique[karyawan.nip]'
// 			],
// 			[
// 				'field' => 'masakerja',
// 				'label' => 'Masa Kerja',
// 				'rules' => 'trim|required|is_natural_no_zero|max_length[2]'
// 			],
// 			[
// 				'field' => 'idjabatan',
// 				'label' => 'Jabatan',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 	],
	
// 	'karyawan/ubah' => [
// 			[
// 				'field' => 'nama',
// 				'label' => 'Nama Karyawan',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'jk',
// 				'label' => 'Jenis Kelamin',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'tgl_lahir',
// 				'label' => 'Tanggal Lahir',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'alamat',
// 				'label' => 'Alamat',
// 				'rules' => 'trim|required'
// 			],
// 			[
// 				'field' => 'email',
// 				'label' => 'Email',
// 				'rules' => 'trim|required|valid_email'
// 			],
// 			[
// 				'field' => 'telp',
// 				'label' => 'No.Telepon',
// 				'rules' => 'trim|required|numeric'
// 			],
// 			[
// 				'field' => 'masakerja',
// 				'label' => 'Masa Kerja',
// 				'rules' => 'trim|required|is_natural_no_zero|max_length[2]'
// 			],
// 			[
// 				'field' => 'idjabatan',
// 				'label' => 'Jabatan',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 	],
	
// 	'gaji/tambah' => [
// 			[
// 				'field' => 'idkaryawan',
// 				'label' => 'Nama Karyawan',
// 				'rules' => 'trim|required|is_natural_no_zero'
// 			],
// 			[
// 				'field' => 'tanggal',
// 				'label' => 'Tanggal Penerimaan',
// 				'rules' => 'trim|required'
// 			],
// 	],

// ];