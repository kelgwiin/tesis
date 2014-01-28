<script>
STOOLS = {
	base_url : '<?php echo site_url(); ?>',
	getvalue: function(oid,ip,comm,timeout) 
	{
		/*$.ajax({
            'url' : this.base_url + '/snmp/get_value_oid',
            'type' : 'POST', //the way you want to send data to your URL
            'data' : {objeto : oid, direccion : ip, tiempo : timeout},
            'success' : function(data){ //probably this request will return anything, it'll be put in var "data"
                if(data){
                    return data;
                }
            }
        });//*/
        return ([(new Date()).getTime(),Math.random()]);
    }
}

$(function (){
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
                            var snmp1 = STOOLS.getvalue(),
                            	snmp2 = STOOLS.getvalue();
                            series1.addPoint([snmp1[0], snmp1[1]], true, true);
                            series2.addPoint([snmp2[0], snmp2[1]], true, true);
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
	                name: 'CPU',
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
	                name: 'Memoria',
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
	
	<div class="col-lg-12">
		
    	<h1>Gestión de la Capacidad</h1>
        
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Descripción general de las métricas</li>
        </ol>
        
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          Welcome to SB Admin by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>! Feel free to use this template for your admin needs! We are using a few different plugins to handle the dynamic tables and charts, so make sure you check out the necessary documentation links provided.
        </div>
        
	</div>
	
	<div class="col-lg-12">
		
		<div class="panel panel-info">	
			
			<div class="panel-heading">
			  	
				<h3 class="panel-title">Salud de Sistema</h3>
			    
			</div>
		
			<div class="panel-body">
		  	
				<div id="grafica-general" style="min-width: 310px; height: 200px; margin: 0 auto"></div>
		  
			</div>
		  
		</div>
		
	</div>
	
</div>