<!DOCTYPE html>
<html>
<head>
	<title>CS Unit IT | RSUD Sidoarjo Management Service App</title>

	<!-- Javascript External -->
	<script src="<?=base_url('aset/');?>external/js/jquery.js"></script>
	<script src="<?=base_url('aset/');?>external/js/bootstrap.min.js"></script>

	<!-- Javascript Internal -->
	<script src="<?=base_url('aset/');?>internal/js/button_action.js"></script>
	<script src="<?=base_url('aset/');?>internal/js/modal.js"></script>

	<!-- CSS External -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>external/css/bootstrap.min.css">
	
	<!-- CSS Internal -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/modal.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/loading.css">
</head>

<body class="dashboard-body">
	<div class="loading">
		<img src="<?=base_url('aset/');?>image/asset/loading.gif" alt="">
	</div>
	<div class="modal-item"></div>

	<div class="background-glass">
	</div>
	<div class="header-container">
		<div class="logo-container">
			<img src="<?=base_url('aset/');?>image/asset/login-logo.png" alt="">			
		</div>
		<div class="logout-container logout-btn" data-link="<?=base_url('csunitit/auth/keluar');?>">
			<img src="<?=base_url('aset/');?>image/asset/wt-logout.png" alt="">
			<p>Logout</p>
		</div>
	</div>
	<div class="content-container">
		<div class="content-component">
			<div class="text-1">Selamat Datang</div>
			<div class="textc-1"><?=$this->session->nama;?></div>
			<div class="text-2">CS Unit IT</div>
			<div class="text-2">RSUD Sidoarjo</div>
			<div class="text-1">Semoga Harimu Menyenangkan</div>
			<br>
			<br>
			<div class="text-3 running-time"></div>
			<div class="text-3 running-date"></div>
		</div>
	</div>
	<div class="footer-container">
		<a class="button-menu" href="<?=base_url('csunitit/profil');?>">
			<div class="img-menu">
				<img src="<?=base_url('aset/');?>image/asset/wt-curriculum.png" alt="">
			</div>
			<div class="header-menu">
				MY ACCOUNT
			</div>
			<div class="desc-menu">
				Informasi tentang personal data dan akses sistem
			</div>
		</a>
		<a class="button-menu" href="<?=base_url('csunitit/dashboard');?>">
			<div class="img-menu">
				<img src="<?=base_url('aset/');?>image/asset/wt-speed.png" alt="">
			</div>
			<div class="header-menu">
				GO TO APPLICATION
			</div>
			<div class="desc-menu">
				Pergi ke aplikasi untuk membantu menjalankan aktifitas kerja
			</div>
		</a>
		<a class="button-menu" href="<?=base_url('csunitit/download');?>">
			<div class="img-menu">
				<img src="<?=base_url('aset/');?>image/asset/wt-backup.png" alt="">
			</div>
			<div class="header-menu">
				DOWNLOAD DATA
			</div>
			<div class="desc-menu">
				Unduh data aktifitas unit sesuai dengan hak akses Anda
			</div>
		</a>
	</div>
</body>
<script src="<?=base_url('aset/');?>internal/js/general.js"></script>
</html>