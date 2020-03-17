<div class="text-right mb-3"><a href="<?=base_url('csunitit/dashboard');?>" class="btn rounded c-danger">Close</a></div>
<?=$this->session->flashdata('name');?>
<?=validation_errors();?>
<div class="f-col-5 f-float-round pad-sm mb-3">
	<?=form_open('csunitit/tiket/buat');?>
	<input type="hidden" name="idtroubleshooting" id="inputIdtroubleshooting" class="form-control" value="<?=$this->session->t_idtroubleshooting;?>">
	<div class="row">
		<div class="col-md">ID Tiket</div>
		<div class="col-md">Pelapor</div>
		<div class="col-md">Tanggal</div>
	</div>
	<div class="row text-danger mb-3">
		<div class="col-md">
			<strong><?=$this->session->t_tiket;?></strong>
		</div>
		<div class="col-md">
			<strong><?=$this->session->t_nama;?></strong>
			<input type="hidden" name="nama" id="inputNama" class="form-control" value="<?=$this->session->t_tiket;?>">
		</div>
		<div class="col-md"><strong><?=$this->session->t_tanggal;?></strong></div>
	</div>
	<div class="row">
		<div class="col-md">Waktu</div>
		<div class="col-md">Ruangan</div>
		<div class="col-md"></div>
	</div>
	<div class="row text-danger">
		<div class="col-md"><strong><?=time_indo($this->session->t_tanggal);?> WIB</strong></div>
		<div class="col-md"><strong>Ruangan <?=$ruangan->name;?></strong></div>
		<div class="col-md"></div>
	</div>
</div>

<div class="f-col-5 f-float-round pad-sm mb-3">
	<div class="row">
		<div class="col-md">
			<input type="hidden" name="ruangan" id="inputRuangan" class="form-control" value="<?=$ruangan->id;?>">
			<select name="area" id="inputArea" class="form-control" required="required">
				<option value="">Pilih Area</option>
				<?php foreach($areas as $area): ?>
				<option value="<?=$area->id;?>"><?=$area->name;?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="col-md">
			<select name="detail" id="inputDetail" class="form-control" required="required">
				<option value="">Pilih Detail Area</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<select name="aset" id="inputAset" class="form-control" required="required">
				<option value="">Pilih Aset</option>
			</select>
			<input type="hidden" name="id_asset_register" id="inputId_asset_register" class="form-control" value="">
			<input type="hidden" name="asset_name" id="inputAsset_name" class="form-control" value="">
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<textarea name="keluhan" id="inputKeluhan" class="form-control" rows="3" required="required" placeholder="Tulis keluhan"></textarea>
		</div>
		<div class="col-md-2">
			<button type="submit" class="btn btn-success rounded btn-lg"><i class="fa fa-plus"></i> Tambah</button>
		</div>
	</div>
	<?=form_close();?>
</div>

<h6>Permintaan Perbaikan</h6>

<div class="f-col-5 f-float-round pad-sm">

</div>