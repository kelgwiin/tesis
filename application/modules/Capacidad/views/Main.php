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
          Este módulo permite la gestión de las Capacidad de la organización, basado en el estado actual e histórico de los servicios y componentes.
        </div>
        
	</div>
	
	<div class="col-lg-12">
		
		<div class="row">
	        	
	          <div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                    <i class="fa fa-cogs fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Analizar Estado de Componentes IT</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo site_url('index.php/Capacidad/ComponentesIT/');?>/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Examinar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-right"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>
	          
	          <div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                    	<i class="fa fa-users fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Analizar Estado de los Servicios</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Examinar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-right"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>
	          
	          <div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                 		<i class="fa fa-sitemap fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Analizar Estado de los Departamentos</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo base_url(); ?>index.php/Capacidad/Departamentos/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Examinar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-right"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>
	          
	          <div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                  		<i class="fa fa-wrench fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Umbrales</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo base_url(); ?>index.php/Capacidad/Umbrales/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Examinar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-right"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>
	          
	          <div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                    	<i class="fa fa-book fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Documentación</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo base_url(); ?>index.php/Capacidad/Documentacion/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Revisar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-right"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>
	          
	          <div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                    <i class="fa fa-flag fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Módulos del Sistema</p>
	                  </div>
	                </div>
	              </div>
	              <a href="#">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Examinar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-right"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>	          
	          
	        </div><!-- /.row -->
		</div>
	
</div>