<script>
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Monitoreo del <?php echo $nombre_servicio; ?> durante la semana'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
            	
            	<?php if(( $longitud )==1){ ?>
   					categories: ['<?php echo $fechas[1]; ?>'],
                <?php } ?>
            	<?php if(( $longitud )==2){ ?>
   					categories: ['<?php echo $fechas[1]; ?>' ,'<?php echo $fechas[2]; ?>'],
                <?php } ?>
            	<?php if(( $longitud )==3){ ?>
   					categories: ['<?php echo $fechas[1]; ?>' ,'<?php echo $fechas[2]; ?>' ,'<?php echo $fechas[3]; ?>'],
                <?php } ?>
            	<?php if(( $longitud )==4){ ?>
   					categories: ['<?php echo $fechas[1]; ?>' ,'<?php echo $fechas[2]; ?>' ,'<?php echo $fechas[3]; ?>','<?php echo $fechas[4]; ?>'],
                <?php } ?>
                <?php if(( $longitud )==5){ ?>
   					categories: ['<?php echo $fechas[1]; ?>' ,'<?php echo $fechas[2]; ?>' ,'<?php echo $fechas[3]; ?>','<?php echo $fechas[4]; ?>','<?php echo $fechas[5]; ?>'],
                <?php } ?>
                <?php if(( $longitud )==6){ ?>
   					categories: ['<?php echo $fechas[1]; ?>' ,'<?php echo $fechas[2]; ?>' ,'<?php echo $fechas[3]; ?>','<?php echo $fechas[4]; ?>','<?php echo $fechas[5]; ?>','<?php echo $fechas[6]; ?>'],
                <?php } ?>
                <?php if(( $longitud )>=7){ ?>
   					categories: ['<?php echo $fechas[1]; ?>' ,'<?php echo $fechas[2]; ?>' ,'<?php echo $fechas[3]; ?>','<?php echo $fechas[4]; ?>','<?php echo $fechas[5]; ?>','<?php echo $fechas[6]; ?>','<?php echo $fechas[7]; ?>'],
                <?php } ?>
                               
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Horas'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Tiempo Activo',
                
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $activo[1]; ?>],
                <?php } ?>
                
                <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $activo[1]; ?>, <?php echo $activo['2']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $activo[1]; ?>, <?php echo $activo['2']; ?> , <?php echo $activo['3']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $activo[1]; ?>, <?php echo $activo['2']; ?> , <?php echo $activo['3']; ?>, <?php echo $activo['4']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $activo[1]; ?>, <?php echo $activo['2']; ?> , <?php echo $activo['3']; ?>, <?php echo $activo['4']; ?>, <?php echo $activo['5']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $activo[1]; ?>, <?php echo $activo['2']; ?> , <?php echo $activo['3']; ?>, <?php echo $activo['4']; ?>, <?php echo $activo['5']; ?>, <?php echo $activo['6']; ?>],
                <?php } ?>
                 <?php if(( $longitud )>=7){ ?>	
   					data: [<?php echo $activo[1]; ?>, <?php echo $activo['2']; ?> , <?php echo $activo['3']; ?>, <?php echo $activo['4']; ?>, <?php echo $activo['5']; ?>, <?php echo $activo['6']; ?>, <?php echo $activo['7']; ?>],
                <?php } ?>
                
            }, {
                name: 'Tiempo Inactivo',
                <?php if(( $longitud )==1){ ?>	
   					data: [<?php echo $inactivo[1]; ?>],
                <?php } ?>
                
                <?php if(( $longitud )==2){ ?>	
   					data: [<?php echo $inactivo[1]; ?>, <?php echo $inactivo['2']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==3){ ?>	
   					data: [<?php echo $inactivo[1]; ?>, <?php echo $inactivo['2']; ?> , <?php echo $inactivo['3']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==4){ ?>	
   					data: [<?php echo $inactivo[1]; ?>, <?php echo $inactivo['2']; ?> , <?php echo $inactivo['3']; ?>, <?php echo $inactivo['4']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==5){ ?>	
   					data: [<?php echo $inactivo[1]; ?>, <?php echo $inactivo['2']; ?> , <?php echo $inactivo['3']; ?>, <?php echo $inactivo['4']; ?>, <?php echo $inactivo['5']; ?>],
                <?php } ?>
                 <?php if(( $longitud )==6){ ?>	
   					data: [<?php echo $inactivo[1]; ?>, <?php echo $inactivo['2']; ?> , <?php echo $inactivo['3']; ?>, <?php echo $inactivo['4']; ?>, <?php echo $inactivo['5']; ?>, <?php echo $inactivo['6']; ?>],
                <?php } ?>
                 <?php if(( $longitud )>=7){ ?>	
   					data: [<?php echo $inactivo[1]; ?>, <?php echo $inactivo['2']; ?> , <?php echo $inactivo['3']; ?>, <?php echo $inactivo['4']; ?>, <?php echo $inactivo['5']; ?>, <?php echo $inactivo['6']; ?>, <?php echo $inactivo['7']; ?>],
                <?php } ?>
                
            }]
        });
    });
</script>
<div id="page-wrapper">

	<div class="col-lg-12">
    	<h1>Servicio Analizado: <?php echo $nombre_servicio; ?></h1>
	</div>
	
	<div class="col-lg-12">
		
		<div class="panel panel-info">
			
			<div class="panel-heading">
	       
				<h3 class="panel-title">Monitoreo del Servicio</h3>
	        	
	      	</div>
	      
	      <div class="panel-body">
	    	  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	      </div>
	      
	    </div>
	
	</div>
	</div>	
<div class="col-lg-12">
		
		<div class="row">

			<div class="col-lg-6">
				
				<h2>Listado de Servicios del Sistema</h2>
				<div class="table-responsive">
				
				<table class="table table-bordered table-hover table-striped tablesorter">
	                <thead>
	                  <tr>
	                    <th class="header">Nombre <i class="fa fa-sort"></i> </th>
	                    <th class="header">Fecha Creación <i class="fa fa-sort"></i></th>
	                    <th class="header">Cantidad Ingresos <i class="fa fa-sort"></i></th>
	                  </tr>
	                </thead>
	              <tbody> 
	             		<?php $long=$this->Disponibilidad_model->obtenerlongitudServicios(); ?>	                	
	                	<?php $servicios=$this->Disponibilidad_model->obtenernombreServicios(); ?>
	                	<?php $ids=$this->Disponibilidad_model->obteneridServicios(); ?>
	                	<?php $fechacreacion=$this->Disponibilidad_model->obtenerfechacreacionServicios(); ?>
	                	<?php $cantidadingresos=$this->Disponibilidad_model->obtenercantidadingresosServicios(); ?>
	                	<?php
	                	$i=1;
	                	while($i<=$long){ ?>	                		
	                		<tr class="active">
		                	<td>		                		                		
		                    	<a href="<?php echo base_url(); ?>index.php/Disponibilidad/Servicio/<?php echo $ids[$i]; ?>"><?php echo $servicios[$i]; ?></a> 
		                    </td>
		                    <td><?php echo $fechacreacion[$i]; ?></td>
		                    <td><?php echo $cantidadingresos[$i]; ?></td>
						</tr>
	                	<?php $i=$i+1;
	                	 } ?>
	                
	                </tbody>	                
				</table>
				</div>
				
			</div>
			
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
	                    <p class="announcement-text">Modulo de Disponibilidad</p>
	                  </div>
	                </div>
	              </div>
	               <a href="<?php echo base_url(); ?>index.php/Disponibilidad/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Regresar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-left"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>	
</div>