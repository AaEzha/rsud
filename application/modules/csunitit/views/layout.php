<!DOCTYPE html>
<html lang="id">
<head>
	<title><?=$title;?> | RSUD Sidoarjo Management Service App</title>

	<!-- Javascript External -->
	<script src="<?=base_url('aset/');?>external/js/jquery.js"></script>
	<script src="<?=base_url('aset/');?>external/js/bootstrap.min.js"></script>
	<script src="<?=base_url('aset/');?>external/js/highcharts.js"></script>
	<script src="<?=base_url('aset/');?>external/js/highcharts-exporting.js"></script>
	<script src="<?=base_url('aset/');?>external/js/highcharts-export-data.js"></script>
	<script src="<?=base_url('aset/');?>external/js/highcharts-accessibility.js"></script>
	<link rel="stylesheet" href="<?=base_url('aset');?>/plugins/fontawesome-free/css/all.min.css">

	<!-- Javascript Internal -->
	<script src="<?=base_url('aset/');?>internal/js/button_action.js"></script>
	<script src="<?=base_url('aset/');?>internal/js/modal.js"></script>

	<!-- CSS External -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>external/css/bootstrap.min.css">
	
	<!-- CSS Internal -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/content.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/button_action.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/modal.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url('aset/');?>internal/css/loading.css">

	<?php (isset($css)) ? $this->load->view($css) : ""; ?>
</head>
<body class="dashboard-body">
	<div class="loading">
		<img src="<?=base_url('aset/');?>image/asset/loading.gif" alt="">
	</div>
	<div class="modal-item"></div>

	<div class="header-container">
		<div class="rounded c-base">
			CS Unit IT
		</div>
		<div class="rounded c-trans">
			<div class="account-img c-base rounded">
				<label class="account-init"><?=inisialNama($this->session->nama);?></label>
				<img src="<?=base_url('aset/');?>" alt="">
			</div>
			<label class="account-name"><?=$this->session->nama;?> / <?=$this->session->role;?> <?=$this->session->unit;?></label>
		</div>
		<a href="<?=base_url('csunitit/dashboard/board');?>" class="pull-right rounded c-danger">Close</a>
	</div>
	<div class="content-container">
		<div class="col col-content">
			<h4><?=$title;?></h4>
			<div class="date-info">
				<?=date_indo(date('Y-m-d'));?>
			</div>
			<div class="mb-3"></div>
			<?php $this->load->view($hal); ?>
		</div>
		<div class="col col-menu">
			<div class="menu-logo">
				<img src="<?=base_url('aset/');?>image/asset/app-logo.png" alt="">
			</div>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/dashboard');?>" class="menu-item <?=($this->uri->segment('2')=='dashboard' and $this->uri->segment('3')=='')?'active':'';?>">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/web.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">Dashboard</div>
						<div class="menu-desc">Merupakan preview dari aktifitas yang dilakukan Unit IT</div>
					</div>
				</a>
			</div>
			<?php if($this->uri->segment('2')!='profil'){ ?>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/perbaikan');?>" class="menu-item">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/maintenance.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">PERBAIKAN</div>
						<div class="menu-desc">Permintaan perbaikan dari unit ruangan sebagai pelapor</div>
					</div>
				</a>
			</div>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/maintenance');?>" class="menu-item">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/maintenance2.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">MAINTENANCE</div>
						<div class="menu-desc">Maintenance rutin terhadap sarana dan peralatan Unit IT</div>
					</div>
				</a>
			</div>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/aset');?>" class="menu-item">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/document.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">DATA ASET</div>
						<div class="menu-desc">Aset berupa sarana dan peralatan Unit IT</div>
					</div>
				</a>
			</div>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/laporan');?>" class="menu-item">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/report.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">LAPORAN</div>
						<div class="menu-desc">Laporan aktifitas pelayanan yang dilakukan Unit IT</div>
					</div>
				</a>
			</div>
			<?php } ?>

			<?php if($this->uri->segment('2')=='profil'){ ?>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/profil/edit');?>" class="menu-item <?=($this->uri->segment('3')=='edit')?'active':'';?>">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/avatar.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">Ubah Profil</div>
						<div class="menu-desc">Mengubah profil Anda</div>
					</div>
				</a>
			</div>
			<div class="menu-button">
				<a href="<?=base_url('csunitit/profil/password');?>" class="menu-item">
					<div class="menu-icon">
						<img src="<?=base_url('aset/');?>image/asset/lock.png" alt="">
					</div>
					<div class="menu-text">
						<div class="menu-title">Ubah Kata Sandi</div>
						<div class="menu-desc">Mengubah kata sandi untuk keamanan akun Anda</div>
					</div>
				</a>
			</div>
			<?php } ?>

		</div>
	</div>
	<div class="footer-container">
		<label>Nine Cloud 2019</label>
	</div>
</body>
<script src="<?=base_url('aset/');?>internal/js/general.js"></script>

<?php (isset($js)) ? $this->load->view($js) : ""; ?>
</html>