<script src="<?=base_url('aset');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
  $(function() {
      Swal.fire({
        type: 'error',
        title: '<h3>Recovery Password gagal!</h3>',
        text: 'Mohon maaf, email/nomor telepon Anda tidak terdaftar dalam sistem sehingga kami tidak bisa mengirim username dan password Anda.\n\nSilahkan menghubungi Admin untuk melakukan recovery akun Anda.',
        confirmButtonText: '<a class="text-white" href="<?=base_url('csunitit/auth');?>">OK</a>'
      });
  });
</script>