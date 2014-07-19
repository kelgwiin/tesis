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
            name: 'Proceso1',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 56.5, 23.3, 18.3, 13.9, 19.6]
        }, {
            name: 'Proceso2',
            data: [10.2, 20.8, 5.7, 11.3, 27.0, 22.0, 24.8, 24.1, 20.1, 14.1, 18.6, 12.5]
        }, {
            name: 'Proceso3',
            data: [12.9, 30.6, 3.5, 8.4, 23.5, 17.0, 18.6, 17.9, 14.3, 49.0, 43.9, 11.0]
        }, {
            name: 'Proceso4',
            data: [6.9, 14.2, 15.7, 18.5, 11.9, 35.2, 29.0, 16.6, 14.2, 22.3, 36.6, 44.8]
        }, {
            name: 'Proceso5',
            data: [7.9, 22.2, 17.7, 16.5, 31.9, 32.2, 19.0, 14.6, 15.2, 40.3, 16.6, 34.8]
        }, {
            name: 'Proceso6',
            data: [6.9, 12.2, 19.7, 19.5, 21.9, 11.2, 14.0, 12.6, 19.2, 10.3, 6.6, 14.8]
        }, {
            name: 'Proceso7',
            data: [10.9, 19.2, 13.7, 17.5, 41.9, 45.2, 12.0, 26.6, 12.2, 20.3, 46.6, 54.8]
        }, {
            name: 'Proceso8',
            data: [11.9, 13.2, 14.7, 22.5, 7.9, 25.2, 39.0, 36.6, 33.2, 35.3, 26.6, 34.8]
        }]
    });
});
</script>
<div id="page-wrapper">

	<div class="col-lg-12">
    	<h1>Procesos</h1>
        
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Consumo de CPU de la Organización</li>
        </ol>
        
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          En este módulo tenemos una representación gráfica del porcentaje de uso de los procesos de la Organización.
        </div>
        
	</div>
	
	<div class="col-lg-12">
		
		<div class="panel panel-info">
			
			<div class="panel-heading">
	       
				<h3 class="panel-title">Recursos consumidos por el Sistema.</h3>
	        	
	      	</div>
	      
	      <div class="panel-body">
	    	  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	      </div>
	      
	    </div>
	
	</div>
	
	<div class="col-lg-12">
		
		<div class="row">

			<div class="col-lg-6">
				
				<h2>Listado de Procesos consumiendo recursos en el sistema.</h2>
				<div class="table-responsive">
				
				<table class="table table-bordered table-hover table-striped tablesorter">
	                <thead>
	                  <tr>
	                    <th class="header">Nombre <i class="fa fa-sort"></i> </th>
	                    <th class="header">Visits <i class="fa fa-sort"></i></th>
	                    <th class="header">% De Uso <i class="fa fa-sort"></i></th>
	                    <th class="header">% De Uso <i class="fa fa-sort"></i></th>
	                  </tr>
	                </thead>
	                
	                <tbody>
	                	<tr class="active">
		                	<td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio1">Proceso1</a> 
		                    </td>
		                    <td>1265</td>
		                    <td>32.3%</td>
		                    <td>$321.33</td>
						</tr>
	                  
						<tr class="success">
							<td>
								<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio2">Proceso2</a>
							</td>
							<td>261</td>
							<td>33.3%</td>
							<td>$234.12</td>
						</tr>
	                  
	                 	<tr class="warning">
	                    	<td>
								<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio3">Proceso3</a>
							</td>
	                   		<td>665</td>
	                    	<td>21.3%</td>
	                    	<td>$16.34</td>
	                  	</tr>
	                  
	                  	<tr class="danger">
	                    	<td>
	                    		<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio4">Proceso4</a>
	                    	</td>
	                    	<td>9516</td>
	                    	<td>89.3%</td>
	                    	<td>$1644.43</td>
	                  	</tr>
	                  
	                  	<tr>
	                   		<td>
	                    		<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio5">Proceso5</a>
		                    </td>
		                    <td>23</td>
		                    <td>34.3%</td>
		                    <td>$23.52</td>
	                  	</tr>
	                  
	                  	<tr>
		                    <td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio6">Proceso6</a>
		                    </td>
		                    <td>421</td>
		                    <td>60.3%</td>
		                    <td>$724.32</td>
	                  	</tr>
	                  
	                  	<tr>
		                    <td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio7">Proceso7</a>
		                    </td>
		                    <td>1233</td>
		                    <td>93.2%</td>
		                    <td>$126.34</td>
	                  	</tr>	                  
	                
	                </tbody>
	                
				</table>
				</div>
				
			</div>
			
		</div>
	
	</div>
	
</div>