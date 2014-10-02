<?php var_dump($resourceUse); ?>
<script>
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Tasa de Uso de Recursos',
            x: -20 //center
        },
        subtitle: {
            text: 'Basado en métricas de medición',
            x: -20
        },
        xAxis: {
            categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                'Julio', 'Agosto', 'Septiembre', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Porcentaje'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'CPU',
            data: [7, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 56.5, 23.3, 18.3, 13.9, 19.6]
        }, {
            name: 'RAM',
            data: [40.2, 20.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 18.6, 12.5]
        }, {
            name: 'Disco',
            data: [10.9, 30.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 49.0, 43.9, 11.0]
        }]
    });
});
</script>
<div id="page-wrapper">

	<div class="col-lg-12">
    	<h1>Componentes IT</h1>
        
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Permite visualizar el redimiento de todos los componentes de IT y seleccionar el que se va a evaluar.</li>
        </ol>
        
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          En este apartado se muestra el uso de los distintos recursos de la Organización. Usted deberá seleccionar el que desee evaluar.
        </div>
        
	</div>
	
	<div class="col-lg-12">
		
		<div class="panel panel-info">
			
			<div class="panel-heading">
	       
				<h3 class="panel-title">Estado General Del Sistema</h3>
	        	
	      	</div>
	      
	      <div class="panel-body">
	    	  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	      </div>
	      
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
	                    <p class="announcement-text">Analizar Estado de los Procesos</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo site_url('index.php/Capacidad/ComponentesIT/Procesador');?>/">
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
	                    <p class="announcement-text">Consumo de Memoria RAM</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo site_url('index.php/Capacidad/ComponentesIT/Memoria');?>/">
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
	                    <p class="announcement-text">Transferencia en dispositivos de Almacenamiento</p>
	                  </div>
	                </div>
	              </div>
	              <a href="<?php echo site_url('index.php/Capacidad/ComponentesIT/Almacenamiento');?>/">
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