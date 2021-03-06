<script>
	var resourceUse = [], categoriasAux = [], categorias = [], cpu = [], nombres_comandos = [];
	var serviceIndex = 0;
	var dayServiceIndex = 0;
	var hourIndex = 0;
	var catIndex = 0;
	resourceUse = new Array();

	Array.prototype.unique=function(a){
	  return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
	});

	Array.prototype.clean = function(deleteValue) {
	  for (var i = 0; i < this.length; i++) {
	    if (this[i] == deleteValue) {         
	      this.splice(i, 1);
	      i--;
	    }
	  }
	  return this;
	};
</script>
<?php
$serviceId = 0;
$finalIndex = 0;
$contador = 0;
foreach ($resourceUse['resourceUse'] as $resource)
{
	$fechaIndex = 0;
	foreach ($resource as $fecha)
	{
		foreach ($fecha as $dia)
		{
			if(isset($dia[0]) && is_numeric($dia[0]))
			{
				$beforeGraficArray[0][$fechaIndex][$finalIndex] = $dia[0];
				$beforeGraficArray[1][$fechaIndex][$finalIndex] = $dia[1];
				$beforeGraficArray[2][$fechaIndex][$finalIndex] = $dia[2];
				$finalIndex++;
				$fechaIndex++;
				?>
				<script>
				categorias[catIndex] = "<?php echo $dia['hora']; ?>";
				catIndex++;
				categoriasAux= categorias.unique();
				categorias= categoriasAux;
				</script>
				<?php
			}
		}
		$fechaIndex++;
	}
}
$resourceIndex = 0;
foreach ($beforeGraficArray as $beforeGrafic)
{
	?>
	<script>
	resourceUse[serviceIndex] = new Array();
	</script>
	<?php
	foreach($beforeGrafic as $dia)
	{
		$resultado = array_sum($dia);
		?>
		<script>
		resourceUse[serviceIndex][dayServiceIndex] = parseFloat("<?php echo $resultado; ?>");
		dayServiceIndex++;
		</script>
		<?php
	}
	?>
	<script>
	serviceIndex++;
	</script>
	<?php
}
?>
<script>
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


	resourceUse[0].clean(undefined);
	resourceUse[1].clean(undefined);
	resourceUse[2].clean(undefined);

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
        series: [{
            name: 'CPU',
            data: resourceUse[0]
        }, {
            name: 'RAM',
            data: resourceUse[1]
        },{
            name: 'Almacenamiento',
            data: resourceUse[2]
        }]
    });
});
</script>
<div id="page-wrapper">

	<div class="col-lg-12">
    	<h1>Umbrales</h1>
        
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-dashboard"></i> Vista general del rendimiento de cada Servicio en función de los umbrales.</li>
        </ol>
        
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          En este apartado se muestran los distintos Servicios de la Organización. Debe seleccionar el que necesite evaluar para consultar sus umbrales.
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
	                    <th class="header">Nombre del Servicio <i class="fa fa-sort"></i> </th>
	                    <th class="header" style="text-align:center;" >Cantidad de Procesos<i class="fa fa-sort"></i></th>
	                    <th class="header" style="text-align:center;" >Nombre de Procesos Asociados<i class="fa fa-sort"></i></th>
	                  </tr>
	                </thead>
	                
	                <tbody>
	                <?php
	                foreach ($resourceUse['servicios'] as $processRow)
	                {
	                	$servicio_id = $processRow['servicio_id'];
	                	$procesosCorriendo = sizeof($processRow)-2;
	                	?>
		                <tr class="active">
		                	<td>
		                    	<a href="<?php echo base_url(); ?>index.php/Capacidad/Servicios/<?php echo $processRow['servicio_id']; ?>">
		                    		<?php echo $processRow['nombre']; ?>
		                    	</a>
		                    </td>
		                    <td style="text-align:center;" >
		                    	<?php echo $procesosCorriendo; ?>
		                	</td>
							<td style="text-align:center;" >
	                	<?php
	                	$i = 0;
	                	while($i< sizeof($processRow)-2)
	                	{
		                	echo $processRow[$i]." ";
		                	$i++;
	                	}
	                	?>
	                		</td>
	                	</tr>
	                	<?php
		               
	                }
	                ?>
	                
	                </tbody>
	                
				</table>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>