<script type="text/javascript" src="<?=base_url()?>application/modules/catalogo/views/js/operaciones_ajax.js"></script>


<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-list"></i> 
					Lista de Servicios pertenecientes a la Categoria de Servicio Seleccionada.</li>
				</ol>

	 
	<div class="panel panel-primary" >
	 <div class="panel-heading text-center" style="font-size:20px;"><b>Categoria: <span class="badge" style="font-size:20px;"><em><?php echo $categoria; ?></span></em></b></div>
	<div class="panel-body">
	<br>
		<?php if(count($servicios) > 0) : ?>

	    
	    
				<table id="dataTables-categorias" class="table table-hover" >

					<thead>
						<tr>
							<th></th><th></th><th></th><th></th><th></th><th></th>

						</tr>
					</thead>

					<tbody>
						<?php foreach($servicios as $servicio) : ?>
						
						<tr >					
							
							<td width="10%"><img src="<?=base_url()?>assets/imagenes/servicio/imagen.jpg" width='80' height='80'  class="img-thumbnail"></td>
							
							<td width="10%">
								<b>Nombre: </b><br>
								<?php echo $servicio->descripcion; ?>
							</td>

							<td width="20%">
							     <b>Descripcion: </b><br>
								<?php if(strlen($servicio->descripcion) > 100)
						                    {       
						                        $conntent = substr($servicio->descripcion, 0, 100);
						                         echo $conntent.' (...)';                                                       
						                    }
					                    else
						                    {
						                        echo $servicio->descripcion;
						                                                       
						                    }  ?>

							</td>

							<td width="20%">
								<b>Tipo: </b><br>
								<?php echo $servicio->tipo_servicio; ?>
							</td>

							<td width="20%">
								<b>Proveedor: </b><br>
								<?php foreach($proveedores as $proveedor)
							                			{
							                				if($proveedor->proveedor_id == $servicio->proveedor_servicio)
							                				{
							                					echo $proveedor->nombre; 
							                				}
							                			}
							                	   ?>
							</td>

							<td width="20%">
								<a href="<?php echo base_url('index.php/cargar_datos/servicios');?>" type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista de Negocio del Servicio"><i class="fa fa-users"></i> Vista de Negocio</a> <br>

								<a href="<?php echo base_url('index.php/cargar_datos/servicios');?>"  type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista T&#233;cnica del Servicio"><i class="fa fa-wrench"></i> Vista T&#233;cnica</a> <br>

								<a href="<?php echo base_url('index.php/cargar_datos/servicios');?>"  type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista Completa del Servicio"><i class="fa fa-bars"></i> Vista Completa</a>
							</td>			
						</tr>
							
						 <?php endforeach ?>
					</tbody>


				</table>
		
		 

        <?php else : ?>
			<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡No existen Servicios en esta Categoria!</div>
		<?php endif ?>
	</div>
		
	</div>


