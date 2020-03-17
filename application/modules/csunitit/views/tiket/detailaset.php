<option value="">Pilih Aset</option>
<?php foreach($data as $d):?> 
<option value="<?=$d->id;?>"><?=$d->name;?></option>
<?php endforeach; ?>