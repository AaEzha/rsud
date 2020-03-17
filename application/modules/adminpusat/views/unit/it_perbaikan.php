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
			    <table class="table table-bordered table-stripped table-hover table-sm">
			    	<tr class="bg-success">
			    		<td rowspan="2">Ruangan</td>
			    		<td rowspan="2">ID Tiket Permintaan</td>
			    		<td rowspan="2">Waktu Permintaan</td>
			    		<td colspan="2">Kerusakan</td>
			    		<td rowspan="2">Petugas</td>
			    		<td rowspan="2">Waktu Tindakan</td>
			    		<td rowspan="2">Status</td>
			    	</tr>
			    	<tr class="bg-success">
			    		<td>Ruangan</td>
			    		<td>Sarana</td>
			    	</tr>

            <?php foreach($datas as $data): ?>
			    		
			    	<tr>
			    		<td><?=$data->ruangan;?></td>
			    		<td><?=$data->tiket;?></td>
			    		<td><?=date_indo($data->waktu);?></td>
			    		<td><?=$data->area_ruangan;?></td>
			    		<td><?=$data->nama_aset;?></td>
			    		<td><?=$data->petugas;?></td>
			    		<td><?=date_indo($data->tanggaltindakan);?></td>
			    		<td><?=$data->statustugas;?></td>
			    	</tr>

          <?php endforeach; ?>
			    	
			    </table>
			</div>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->