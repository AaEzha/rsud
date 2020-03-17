<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?> | RSUD Sidoarjo Management Service App</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('aset');?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('aset');?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('aset');?>/dist/css/adminlte.min.css">
  <?php (isset($css)) ? $this->load->view($css) : ""; ?>
</head>
<body class="hold-transition login-page">
<div class="row">
  <div class="col-md-6 px-0">
    <div class="login-box">
      <div class="card">
        <div style="background-image: url('<?=base_url('aset');?>/dist/img/login-image.jpg'); height: 395px; object-fit: fill;" class="card-body login-card-body">

    
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
  </div>
  <div class="col-md-6 px-0">
    <div class="login-box">
      <div class="card">
    <div class="card-body login-card-body">

      <?php $this->load->view($hal); ?>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url('aset');?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('aset');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('aset');?>/dist/js/adminlte.min.js"></script>
<?php (isset($js)) ? $this->load->view($js) : ""; ?>

</body>
</html>
