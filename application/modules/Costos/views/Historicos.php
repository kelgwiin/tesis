<!-- Creado el 27-06-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<script>
	$(function() {
		//Evolución de las inversiones hechas en componentes de TI
		$('form#fr_evol_comp_ti').on('submit',function(event){
		    event.preventDefault();
		    // store reference to the form
		    var bk_this = $(this);

		    // grab the url from the form element
		    var url = bk_this.attr('action');
		        
		    //Obteniendo la data del form
		    var dataToSend = bk_this.serialize();

		    fo_proccess = function(data){
		    	if(data.estatus == "ok"){
		    		$('div#msj_comp_ti').attr('class','alert alert-danger alert-dismissable hidden');
		    		
		    		//Inicializando los costos
		    		var costos;
		    		costos = new Array();
		    		for (var i = 1; i <= 12; i++) {
		    			costos.push(0);	
		    		}

		    		for (var j = 0; j < data.data.length; j++) {
		    			mes = data.data[j]['month'];
		    			mes = parseInt(mes-1);
		    			costos[mes] = data.data[j]['monto'];
		    		}

		    		$('div#comp_ti').highcharts({
		    		    title: {
		    		        text: 'Montos invertidos en componentes de TI',
		    		        x: -20 //center
		    		    },
		    		    subtitle: {
		    		        text: 'Incluye los costos indirectos, los cuales fueron prorrateados',
		    		        x: -20
		    		    },
		    		    xAxis: {
		    		        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
		    		            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
		    		    },
		    		    yAxis: {
		    		        title: {
		    		            text: 'Moneda: ' + $('label#moneda').attr('data-moneda')
		    		        },
		    		        plotLines: [{
		    		            value: 0,
		    		            width: 1,
		    		            color: '#808080'
		    		        }]
		    		    },
		    		    tooltip: {
		    		        valueSuffix: $('label#moneda').attr('data-abrev')
		    		    },
		    		    legend: {
		    		        layout: 'vertical',
		    		        align: 'right',
		    		        verticalAlign: 'middle',
		    		        borderWidth: 0
		    		    },
		    		    series: [{
		    		        name: 'Inversión Anual',
		    		        data: costos
		    		    }]
		    		});


		    	}else{
		    		$('div#msj_comp_ti').attr('class','alert alert-danger alert-dismissable show');
		    	}
		    }
		    //Haciendo la llamada post desde ajax
	        $.post( url, dataToSend, fo_proccess,'json');
		});

	});
	

</script>

<?php 
	printf('<label class = "sr-only" id = "moneda" data-moneda="%s" data-abrev = "%s"></label>',$org['moneda'],$org['abrev_moneda']);
?>
<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Históricos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
				Permite apreciar la evolución histórica de los <strong>modelos de costos</strong> y las
				<strong>inversiones</strong> componentes de TI.
				</li>
				</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Permite la visualización gráfica de la evolución histórica de los modelos de costos asociados a 
					los servicios y a las inversiones hechas en tecnología de información (TI).
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->


	<h2>Evolución del Modelo de Costos General</h2>
	<div class = "row">
		<div class = "col-md-12">
			<form id = "fr_evol_modelo_costo" role = "form" 
				method= "post" action = "<?php echo site_url('index.php/Costos/Historicos/evol_modelo_costo');?>">
				<fieldset>
					<div class="form-group">
						<div class = "col-md-3">
							<select name="mes" id="meses" class="form-control" required="required"
								data-toggle="tooltip"
								data-original-title="Seleccione un mes"
								data-placement = "top"

							>
								<option value = "1">Enero</option>
								<option value = "2">Febrero</option>
								<option value = "3">Marzo</option>
								<option value = "4">Abril</option>
								<option value = "5">Mayo</option>
								<option value = "6">Junio</option>
								<option value = "7">Julio</option>
								<option value = "8">Agosto</option>
								<option value = "9">Septiembre</option>
								<option value = "10">Octubre</option>
								<option value = "11">Noviembre</option>
								<option value = "12">Diciembre</option>
							</select>
						</div>

						<div class="col-md-3">
							<input id="anio_modelo_c" name="anio_modelo_c" type="number"
								data-toggle="tooltip"
								data-original-title="Ingresa el año y presiona procesar para generar las gráficas del modelo de costo"
								data-placement = "top"
								
								min = "1900" max = "3000"  placeholder="Ingrese el año"
								class="form-control input-md" required="required">
						</div>
						

						<div class = "col-md-6">
							<button 
									type = "submit"
									class="btn btn-primary"
									data-toggle="tooltip"
									data-original-title="Procesar consulta"
									data-placement = "right"
									id = "btn-procesar-comp-ti">
								<i class = "fa fa-cog" ></i> Procesar
							</button>
						</div>

					</div>
				</fieldset>
			</form>		
		</div><!-- /col-md-12 -->
	</div><!-- /row -->
	<br>
	<div class = "row">
		<div class = "col-md-12">
			<!-- Mensaje informativo -->
			<div class="alert alert-danger alert-dismissable hidden" id = "msj_modelo_costo">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				No hay datos registrados para el año seleccionado.
			</div>

			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Gráficas de la evolución del modelo de costos por servicio</h3>
				  </div>
				  <div class="panel-body" id = "modelo_costo">
						<span class = "text-info">
						</span>
				  </div>
			</div>
		</div>
	</div>


	<h2>Evolución de las Inversiones en Componentes de TI</h2>
	<div class = "row">
		<div class = "col-md-12">
			<form id = "fr_evol_comp_ti" role = "form" 
				method= "post" action = "<?php echo site_url('index.php/Costos/Historicos/evol_comp_ti');?>">
				<fieldset>
					<div class="form-group">
						<div class="col-md-3">
							<input id="anio_comp_ti" name="anio_comp_ti" type="number"
								data-toggle="tooltip"
								data-original-title="Ingresa el año y presiona procesar para generar las gráficas"
								data-placement = "top"
								
								min = "1900" max = "3000"  placeholder="Ingrese el año"
								class="form-control input-md" required="required">
						</div>

						<div class = "col-md-6">
							<button 
									type = "submit"
									class="btn btn-primary"
									data-toggle="tooltip"
									data-original-title="Procesar consulta"
									data-placement = "right"
									id = "btn-procesar-comp-ti">
								<i class = "fa fa-cog" ></i> Procesar
							</button>
						</div>

						<div class = "col-md-3"></div><!-- Vacío-->
					</div>
				</fieldset>
			</form>		
		</div><!-- /col-md-12 -->
	</div><!-- /row -->
	
	<br>

	<div class = "row">
		<div class = "col-md-12">
			<!-- Mensaje informativo -->
			<div class="alert alert-danger alert-dismissable hidden" id = "msj_comp_ti">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				No hay datos registrados para el año seleccionado.
			</div>

			<div class="panel panel-info">
				  <div class="panel-heading">
						<h3 class="panel-title">Gráficas de las inversiones hechas en componentes de TI</h3>
				  </div>
				  <div class="panel-body" id = "comp_ti">
						<span class = "text-info">
						</span>
				  </div>
			</div>
		</div>
	</div>

</div><!-- /wrapper -->