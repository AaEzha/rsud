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

                <p class="text-muted text-center"><?=$data->unitname;?></p>

                <a href="<?=base_url('adminpusat/pengguna/edit/'.$data->id);?>" class="btn btn-info btn-block"><b>Edit Profile</b></a>

                <a href="<?=base_url('adminpusat/pengguna');?>" class="btn btn-default btn-block">Kembali</a>
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
                <strong><i class="fas fa-user-tie mr-1"></i> Username</strong>

                <p class="text-muted">
                  <?=$data->username;?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Password</strong>

                <p class="text-muted"><?=$data->password;?></p>

                <hr>

                <strong><i class="fas fa-key mr-1"></i> Email</strong>
                <p class="text-muted"><?=$data->email;?></p>

                <hr>

                <strong><i class="fas fa-mobile-alt mr-1"></i> Contact No.</strong>

                <p class="text-muted"><?=$data->phone;?></p>

                <hr>

                <strong><i class="fas fa-user-tag mr-1"></i> Posisi</strong>

                <p class="text-muted"><?=$data->rolename;?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>