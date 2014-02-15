<div id = "page-wrapper">
	<!-- Breadcrumbs-->
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<ol class="breadcrumb">
				<li><a href="">Inicio</a></li>
				<li><a href="cargar_data/componentes_ti">Componentes de TI</a></li>
				<li><a href="cargar_data/componentes_ti/nuevo">Nuevo</a></li>
			</ol>
		</div><!-- end of: col breadcrumbs-->
	</div> <!-- end of: row breadcrumbs-->

	<h2>Nuevo Componente de TI</h2>
	<hr>
	
	<form action="cargar_data/componentes_ti/guardar" method="POST" role="form">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<!-- Nombre-->
				<div class="form-group">
					<label for="nombre" class="col-md-2 col-lg-2 control-label">Nombre: </label>

					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
						<input type="text" class="form-control" id="nombre" placeholder="Nombre del componente">	
					</div>

				</div><!-- end of: nombre form-group-->
			</div><!-- end of: col-6-->

			<!-- Categoría-->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
					<label for="categoria" class="col-md-2 col-lg-2 control-label">Categoría:</label>
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
						<select name="categoria" id="input" class="form-control">
							<option value=""> Seleccione</option>
							<option value = "cat1">Categoría 1</option>
							<option value = "cat1">Categoría 1</option>
							<option value = "cat1">Categoría 1</option>
							<option value = "cat1">Categoría 1</option>
						</select>
					</div><!-- end of: col-10-->	

				</div><!-- end of: Categoría form-group-->
			</div><!-- end of: col-6-->
			
		</div><!-- end of: row, con  nombre y categoría-->
		
		<!-- Campos del componente de TI-->
		<!-- Campos en la BD
			- fecha_compra
			- fecha_creacion
			- tiempo_vida
			- unidad_tiempo
			- precio
			- capacidad
			- cantidad
			- activa
			- unidad_medida (de capacidad)
			- abrev_unidad_medida (2) -->

		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<hr>
				<h4> Campos: </h4>
			<hr>
			</div>
		</div>

		<div class="row">
			<!-- Fecha de creación-->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
					<label for="fecha_creacion" class="col-md-4 col-lg-4 control-label">Fecha de creación: </label>

					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<input name = "fecha_creacion" type="text" class="form-control" id="fecha_creacion" placeholder="dd/mm/aa">	
					</div>
				</div><!-- end of: form-group-->
			</div><!-- end of: col-6-->

			<!-- Fecha de compra-->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
					<label for="fecha_compra" class="col-md-4 col-lg-4 control-label">Fecha de compra: </label>

					<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
						<input name = "fecha_compra" type="text" class="form-control" id="fecha_compra" placeholder="dd/mm/aa">	
					</div>
				</div><!-- end of: form-group-->
			</div>
		</div>

		<br>

		<div class="row">
			<!-- tiempo de vida -->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<label for="tiempo_vida" class="col-md-4 col-lg-4 control-label">Tiempo de vida: </label>

					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<input name = "tiempo_vida" type="text" class="form-control" id="tiempo_vida" placeholder="">	
					</div>
			</div><!-- end of: col-6 -->

			<!-- Unidad  de medida (tipo de inventario)-->
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<label for="tiempo_vida" class="col-md-4 col-lg-4 control-label">Unidad de tiempo de vida: </label>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<select name="unidad_medida" id="input" class="form-control">
							<option value=""> Seleccione</option>
							<option value = "dd">Día</option>
							<option value = "mm">Mes</option>
							<option value = "aa">Año</option>
						</select>
				</div>
			</div><!-- end of: col-6 -->
		</div><!-- end of: row -->

		
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				
			</div><!-- end of: col-6 -->

			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				
			</div><!-- end of: col-6 -->
		</div><!-- end of: row -->

		<!-- Boton Guardar-->
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
				<button type="submit" class="btn btn-primary">Guardar</button>
			</div>

			<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
				
			</div>
		</div>
	</form>

