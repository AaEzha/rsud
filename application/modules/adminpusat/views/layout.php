<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?=$title;?> | RSUD Sidoarjo Management Service App</title>

  <link rel="stylesheet" href="<?=base_url('aset');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('aset');?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('aset');?>/dist/css/adminlte.min.css">
  <style type="text/css">
    .btn-rounded {
      border-radius: 24px;
    }
  </style>
  <?php (isset($css)) ? $this->load->view($css) : ""; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('adminpusat/dashboard/board');?>" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" href="//telegram.com" target="_blank">
          Telegram
          <i class="fab fa-telegram"></i>
        </a>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          Notifikasi &nbsp;
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-laptop-code mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" href="<?=base_url('adminpusat/dashboard/board');?>">
          Close
        </a>
      </li>

      <!-- Profile Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('adminpusat/profil');?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?=base_url('aset');?>/dist/img/user2-160x160.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?=$this->session->nama;?>
                  <span class="float-right text-sm text-warning"><i class="fas fa-info-circle"></i></span>
                </h3>
                <p class="text-sm">ADMIN PUSAT</p>
                <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> Active 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('adminpusat/profil');?>" class="dropdown-item dropdown-footer"><i class="fas fa-user-alt mr-2"></i>My Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url('adminpusat/auth/keluar');?>" class="dropdown-item dropdown-footer"><i class="fas fa-sign-out-alt mr-2"></i>Sign Out
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('adminpusat');?>" class="brand-link">
      <img src="<?=base_url('aset');?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ADMIN PUSAT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('aset');?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=base_url('adminpusat/profil');?>" class="d-block"><?=$this->session->nama;?></a>
          <a href="<?=base_url('adminpusat/profil');?>" class="d-block link-muted"><b>Admin Pusat</b></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">MAIN APPLICATION</li>
          <li class="nav-item has-treeview<?=($this->uri->segment(2)=='' or $this->uri->segment(2)=='dashboard' or $this->uri->segment(2)=='pengguna' or $this->uri->segment(2)=='unit')?' menu-open':'';?>">
            <a href="#" class="nav-link<?=($this->uri->segment(2)=='' or $this->uri->segment(2)=='dashboard' or $this->uri->segment(2)=='pengguna' or $this->uri->segment(2)=='unit')?' active':'';?>">
              <i class="nav-icon fas fa-rocket"></i>
              <p>
                GO TO APLIKASI 
                <i class="right fas fa-angle-left"></i>
                <!-- <span class="badge badge-light right">4</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/dashboard');?>" class="nav-link<?=($this->uri->segment(2)=='' or $this->uri->segment(2)=='dashboard')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Admin Pusat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/pengguna');?>" class="nav-link<?=($this->uri->segment(2)=='pengguna')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelola Pengguna</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/unit');?>" class="nav-link<?=($this->uri->segment(2)=='unit' and $this->uri->segment(3)!='laporan')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aktifitas Unit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/unit/laporan');?>" class="nav-link<?=($this->uri->segment(3)=='laporan')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Aktifitas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">KELOLA BACKUP DATA</li>
          <li class="nav-item has-treeview<?=($this->uri->segment(2)=='backup')?' menu-open':'';?>">
            <a href="#" class="nav-link<?=($this->uri->segment(2)=='backup')?' active':'';?>">
              <i class="nav-icon fas fa-database"></i>
              <p>
                BACKUP DATA
                <i class="right fas fa-angle-left"></i>
                <!-- <span class="badge badge-light right">4</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/backup/it');?>" class="nav-link<?=($this->uri->segment(3)=='it')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup Data IT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/backup/ips');?>" class="nav-link<?=($this->uri->segment(3)=='ips')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup Data IPS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/backup/itp');?>" class="nav-link<?=($this->uri->segment(3)=='itp')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup Data ITP</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/backup/ruangan');?>" class="nav-link<?=($this->uri->segment(3)=='ruangan')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup Data Ruangan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">INFORMASI AKUN SAYA</li>
          <li class="nav-item has-treeview<?=($this->uri->segment(2)=='profil')?' menu-open':'';?>">
            <a href="<?=base_url('adminpusat/profil');?>" class="nav-link<?=($this->uri->segment(2)=='profil')?' active':'';?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                AKUN SAYA
                <i class="right fas fa-angle-left"></i>
                <!-- <span class="badge badge-light right">1</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/profil');?>" class="nav-link<?=($this->uri->segment(2)=='profil')?' active':'';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url('adminpusat/auth/keluar');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sign Out</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?=$title;?></h1>
            <h6 class="m-0 text-dark mt-2"><?=longdate_indo(date('Y-m-d'));?></h6>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('adminpusat');?>">Home</a></li>
              <li class="breadcrumb-item active"><?=$title;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php $this->load->view($hal); ?>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?=(date('Y')=='2020') ? '2020' : "2020 - ".date('Y');?> <a href="#">RSUD SIDOARJO MANAGEMENT APPLICATION</a>.</strong> All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=base_url('aset');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url('aset');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url('aset');?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('aset');?>/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=base_url('aset');?>/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=base_url('aset');?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=base_url('aset');?>/plugins/raphael/raphael.min.js"></script>
<script src="<?=base_url('aset');?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=base_url('aset');?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->

<script src="<?=base_url('aset');?>/dist/js/demo.js"></script>
<?php (isset($js)) ? $this->load->view($js) : ""; ?>
</body>
</html>
