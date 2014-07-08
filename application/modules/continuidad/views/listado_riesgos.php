<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de riesgos y Amenazas</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-9"></div>
		<div class="col-lg-2" style="left: 71px">
			<a href="<?php echo base_url() ?>index.php/continuidad/gestion_riesgos/riesgos/crear" class="btn btn-success">
				<i class="fa fa-plus"></i> Agregar nuevo riesgo</a>
		</div>
	</div>
	
	<div class="row" style="margin-top: 25px">
		<div class="col-lg-12">
			<div class="table-responsive">
	            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
	                <thead>
	                    <tr>
	                        <th>Denominación <i class="fa fa-sort"></i></th>
	                        <th>Categoría <i class="fa fa-sort"></i></th>
	                        <th>Probabilidad <i class="fa fa-sort"></i></th>
                        	<th>Eliminar <i class="fa fa-sort"></i></th>
	                    </tr>
	                </thead>
	                <tbody>
	                	<tr>
	                		<td><a>Inundaciones</a></td>
	                		<td>Desastres naturales</td>
	                		<td>56%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Humos / Gases tóxicos</a></td>
	                		<td>Daños accidentales</td>
	                		<td>47%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Fallo del UPS</a></td>
	                		<td>Daños accidentales</td>
	                		<td>87%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Incendios</a></td>
	                		<td>Desastres naturales</td>
	                		<td>68%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Explosivos</a></td>
	                		<td>Ataques intencionados externos</td>
	                		<td>57%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Huracanes</a></td>
	                		<td>Desastres naturales</td>
	                		<td>0%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Actos de vandalismo</a></td>
	                		<td>Ataques intencionados externos</td>
	                		<td>51%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                	<tr>
	                		<td><a>Manipulación de datos</a></td>
	                		<td>Ataques intencionados internos</td>
	                		<td>47%</td>
	                		<td><a><span class="label label-danger">X</span></a></td>
	                	</tr>
	                </tbody>
				</table>
			</div>
		</div>
	</div>
</div>