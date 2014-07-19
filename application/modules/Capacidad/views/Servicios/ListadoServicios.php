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
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 56.5, 23.3, 18.3, 13.9, 19.6]
        }, {
            name: 'RAM',
            data: [40.2, 20.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 18.6, 12.5]
        }, {
            name: 'Disco',
            data: [10.9, 30.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 49.0, 43.9, 11.0]
        }, {
            name: 'Red',
            data: [31.9, 14.2, 15.7, 18.5, 21.9, 35.2, 19.0, 16.6, 14.2, 10.3, 16.6, 44.8]
        }]
    });
});
</script>
<div id="page-wrapper">

	<div class="col-lg-12">
    	<h1>Servicios</h1>
        
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Vista general del rendimiento de cada Servicio.</li>
        </ol>
        
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          En este apartado se muestran los distintos Servicios de la Organización. Usted deberá seleccionar el que desee evaluar.
        </div>
        
	</div>
	
	<div class="col-lg-12">
		
		<div class="panel panel-info">
			
			<div class="panel-heading">
	       
				<h3 class="panel-title">Consumo General de Recursos Del Sistema Por los Servicios</h3>
	        	
	      	</div>
	      
	      <div class="panel-body">
	    	  <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	      </div>
	      
	    </div>
	
	</div>
	
	<div class="col-lg-12">
		
		<div class="row">

			<div class="col-lg-6">
				
				<h2>Listado de Servicios Del Sistema</h2>
				<div class="table-responsive">
				
				<table class="table table-bordered table-hover table-striped tablesorter">
	                <thead>
	                  <tr>
	                    <th class="header">Nombre <i class="fa fa-sort"></i> </th>
	                    <th class="header">Visits <i class="fa fa-sort"></i></th>
	                    <th class="header">% New Visits <i class="fa fa-sort"></i></th>
	                    <th class="header">Revenue <i class="fa fa-sort"></i></th>
	                  </tr>
	                </thead>
	                
	                <tbody>
	                	<tr class="active">
		                	<td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio1">Servicio1</a> 
		                    </td>
		                    <td>1265</td>
		                    <td>32.3%</td>
		                    <td>$321.33</td>
						</tr>
	                  
						<tr class="success">
							<td>
								<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio2">Servicio2</a>
							</td>
							<td>261</td>
							<td>33.3%</td>
							<td>$234.12</td>
						</tr>
	                  
	                 	<tr class="warning">
	                    	<td>
								<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio3">Servicio3</a>
							</td>
	                   		<td>665</td>
	                    	<td>21.3%</td>
	                    	<td>$16.34</td>
	                  	</tr>
	                  
	                  	<tr class="danger">
	                    	<td>
	                    		<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio4">Servicio4</a>
	                    	</td>
	                    	<td>9516</td>
	                    	<td>89.3%</td>
	                    	<td>$1644.43</td>
	                  	</tr>
	                  
	                  	<tr>
	                   		<td>
	                    		<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio5">Servicio5</a>
		                    </td>
		                    <td>23</td>
		                    <td>34.3%</td>
		                    <td>$23.52</td>
	                  	</tr>
	                  
	                  	<tr>
		                    <td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio6">Servicio6</a>
		                    </td>
		                    <td>421</td>
		                    <td>60.3%</td>
		                    <td>$724.32</td>
	                  	</tr>
	                  
	                  	<tr>
		                    <td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/Servicio7">Servicio7</a>
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