<script src="<?=base_url('aset');?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
	// $('.btn').click(function(){
	// 	Swal.fire(
	// 	  'We\'re Sorry',
	// 	  'This one will be coming soon',
	// 	  'warning'
	// 	)
	// });

	Highcharts.chart('dashboard-info', {
		chart: {
			type: 'bar',
			height: '300px'
		},
		title: {
			text: 'UNIT IT'
		},
		subtitle: {
			text: 'RSUD Sidoarjo'
		},
		xAxis: {
			categories: ['Permintaan', 'Proses', 'Selesai', 'Pending'],
			title: {
				text: "Status Pelayanan"
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Jumlah aktifitas',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ' aksi'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 80,
			floating: true,
			borderWidth: 1,
			backgroundColor:
			Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
			shadow: true
		},
		credits: {
			enabled: false
		},
		series: [{
			data: [<?=$permintaan;?>, <?=$proses;?>, <?=$selesai;?>, <?=$pending;?>]
		}]
	});
</script>