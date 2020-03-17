<!-- SweetAlert2 -->
<script src="<?=base_url('aset');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {

    $('.swalDefaultSuccess').click(function() {
      Swal.fire({
        type: 'success',
        title: '<h3>Selamat Password Anda berhasil di Recovery!</h3>',
        text: 'Silahkan masuk ke Login dan masuk dengan Password baru Anda',
        confirmButtonText: '<a class="text-white" href="<?=base_url('adminpusat/auth');?>">LANJUT</a>'
      })
    });
  });

</script>