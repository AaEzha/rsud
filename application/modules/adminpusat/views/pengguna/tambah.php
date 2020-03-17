<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('aset');?>/dist/img/avatar.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Nama</h3>

                <?=form_open('adminpusat/pengguna/tambah');?>
                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i> <b>Tambah Data</b></button>

                <a href="<?=base_url('adminpusat/pengguna');?>" class="btn btn-default btn-block">Kembali</a>

                <?=validation_errors('<small class="text-danger">','</small>');?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          
          <div class="col-md-9">
            <!-- About Me Box -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user-tie mr-1"></i> Nama</strong>

                <div class="form-group">
                  <input type="text" class="form-control <?=(form_error('nama'))?'is-invalid':'';?>" name="nama" placeholder="nama" value="<?=set_value('nama');?>">
                  <?=form_error('nama','<small class="text-danger">','</small>');?>
                </div>

                <hr>

                <strong><i class="fas fa-user-tie mr-1"></i> Username</strong>

                <div class="form-group">
                  <input type="text" class="form-control <?=(form_error('username'))?'is-invalid':'';?>" name="username" placeholder="username" value="<?=set_value('username');?>">
                  <?=form_error('username','<small class="text-danger">','</small>');?>
                </div>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Password</strong>

                <div class="form-group">
                  <input type="text" class="form-control <?=(form_error('password'))?'is-invalid':'';?>" name="password" placeholder="password" value="<?=set_value('password');?>">
                  <?=form_error('password','<small class="text-danger">','</small>');?>
                </div>

                <hr>

                <strong><i class="fas fa-key mr-1"></i> Email</strong>
                
                <div class="form-group">
                  <input type="text" class="form-control <?=(form_error('email'))?'is-invalid':'';?>" name="email" placeholder="email" value="<?=set_value('email');?>">
                  <?=form_error('email','<small class="text-danger">','</small>');?>
                </div>

                <hr>

                <strong><i class="fas fa-mobile-alt mr-1"></i> Contact No.</strong>

                <div class="form-group">
                  <input type="text" class="form-control <?=(form_error('phone'))?'is-invalid':'';?>" name="phone" placeholder="phone" value="<?=set_value('phone');?>">
                  <?=form_error('phone','<small class="text-danger">','</small>');?>
                </div>

                <hr>

                <strong><i class="fas fa-user-tag mr-1"></i> Posisi</strong>

                <div class="form-group">
                  <select name="unit" id="inputUnit" class="form-control <?=(form_error('unit'))?'is-invalid':'';?>">
                    <option value="">Pilih Posisi</option>
                    <?php foreach($units as $unit){ ?> 
                      <option value="<?=$unit->id;?>">Admin <?=$unit->name;?></option>
                      <?php } ?>
                  </select>
                  <?=form_error('unit','<small class="text-danger">','</small>');?>
                </div>

                <hr>

                <strong><i class="fas fa-user-tag mr-1"></i> Status</strong>

                <div class="form-group">
                  <select name="status" id="inputStatus" class="form-control <?=(form_error('status'))?'is-invalid':'';?>">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Non-Aktif</option>
                  </select>
                  <?=form_error('status','<small class="text-danger">','</small>');?>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </form>