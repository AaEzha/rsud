<?=$this->session->flashdata('name');?>
<div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-info card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('aset');?>/dist/img/user3-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$data->name;?></h3>
                <?=form_open('adminpusat/profil');?>
                <input type="hidden" name="id" id="inputId" class="form-control" value="<?=$data->id;?>">
                <button type="submit" class="btn btn-info btn-block"><b>Simpan Profile</b></button>

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
                <strong><i class="fas fa-user-tie mr-1"></i> Name</strong>

                <p class="text-muted">
                  <input type="text" name="nama" class="form-control" value="<?=$data->name;?>">
                </p>

                <hr>
                <strong><i class="fas fa-user-tie mr-1"></i> Username</strong>

                <p class="text-muted">
                  <input type="text" name="username" class="form-control" value="<?=$data->username;?>">
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Password</strong>

                <input type="text" name="password" class="form-control" value="<?=$data->password;?>">

                <hr>

                <strong><i class="fas fa-key mr-1"></i> Email</strong>
                <input type="text" name="email" class="form-control" value="<?=$data->email;?>">

                <hr>

                <strong><i class="fas fa-mobile-alt mr-1"></i> Contact No.</strong>

                <input type="text" name="phone" class="form-control" value="<?=$data->phone;?>">

                <hr>

                <strong><i class="fas fa-user-tag mr-1"></i> Posisi</strong>

                <select name="unit" id="inputUnit" class="form-control <?=(form_error('unit'))?'is-invalid':'';?>">
                  <option value="">Pilih Posisi</option>
                  <?php foreach($units as $unit){ ?> 
                    <option value="<?=$unit->id;?>" <?=($unit->id==$data->unitid)?'selected':'';?>>Admin <?=$unit->name;?></option>
                    <?php } ?>
                </select>

                <hr>

                <strong><i class="fas fa-check mr-1"></i> Status</strong>

                <select name="status" id="inputStatus" class="form-control <?=(form_error('status'))?'is-invalid':'';?>">
                  <option value="">Pilih Status</option>
                  <option value="1" <?=($data->status=='1')?'selected':'';?>>Aktif</option>
                  <option value="0" <?=($data->status=='0')?'selected':'';?>>Non-Aktif</option>
                </select>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>