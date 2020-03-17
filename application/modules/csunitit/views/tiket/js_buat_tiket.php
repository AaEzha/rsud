<script type="text/javascript">
	$('select#inputArea').change(function(){
		var area = $('#inputArea').val();
		var ruangan = $('#inputRuangan').val();
		$.ajax({
			url: "<?=base_url('csunitit/tiket/getkamar');?>",
		    data: {ruangan:ruangan, area:area},
		    method: "GET",
		    cache: false,
		    success: function(msg){
		        $("#inputDetail").html(msg);
		    }
		});
	});

	$('select#inputDetail').change(function(){
		var kamar = $('#inputDetail').val();
		$.ajax({
			url: "<?=base_url('csunitit/tiket/getaset');?>",
		    data: {kamar:kamar},
		    method: "GET",
		    cache: false,
		    success: function(msg){
		        $("#inputAset").html(msg);
		    }
		});
	});

	$('select#inputAset').change(function(){
		var id = $('#inputAset').val();
		$.ajax({
			url: "<?=base_url('csunitit/tiket/idaset');?>",
		    data: {id:id},
		    method: "GET",
		    cache: false,
		    success: function(msg){
		        $("#inputId_asset_register").val(msg);
		    }
		});
	});

	$('select#inputAset').change(function(){
		var id = $('#inputAset').val();
		$.ajax({
			url: "<?=base_url('csunitit/tiket/namaaset');?>",
		    data: {id:id},
		    method: "GET",
		    cache: false,
		    success: function(msg){
		        $("#inputAsset_name").val(msg);
		    }
		});
	});
</script>