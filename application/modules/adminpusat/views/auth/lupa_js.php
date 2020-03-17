<!-- SweetAlert2 -->
<script src="<?=base_url('aset');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
    $('.swalDefaultSuccess').click(function() {
      Swal.fire({
        type: 'success',
        title: '<h3>Selangkah lagi untuk recovery Password Anda!</h3>',
        text: 'Silahkan periksa E-mail Anda untuk membuka Link Reset Password yang telah kami kirimkan',
        confirmButtonText: '<a class="text-white" href="<?=base_url('adminpusat/auth/recover');?>">LANJUT</a>'
      })
    });
  });
</script>