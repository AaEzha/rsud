<div class="flex">
	<h6>Data Tiket</h6>
</div>

<div class="flex">
	<div class="f-col-9 f-float-round pad-sm">
		<table>
			<tr>
				<td>ID Tiket</td>
				<td>Pelapor</td>
				<td>Tanggal</td>
				<td>Waktu</td>
				<td>Jenis</td>
				<td>Ruangan</td>
			</tr>

			<tr class="text-primary">
				<td><?=$datanya->tiket;?></td>
				<td><?=$datanya->pelapor;?></td>
				<td><?=date_indo($datanya->tanggal);?></td>
				<td><?=time_indo($datanya->tanggal);?></td>
				<td><?=$datanya->jenis;?></td>
				<td><?=$datanya->ruangan;?></td>
			</tr>
		</table>
	</div>
</div>

<div class="flex">
	<h6>Permintaan Perbaikan</h6>
</div>

<div class="flex">
	<div class="f-col-9 f-float-round pad-sm">
		<table class="table table-borderless">
			<?php foreach($alat as $data): ?>
			<tr>
				<td><?=$data->idaset;?></td>
				<td><?=$data->deskripsiproduk;?></td>
				<td><?=$data->namaaset;?></td>
				<td>
					<a href="#" class="btn btn-primary btn-sm rounded" data-toggle="modal" data-target="#exampleModal">Detail</a>
				</td>
			</tr>

			<!-- MODAL -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-xl" role="document">
			    <div class="modal-content">
			      <div class="modal-header bg-success text-light">
			        <h5 class="modal-title" id="exampleModalLabel">DETAIL PERMINTAAN PERBAIKAN</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">

			        <div class="text-warning lead"><strong>Keterangan Aset</strong></div>
			        <div class="row">
			        	<div class="col-sm">Kode Aset</div>
			        	<div class="col-sm">Nama Aset</div>
			        	<div class="col-sm">Keterangan Aset</div>
			        </div>
			        <div class="row mb-3">
			        	<div class="col-sm"><strong><?=$data->idaset;?></strong></div>
			        	<div class="col-sm"><strong><?=$data->namaaset;?></strong></div>
			        	<div class="col-sm"><strong><?=$data->deskripsiaset;?></strong></div>
			        </div>
			        <div class="row">
			        	<div class="col-sm">Kategori Aset</div>
			        	<div class="col-sm">Sub-Kategori Aset</div>
			        	<div class="col-sm">Detail Kategori Aset</div>
			        </div>
			        <div class="row mb-3">
			        	<div class="col-sm"><strong><?=$data->kategoriaset;?></strong></div>
			        	<div class="col-sm"><strong><?=$data->subkategoriaset;?></strong></div>
			        	<div class="col-sm"><strong><?=$data->detailkategori;?></strong></div>
			        </div>

			        <div class="text-warning lead"><strong>Keterangan Lokasi</strong></div>
			        <div class="row">
			        	<div class="col-sm">Nama Ruangan</div>
			        	<div class="col-sm">Area Ruangan</div>
			        	<div class="col-sm">Detail Ruangan</div>
			        </div>
			        <div class="row mb-3">
			        	<div class="col-sm"><strong><?=$data->ruangan;?></strong></div>
			        	<div class="col-sm"><strong><?=$data->area;?></strong></div>
			        	<div class="col-sm"><strong><?=$data->noruangan;?></strong></div>
			        </div>

			        <div class="text-warning lead"><strong>Keluhan</strong></div>
			        <div class="flex">
			        	<?=$data->keluhan;?>
			        </div>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- END MODAL -->
			<?php endforeach; ?>
		</table>
	</div>
</div>

<div class="flex">
	<h6>Delegasi Petugas</h6>
</div>
<?=form_open('csunitit/respon/tiket/'.$id);?>
<input type="hidden" name="idtiket" id="inputIdtiket" class="form-control" value="<?=$id;?>">
<input type="hidden" name="idtrouble" id="inputIdtrouble" class="form-control" value="<?=$datanya->idtrouble;?>">
<?php $no=1; foreach($petugas as $data): ?>
<div class="flex">
	<div class="f-col-9 f-float-round pad-sm">
		<div class="row">
			<div class="col-md-3 my-auto">
				<img src="<?=base_url('aset/dist/img/avatar04.png');?>" width="100">
			</div>
			<div class="col-md-6 my-auto">
				<div class="row">
					<small>Nama Petugas</small>
				</div>
				<div class="row">
					<h4 class="text-warning"><?=$data->name;?></h4>
				</div>
				<div class="row">
					<table>
						<tr>
							<td width="10">Total Tugas</td>
							<td width="10">Selesai</td>
							<td width="10">Belum Selesai</td>
						</tr>
						<tr>
							<td><h4 class="text-primary"><?=rekor_petugas($data->id);?></h4></td>
							<td><h4 class="text-primary"><?=rekor_petugas($data->id, 4);?></h4></td>
							<td><h4 class="text-primary"><?=rekor_petugas($data->id, 3);?></h4></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col-md-3 my-auto">
				<div class="custom-control custom-radio">
				  <input type="radio" id="<?=$no;?>" name="petugas" value="<?=$data->id;?>" class="custom-control-input" <?=($no=='1')?'checked':'';?>>
				  <label class="custom-control-label" for="<?=$no;?>">Pilih</label>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $no++; endforeach; ?>

<div class="flex justify-content-center">
	<button type="submit" class="btn btn-primary btn-lg">Tugaskan</button><?=form_close();?>
</div>