<!-- Creado el 27-06-2014 por Kelwin Gamez <kelgwiin@gmail.com> -->
<script>
	$(function () {
		$('select#esquema_tiempo').on('change',function(){
			valor = $(this).val();
			if(valor == "MM"){//Mensual
				$('div#div-meses').attr('class','col-md-3 show');
			}else{
				$('div#div-meses').attr('class','col-md-3 hidden');
			}
		});

		//Para procear la llamda ajax
		$('form#fr_modelo_costo').on('submit',function(event){
			event.preventDefault();
			// store reference to the form
			var bk_this = $(this);

			// grab the url from the form element
			var url = bk_this.attr('action');
			    
			//Obteniendo la data del form
			var dataToSend = bk_this.serialize();

			fo_proccess = function(data){
				if(data.estatus == "ok"){
					$('div#msj-vacio').removeClass('show').addClass('hidden');//escondiendo el msj, si estaba
					info = "";
					for (var i = 0; i < data.info.length; i++) {
						it = data.info[i];
						info += "<tr><td>"+(i+1)+"</td>"
						+"<td>" +it.nombre+"</td>" +
						"<td>" +it.mes + "</td>" +
						"<td>" + it.fecha_creacion+ "</td>"+
						"<td>" + it.costo+ "</td> </tr>";
					};
					//Limpiando la información previamente cargada
					$('tbody#info > tr').remove();
					$('tbody#info').append(info);
					//Para indicar a la tabla que se agregó nueva información
					$('table').trigger('update');
				}else{
					$('tbody#info > tr').remove();
					$('div#msj-vacio').removeClass('hidden').addClass('show');//mostrando el msj de error
				}

			}

			//Haciendo la llamada post desde ajax
		    $.post( url, dataToSend, fo_proccess,'json');

		});
	});


</script>
<div id="page-wrapper">
	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Modelo de Costos</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
				Permite ver los costos finacieros de cada Servicio 
				</li>
			</ol>

				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					Se despliegan los costos financieros asociados a los servicios en función de la
				tasa de utilización de los recursos.
				</div>
			</div><!-- end of col-12-->
		</div><!-- end of row Cabecera-->

		<div class = "row">
		<div class = "col-md-12">
			<form id = "fr_modelo_costo" role = "form" 
				method= "post" action = "<?php echo site_url('index.php/Costos/procesar_costeo');?>">
				<fieldset>
					<div class="form-group">
						<div class="col-md-3">
							<input id="anio" name="anio" type="number"
								data-toggle="tooltip"
								data-original-title="Ingresa el año y escoja el esquema de tiempo"
								data-placement = "top"
								
								min = "1900" max = "3000"  placeholder="Ingrese el año"
								class="form-control input-md" required="required">
						</div>

						<div class = "col-md-3">
							<select name="esquema_tiempo" id="esquema_tiempo" class="form-control" 
								required="required"
								data-toggle = "tooltip"
								data-original-title = "Esquema de tiempo"
								data-placement = "top"
								>

								<option value="AA">Anual</option>
								<option value="MM">Mensual</option>
							</select>
						</div>

						<div class = "col-md-3 hidden" id = "div-meses">
							<select name="mes" id="meses" class="form-control" required="required">
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


						<div class = "col-md-3">
							<button 
									type = "submit"
									class="btn btn-primary"
									data-toggle="tooltip"
									data-original-title="Procesar consulta del Modelo de Costo"
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

	<br><br>
	
	<!-- Mensaje de vacío-->
	<div id = "msj-vacio" class="alert alert-warning alert-dismissable hidden">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		No hay elementos registrados.
	</div>


	<!-- Costos por servicio -->
	<div class = "row">
		<div class = "col-md-12">
			<div class="panel panel-primary">
				<!-- Default panel contents -->
				<div class="panel-heading"><strong>Costos por Servicio de TI</strong></div>
				
				<div class = "panel-body">
					Precios de cada Servicio de TI asociado a la organización
				</div>

					<br>
					<div class="table-responsive">
						<table id = "	" class="table table-bordered table-hover table-striped tablesorter">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre <i class = "fa fa-sort"></i></th>
									<th>Mes <i class = "fa fa-sort"></i></th>
									<th>Fecha de creación <i class = "fa fa-sort"></i></th>
									<th>Costo <i class = "fa fa-sort"></i></th>
								</tr>
							</thead>

							<tbody id = "info">
						
							</tbody>
						</table>
					</div>
			
					
			</div>
		</div>
	</div>

</div><!-- /wrapper -->