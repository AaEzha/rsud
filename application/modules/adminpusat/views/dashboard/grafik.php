<?php

$month = date('m');
$year = date('Y');

$tgl = ""; 
$data = "";
for($d=1; $d<=31; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);
          
    if (date('m', $time)==$month)
        $tgl .= "'".date('d', $time). "', ";
        $data .= "'".dashboard_grafik(date('Y-m-d', $time)). "', ";
}
$tgl = rtrim($tgl,', ');
$data = rtrim($data,', ');

?>
<script src="<?=base_url('aset');?>/plugins/chart.js/Chart.min.js"></script>
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      // labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      labels  : [<?=$tgl;?>],
      datasets: [{
        type                : 'line',
        // data                : [1,56,2,4,6,30,59],
        data                : [<?=$data;?>],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 10
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>