<script src="<?=base_url('aset');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
      Swal.fire({
        type: 'success',
        title: '<h3>Selangkah lagi untuk recovery Password Anda!</h3>',
        text: 'Akun Anda terdaftar di dalam sistem. Silahkan periksa email untuk mengetahui username dan password Anda.\r\nApabila Anda belum menerima email, silahkan kontak Admin.\r\nApakah Anda mengerti?',
        confirmButtonText: '<a class="text-white" href="<?=base_url('adminpusat/auth');?>">OK</a>'
      });
  });
</script>