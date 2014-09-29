<script type="text/javascript" src="<?=base_url()?>application/modules/catalogo/views/js/operaciones_ajax.js"></script>


<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-list"></i> 
					 Catálogo que contiene todos los Servicios de TI existentes en el Sistema.</li>
				</ol>



	<div class="panel panel-primary" >
	 <div class="panel-heading text-center" style="font-size:20px;"><b><em>Cat&#225;logo de Servicios</em></b></div>
	<div class="panel-body">
		

		<?php if(count($servicios) > 0) : ?>
		

	    <div class='text-right col-lg-12'>
	   
	    <a href="<?php echo base_url('index.php/catalogo/vista_listado');?>" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista"><i class="fa fa-list-ul fa-2x"></i></a> - 
		<a href="<?php echo base_url('index.php/catalogo');?>"  type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Galeria"><i class="fa fa-th fa-2x"></i></a>
		 <hr>	<br>
	    </div>
		
				<table id="dataTables-catalogo" class="table table-hover" >

					<thead>
						<tr>
							<th></th><th></th><th></th><th></th><th></th><th></th>

						</tr>
					</thead>

					<tbody>
						<?php foreach($servicios as $servicio) : ?>
						
						<tr >					
							
							<td width="10%"><img src="<?=base_url().$servicio->ruta_imagen?>" width='80' height='80'  class="img-thumbnail"></td>
							
							<td width="10%">
								<b>Nombre: </b><br>
								<?php echo $servicio->nombre; ?>
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
								<a href="<?php echo base_url('index.php/catalogo/vista_negocio/'.$servicio->servicio_id);?>" type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista de Negocio del Servicio"><i class="fa fa-users"></i> Vista de Negocio</a> <br>

								<a href="<?php echo base_url('index.php/catalogo/vista_tecnica/'.$servicio->servicio_id);?>"  type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista T&#233;cnica del Servicio"><i class="fa fa-wrench"></i> Vista T&#233;cnica</a> <br>

								<a href="<?php echo base_url('index.php/catalogo/vista_completa/'.$servicio->servicio_id);?>"  type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista Completa del Servicio"><i class="fa fa-bars"></i> Vista Completa</a>
							</td>			
						</tr>
							
						 <?php endforeach ?>
					</tbody>


				</table>
		
		 

        <?php else : ?>
			<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡No existen Servicios en esta Categoria! <a href="<?php echo base_url('index.php/catalogo/por_categorias');?>" type="button" class="btn btn-primary"><b> <i class="fa fa-arrow-circle-left"></i> Volver al Cat&#225;logo por Categor&#237;as </b> </a></div>
		<?php endif ?>
	</div>
		
	</div>


