<script>
	var resourceUse = [], categoriasAux = [], categorias = [], cpu = [], nombres_comandos = [];
	var resourceIndex = 0;
	var resourceAux = 0;
	var hourIndex = 0;
</script>
<?php
$resourceIndex = 0;
foreach ($resourceUse as $resource)
{
	$biggerDate = 0;	
	?>
	<script>
	resourceUse[resourceIndex] = new Array();
	var dataIndex = 0;
	if(categorias.length < categoriasAux.length )
	{
		categorias = new Array();
		categorias = categoriasAux;
		resourceAux = categorias.length;
	}
	categoriasAux = new Array();
		
	</script>
	<?php
	$dataIndex = 0;
	$resourceSize = sizeof($resource)-1;
	while ($dataIndex <= $resourceSize)
	{
		$hourIndex = 0;
		$resourceSizeB = sizeof($resource[$dataIndex])-1;
		while ($hourIndex < $resourceSizeB)
		{
			?>
			<script>
				categoriasAux[resourceAux] = "<?php echo $resource[$dataIndex][$hourIndex]['hora']; ?>";
				resourceUse[resourceIndex][hourIndex] = parseInt("<?php echo $resource[$dataIndex][$hourIndex][0]; ?>");
				hourIndex++;
				dataIndex++;
				resourceAux++;
			</script>
			<?php
			$hourIndex++;
		}		
		$dataIndex++; 
	}
	?>
	<script>
		nombres_comandos[resourceIndex]="<?php echo $resource[0]['comando_ejecutable']; ?>";;
		resourceIndex++;
	</script>
	<?php
	$resourceIndex++;
}
?>
<script>
	graficIndex=0;
	beforeGrafic=[];
	while(graficIndex<nombres_comandos.length)
	{
		aux = [];
		cleanIndex = 0;
		resourIndex = 0;
		while(resourIndex<resourceUse[graficIndex].length)
		{
			if(resourceUse[graficIndex][resourIndex]>-1)
			{
				aux[cleanIndex] = resourceUse[graficIndex][resourIndex];
				cleanIndex++;
			}
			resourIndex++;
		}
		beforeGrafic[graficIndex] =
		{
	            name: nombres_comandos[graficIndex],
	            data: aux
	    };
		graficIndex++;
	}
	graficIndex = 0;
	categoriasIndex = 0;
	graficCategories = [];
	while(categoriasIndex<categorias.length)
	{
		if(categorias[categoriasIndex])
		{
			graficCategories[graficIndex] = categorias[categoriasIndex];
			graficIndex++;
		}
		categoriasIndex++;
	}
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
            categories: graficCategories
        },
        yAxis: {
            title: {
                text: 'Porcentaje de Uso'
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
        series: beforeGrafic
    });
});
</script>
<div id="page-wrapper">

	<div class="col-lg-12">
    	<h1>Memoria</h1>
        
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Permite monitorear el porcentaje de uso de memoria RAM. </li>
        </ol>
        
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          En esta sección podemos ver un histórico del consumo de memoria RAM y un listado del porcentaje de uso de cada proceso.
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
				
				<h2>Listado de Procesos consumiendo recursos en Memoria.</h2>
				<div class="table-responsive">
				
				<table class="table table-bordered table-hover table-striped tablesorter">
	                <thead>
	                  <tr>
	                    <th class="header">Nombre del Proceso <i class="fa fa-sort"></i> </th>
	                    <th class="header">Porcentaje de uso <i class="fa fa-sort"></i></th>
	                    <th class="header">Fecha de ejecución<i class="fa fa-sort"></i></th>
	                    <th class="header">Hora<i class="fa fa-sort"></i></th>
	                  </tr>
	                </thead>
	                
	                <tbody>
	                	<tr class="active">
		                	<td>
		                    	Proceso1
		                    </td>
		                    <td>1265</td>
		                    <td>32.3%</td>
		                    <td>$321.33</td>
						</tr>
	                  
						<tr class="success">
							<td>
								Proceso2
							</td>
							<td>261</td>
							<td>33.3%</td>
							<td>$234.12</td>
						</tr>
	                  
	                 	<tr class="warning">
	                    	<td>
								Proceso3
							</td>
	                   		<td>665</td>
	                    	<td>21.3%</td>
	                    	<td>$16.34</td>
	                  	</tr>
	                  
	                  	<tr class="danger">
	                    	<td>
	                    		Proceso4
	                    	</td>
	                    	<td>9516</td>
	                    	<td>89.3%</td>
	                    	<td>$1644.43</td>
	                  	</tr>
	                  
	                  	<tr>
	                   		<td>
	                    		Proceso5
		                    </td>
		                    <td>23</td>
		                    <td>34.3%</td>
		                    <td>$23.52</td>
	                  	</tr>
	                  
	                  	<tr>
		                    <td>
		                    	Proceso6
		                    </td>
		                    <td>421</td>
		                    <td>60.3%</td>
		                    <td>$724.32</td>
	                  	</tr>
	                  
	                  	<tr>
		                    <td>
		                    	Proceso7
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