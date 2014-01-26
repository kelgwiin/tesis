<script>
$(function () {
    $(document).ready(function() {
        Highcharts.setOptions({
            global: { useUTC: false }
        });
    
        var chart;
        $('#grafica-general').highcharts({
            chart: {
                type: 'spline',
                animation: Highcharts.svg, // don't animate in old IE
                marginRight: 10,
                events: {
                    load: function() {    
                        // set up the updating of the chart each second
                        var series1 = this.series[0],
                        	series2 = this.series[1];
                        setInterval(function() {
                            var x = (new Date()).getTime(), // current time
                                y = Math.random(),
                                x1 = (new Date()).getTime(), // current time
                                y1 = Math.random();
                            series1.addPoint([x, y], true, true);
                            series2.addPoint([x1, y1], true, true);
                        }, 2000);
                    }
                }
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'datetime',
                tickPixelInterval: 2000
            },
            yAxis: {
                title: { text: '%' },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                        Highcharts.numberFormat(this.y, 2);
                }
            },
            legend: { enabled: false },
            exporting: { enabled: false },
            series: 
            [
            	{
	                name: 'Random data',
	                data: (function() {
	                    // generate an array of random data
	                    var data = [],
	                        time = (new Date()).getTime(),
	                        i;
	    
	                    for (i = -19; i <= 0; i++) {
	                        data.push({
	                            x: time + i * 2000,
	                            y: Math.random()
	                        });
	                    }
	                    return data;
	                })()
	            },
	            {
	                name: 'Random data',
	                data: (function() {
	                    // generate an array of random data
	                    var data = [],
	                        time = (new Date()).getTime(),
	                        i;
	    
	                    for (i = -19; i <= 0; i++) {
	                        data.push({
	                            x: time + i * 2000,
	                            y: Math.random()
	                        });
	                    }
	                    return data;
	                })()
	            }	            
	        ]
        });
    });    
});
</script>
<div id="page-wrapper">
	<div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">Salud de Sistema</h3>
      </div>
      <div class="panel-body">
        <div id="grafica-general" style="min-width: 310px; height: 200px; margin: 0 auto"></div>
      </div>
    </div>
	
</div>