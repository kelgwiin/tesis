<script type="text/javascript" src="<?=base_url()?>application/modules/catalogo/views/js/operaciones_ajax.js"></script>


<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-folder-open-o"></i> 
					Vista del Cat&#225;logo de Servicios dividido por Categorias de Servicio.</li>
				</ol>

	 
	<div class="panel panel-primary" >
	 <div class="panel-heading text-center" style="font-size:20px;"><b><em>Cat&#225;logo de Servicios por Categorias</em></b></div>
	<div class="panel-body">
	<br>
		<?php if(count($categorias) > 0) : ?>

	    
	    		<div class="text-left">
	    			<a href="<?php echo base_url('index.php/catalogo');?>" type="button" class="btn btn-info"><b> <i class="fa fa-arrow-circle-left"></i> Cat&#225;logo General</b> </a><br><br><br>
	    		</div>
				<table id="dataTables-catalogo" class="table table-hover" >

					<thead>
						<tr>
							<th></th><th></th>

						</tr>
					</thead>

					<tbody>
						<?php foreach($categorias as $categoria) : ?>
						
						<tr >					
							
							<td width="10%"><img src="<?=base_url().$categoria->ruta_imagen?>" width='80' height='80'  class="img-thumbnail"></td>
							
							<td>
								<a  href="<?php echo base_url('index.php/catalogo/listado_servicios/'.$categoria->nombre);?>" ><h5><b><?php echo $categoria->nombre; ?> (<?php echo $num_categorias[$categoria->nombre]; ?>)</b></h5></a>
								<?php echo $categoria->descripcion; ?>
							</td>
							
						</tr>
							
						 <?php endforeach ?>
					</tbody>


				</table>
		
		 

        <?php else : ?>
			<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡No existen categorias en el Sistema!</div>
		<?php endif ?>
	</div>
		
	</div>


