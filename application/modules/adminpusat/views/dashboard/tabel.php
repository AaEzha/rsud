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


                <?php

                $month = date('m');
                $year = date('Y');

                $tgl = ""; 
                $data = "";
                for($d=1; $d<=31; $d++)
                {
                    $time=mktime(12, 0, 0, $month, $d, $year);
                          
                    if (date('m', $time)==$month)
                        $tgl .= "'".date('d', $time). "', ";
                }
                $tgl = rtrim($tgl,', ');
                $data = rtrim($data,', ');

                ?>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover table-sm">
                    <caption>List of users</caption>
                    <thead class="thead-dark ">
                      <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Unit IT</th>
                        <th scope="col">Unit IPS</th>
                        <th scope="col">Unit ITP</th>
                        <th scope="col">Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $month = date('m');
                      $year = date('Y');
                      $total_a = 0;
                      $total_b = 0;
                      $total_c = 0;
                      $total_z = 0;
                      
                      for($d=1; $d<=31; $d++){ 
                        $time=mktime(12, 0, 0, $month, $d, $year);
                      ?>
                      <tr>
                        <th><?=(date('m', $time)==$month) ? date('d-m-Y', $time) : '';?></th>
                        <td><?=$a=dashboard_tabel(date('Y-m-d', $time),2);?></td>
                        <td><?=$b=dashboard_tabel(date('Y-m-d', $time),3);?></td>
                        <td><?=$c=dashboard_tabel(date('Y-m-d', $time),4);?></td>
                        <td><?=$total=$a+$b+$c;?></td>
                      </tr>
                      <?php 
                        $total_a = $total_a + $a;
                        $total_b = $total_b + $b;
                        $total_c = $total_c + $c;
                        $total_z = $total_z + ($a+$b+$c);
                      } ?>
                      <tr>
                        <th scope="row">Total</th>
                        <td><?=$total_a;?></td>
                        <td><?=$total_b;?></td>
                        <td><?=$total_c;?></td>
                        <td><?=$total_a+$total_b+$total_c;?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>