<script type="text/javascript">
	// $('#aktifitas').hide();
	$('select#unit').change(function(){
		var unit = $('#unit').val();

		var it_ips = '<option>--- Pilih Aktifitas IT/IPS ---</option><option value="1">Perbaikan</option><option value="2">Maintenance</option><option value="3">Petugas</option><option value="4">Pending Tugas</option>';

		var itp = '<option>--- Pilih Aktifitas ITP ---</option><option value="5">Pindah Pasien</option><option value="6">Petugas</option><!--<option value="7">Pending Tugas</option>-->';

		var ruang = '<option>--- Pilih Aktifitas Ruangan ---</option><option value="8">Permintaan Perbaikan</option><option value="9">Permintaan Perpindahan Pasien</option><!--<option value="10">Pending Permintaan</option>-->';

		if(unit == 2)
		{
			$.ajax({
			    success: function(){
			        $("#aktifitas").html(it_ips);
			    }
			});
		}

		if(unit == 3)
		{
			$.ajax({
			    success: function(){
			        $("#aktifitas").html(it_ips);
			    }
			});
		}

		if(unit == 4)
		{
			$.ajax({
			    success: function(){
			        $("#aktifitas").html(itp);
			    }
			});
		}

		if(unit == 5)
		{
			$.ajax({
			    success: function(){
			        $("#aktifitas").html(ruang);
			    }
			});
		}
	});
</script>