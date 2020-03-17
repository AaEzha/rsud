		<?=$this->session->flashdata('name');?>
  		<div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Pilih Unit</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                    class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                    class="fas fa-remove"></i></button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                	<?=form_open('adminpusat/pengguna');?>
                  <div class="form-group">
                    <select name="unit_id" class="form-control select2">
                    	<?php foreach($units as $unit){ ?> 
                      <option value="<?=$unit->id;?>">Admin <?=$unit->name;?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-3">
                  <div class="form-group"><button type="submit" class="btn btn-success btn-block"><i class="fa fa-eye"></i> Tampilkan</button></div>
                  <!-- /.form-group -->
                </div>
            	  </form>
                <div class="col-3">
                  <div class="form-group">
                    <a href="<?=base_url('adminpusat/pengguna/tambah');?>" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Tambah Pengguna</a>
                  </div>
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
            <h3 class="card-title">Data Pengguna Admin <?=$u->name;?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 1%">
                    No
                  </th>
                  <th>
                    Nama Pengguna
                  </th>
                  <th>
                  	#
                  </th>
                </tr>
              </thead>
              <tbody>
              	<?php $no=1; foreach($datas as $data): ?>
                <tr>
                	<td><?=$no++;?></td>
                	<td><?=$data->name;?></td>
                	<td>
                		<a href="<?=base_url('adminpusat/pengguna/detail/'.$data->id);?>" class="btn btn-success btn-sm"><i class="fa fa-eye"></i> Detail</a>
                		<a href="<?=base_url('adminpusat/pengguna/edit/'.$data->id);?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                		<a href="#" class="btn btn-danger btn-sm swalDeleteDataUser" id="hps<?=$data->id;?>"><i class="fa fa-trash"></i> Delete</a>
                	</td>
                </tr>
            	<?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->