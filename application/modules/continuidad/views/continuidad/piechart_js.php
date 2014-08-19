<script>
	$(function()
	{
	    $('#container').highcharts(
	    {
	        chart:
	        {
	            plotBackgroundColor: null,
	            plotBorderWidth: 1,//null,
	            plotShadow: false
	        },
	        title:
	        {
	            text: 'Riesgos y amenazas que afectan a la organización'
	        },
	        tooltip:
	        {
	    	    pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
	        },
	        plotOptions:
	        {
	            pie: 
	            {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: 
	                {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.percentage:.2f} %',
	                    style: 
	                    {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
	        series:
	        [{
	            type: 'pie',
	            name: 'Riesgo',
	            data:
	            [
	            	<?php foreach($percents as $key => $percent) : ?>
	            		['<?php echo $key ?>', <?php echo $percent ?>],
	            	<?php endforeach ?>
	            ],
	            events:
	            {
	            	click: function(e)
	            	{
	            		var url = '<?php echo base_url() ?>index.php/continuidad/listado_pcn/'+e.point.name.toLowerCase();
	            		$(location).attr('href',url);
	            	}
	            }
	        }]
	    });
	});
</script>