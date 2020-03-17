<div class="flex">
	<div class="f-col-7 f-float-round pad-sm">
		<?=form_open('csunitit/perbaikan/data');?>

		<div class="row">
			<div class="col-md">
				<select name="bulan" id="inputBulan" class="form-control" required="required">
					<option value="">Pilih Bulan</option>
					<?php
					$bulan = [
						'01' => 'Januari',
						'02' => 'Februari',
						'03' => 'Maret',
						'04' => 'April',
						'05' => 'Mei',
						'06' => 'Juni',
						'07' => 'Juli',
						'08' => 'Agustus',
						'09' => 'September',
						'10' => 'Oktober',
						'11' => 'November',
						'12' => 'Desember'
					];
					foreach($bulan as $key => $value): ?>
					<option value="<?=$key;?>"><?=$value;?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-md">
				<select name="tahun" id="inputTahun" class="form-control" required="required">
					<option value="">Pilih Tahun</option>
					<?php
					$tahun = [2020, 2021, 2022, 2023, 2024, 2025];
					foreach($tahun as $tahun): ?>
					<option value="<?=$tahun;?>"><?=$tahun;?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-md">
				<select name="status" id="inputStatus" class="form-control" required="required">
					<option value="">Pilih Status</option>
					<?php foreach($status as $status): ?>
					<option value="<?=$status->id;?>"><?=$status->name;?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<div class="row">
			<div class="col-8">
				<select name="ruangan" id="inputRuangan" class="form-control" required="required">
					<option value="">Pilih Ruangan</option>
					<?php foreach($ruangan as $ruangan): ?>
					<option value="<?=$ruangan->id;?>">Ruangan <?=$ruangan->name;?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-4">
				<button type="submit" class="btn btn-danger rounded">Lock</button>
			</div>
		</div>
		
		<?=form_close();?>
	</div>
</div>