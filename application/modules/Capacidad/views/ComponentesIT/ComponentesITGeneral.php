<script>
	var resourceUse = [], categorias = [], cpu = [], ram = [], hd = [];
	var resourceIndex = 0;
	var resourceAux = 0;
</script>
<?php
$resourceIndex = 0;
foreach ($resourceUse as $resource)
{
	$dataIndex = 0;
	?>
	<script>
	resourceUse[resourceIndex] = new Array();
	var dataIndex = 0;
	</script>
	<?php
	while ($dataIndex < sizeof($resource)-1)
	{
	?>
	<script>
		categorias[resourceAux] = "<?php echo $resource[$dataIndex]['hora']; ?>";
		cpu[resourceAux] = parseInt("<?php echo $resource[$dataIndex][0]; ?>");
		ram[resourceAux] = parseInt("<?php echo $resource[$dataIndex][1]; ?>");
		hd[resourceAux] = parseInt("<?php echo $resource[$dataIndex][2]; ?>");
		dataIndex++;
		resourceAux++;
	</script>
	<?php
	$dataIndex++; 
	}
	?>
	<script>
		resourceIndex++;
	</script>
	<?php
	$resourceIndex++;
}
?>
<script>
$(function () {
    $('#container').highcharts({
    	chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Tasa de Uso de Recursos',
            x: -20 //center
        },
        subtitle: {
            text: 'Basado en métricas de medición',
            x: -20
        },
        xAxis: {
           categories: categorias
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
                name: 'Uso CPU',
                data: cpu

            }, {
                name: 'Uso Ram',
                data: ram


            }]
    });
	$('#disco').highcharts({
    	chart: {
            zoomType: 'x'
        },
        title: {
            text: 'Tasa de Transferencia',
            x: -20 //center
        },
        subtitle: {
            text: 'Basado en métricas de medición',
            x: -20
        },
        xAxis: {
           categories: categorias
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
            valueSuffix: 'kb'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
                name: 'Uso Discos',
                data: hd
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
	      <div class="panel-heading">
	       
				<h3 class="panel-title">Uso de Disco</h3>
	        	
	      	</div>
	      <div class="panel-body">
	    	  <div id="disco" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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