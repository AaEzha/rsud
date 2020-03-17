        <?=$this->session->flashdata('name');?>
        <div class="dropdown-divider"></div>

        <div class="row mb-2">
          <div class="col-sm-12">
            <h4 class="m-0 text-dark">Permintaan Pelayanan Hari Ini</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-laptop-code"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit IT</span>
                <span class="info-box-number"><?=$a_it;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit IPS</span>
                <span class="info-box-number"><?=$a_ips;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-md"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit ITP</span>
                <span class="info-box-number"><?=$a_itp;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="dropdown-divider"></div>

        <div class="row mb-2">
          <div class="col-sm-12">
            <h4 class="m-0 text-dark">Penanganan Permintaan Hari Ini</h4>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row mb-4">
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-laptop-code"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit IT</span>
                <span class="info-box-number"><?=$b_it;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-tie"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit IPS</span>
                <span class="info-box-number"><?=$b_ips;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-4 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-md"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Unit ITP</span>
                <span class="info-box-number"><?=$b_itp;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Laporan Aktifitas | Maret 2020</h3>
                  <span class="text-right"><a href="<?=base_url('adminpusat/dashboard');?>">Grafik</a> | <a href="<?=base_url('adminpusat/dashboard/tabel');?>">Tabel</a></span>
                </div>
              </div>
              <div class="card-body">

                <div class="position-relative mb-4">
                  <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                      <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                      <div class=""></div>
                    </div>
                  </div>
                  <canvas id="visitors-chart" height="250" width="451" class="chartjs-render-monitor"
                    style="display: block; height: 200px; width: 361px;"></canvas>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>