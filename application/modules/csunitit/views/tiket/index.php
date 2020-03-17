<?=form_open('csunitit/tiket');?>
<div class="f-col-5 f-float-round pad-sm mb-3">
	<input type="hidden" name="idtroubleshooting" id="inputIdtroubleshooting" class="form-control" value="<?=$idtroubleshooting;?>">
	<input type="hidden" name="tanggal" id="inputTanggal" class="form-control" value="<?=date('Y-m-d H:i:s');?>">
	<div class="row">
		<div class="col-md">ID Tiket</div>
		<div class="col-md">Pelapor</div>
		<div class="col-md">Tanggal</div>
		<div class="col-md">Waktu</div>
	</div>
	<div class="row text-danger mb-3">
		<div class="col-md">
			<strong><?=$tiket;?></strong>
			<input type="hidden" name="tiket" id="inputTiket" class="form-control" value="<?=$tiket;?>">
		</div>
		<div class="col-md">
			<strong><?=$nama;?></strong>
			<input type="hidden" name="nama" id="inputNama" class="form-control" value="<?=$nama;?>">
		</div>
		<div class="col-md"><strong><?=hari_ini();?>, <?=date_indo(date('Y-m-d'));?></strong></div>
		<div class="col-md"><strong><?=time_indo(date('Y-m-d H:i:s'));?> WIB</strong></div>
	</div>
</div>

<div class="f-col-5 f-float-round pad-sm mb-3">
	<div class="row mb-3">
		<div class="col-md">
			<select name="ruangan" id="inputRuangan" class="form-control" required="required">
				<option value="">Pilih Ruangan</option>
				<?php foreach($ruangan as $r): ?>
				<option value="<?=$r->id;?>">Ruangan <?=$r->name;?></option>
				<?php endforeach; ?>
			</select>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-md">
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
	<div class="row mb-3">
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
	</div>
</div>
<div class="row">
	<div class="col-md text-center">
		<button type="submit" class="btn btn-success btn-lg">TERBITKAN</button>
	</div>
</div>
<?=form_close();?>