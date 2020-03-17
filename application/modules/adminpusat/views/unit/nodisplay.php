		<!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Pilih Unit dan Aktifitas</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                  class="fas fa-minus"></i></button>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <?=form_open('adminpusat/unit');?>
                <div class="form-group">
                  <select id="unit" name="unit" class="form-control" style="width: 100%;">
                    <option>----- Pilih Unit -----</option>
                    <option value="2">Unit IT</option>
                    <option value="3">Unit IPS</option>
                    <option value="4">Unit ITP</option>
                    <option value="5">Unit Ruangan</option>
                  </select>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <select id="aktifitas" name="aktifitas" class="form-control" style="width: 100%;">
                  <option>----- Pilih unit dahulu -----</option>
                </select>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <div class="form-group">
                  <button type="submit"
                    class="btn btn-primary btn-block">
                    <i class="fas fa-search">
                    </i>
                    Lihat Aktifitas
                  </button>
                </div>
              </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Aktifitas <?=$teks;?> Unit <?=$unit;?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            
          	<div class="table-responsive">
			    Mohon maaf. Belum ada data yang bisa ditampilkan
			</div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->