<p class="login-box-msg">Silahkan masukkan email atau nomor handphone Anda, untuk melakukan reset password.</p>
<?=$this->session->flashdata('name');?>
<?=form_error('auth');?>
<?=form_open('adminpusat/auth/lupa');?>
  <div class="input-group mb-3">
    <input type="text" class="form-control" name="auth" placeholder="Email / No. Hp">
    <div class="input-group-append">
      <div class="input-group-text">
        <span class="fas fa-envelope"></span>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <button type="submit" class="btn btn-primary btn-block">KIRIM</button>
    </div>
    <!-- /.col -->
  </div>
</form>

<p class="mt-3 mb-1">
  <a href="<?=base_url('adminpusat/auth');?>">Masuk ke Admin Pusat</a>
</p>