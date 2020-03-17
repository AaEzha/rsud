<script src="<?=base_url('aset');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
        <script type="text/javascript">
  // $(function() {
    $('.btn-succes').click(function(){
      alert('hay');
    });
    <?php $no=1; foreach($datas as $data): ?>
    $('#hps<?=$data->id;?>').click(function () {
      Swal.fire({
        type: 'danger',
        title: '<h3>Anda akan menghapus akun ini!</h3>',
        text: '<?=$data->name;?> adalah akun aktif pada sistem ini dan akan terhapus. Apakah Anda yakin?',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonColor: '#d33',
        confirmButtonText: '<a class="text-white" href="<?=base_url('adminpusat/pengguna/hapus/'.$data->id);?>">Ya, hapus!</a>'
      });
    });
    <?php endforeach; ?>
  // });
</script>