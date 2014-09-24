<script type="text/javascript" src="<?=base_url()?>application/modules/catalogo/views/js/operaciones_ajax.js"></script>



<div id="page-wrapper">

	<ol class="breadcrumb">
				<li class="active"><i class="fa fa-book"></i> 
					Cat&#225;logo que contiene todos los Servicios de TI existentes en el Sistema.</li>
				</ol>

	    <?php
		    // Apertura de Formulario
		    $attributes = array('role' => 'form', 'id'=> 'new_service_form','class'=>'form-horizontal');
			echo form_open(base_url().'index.php/catalogo',$attributes); 
	    ?>
	<div class="well col-lg-12" >
		<div class="col-lg-2"> <b> <i class="fa fa-filter"></i> Filtrar Servicios Por: </b> </div>

		
				    
			

		<div class="col-lg-2">

				<b><i class="fa fa-folder-open-o"></i> Categor&#237;a: </b> 

				 <?php
		        	$options = array(
		        		'seleccione' => 'Seleccione',		        	  
	                );
					//$options['-1'] = 'Seleccione un Departamento';
					foreach($servicio_categorias as $servicio_categoria)
		            { 
		              $options[$servicio_categoria->nombre] = $servicio_categoria->nombre;
		            }


		        ?>

		      	 <?php echo form_dropdown('categoria_servicio', $options,$categoria,'class="form-control" id="dropdown_categorias" '); ?>	

	    </div>

	    <div class="col-lg-2">

				<b><i class="fa fa-bars"></i> Tipo: </b> 

				 <?php
		        	$options = array(
		        		'seleccione' => 'Seleccione',		        	  
	                );
					//$options['-1'] = 'Seleccione un Departamento';
					foreach($servicio_tipos as $servicio_tipo)
		            { 
		              $options[$servicio_tipo->nombre] = $servicio_tipo->nombre;
		            }


		        ?>

		      	 <?php echo form_dropdown('tipo_servicio', $options,$tipo,'class="form-control" id="dropdown_tipos" '); ?>	

	    </div>

	      <div class="col-lg-2">

				<b><i class="fa fa-exchange"></i> Proveedor: </b> 

				 <?php
		        	$options = array(
		        		'seleccione' => 'Seleccione',		        	  
	                );
					//$options['-1'] = 'Seleccione un Departamento';
					foreach($proveedores as $proveedor)
		            { 
		              $options[$proveedor->proveedor_id] = $proveedor->nombre;
		            }


		        ?>

		      	 <?php echo form_dropdown('proveedor_servicio', $options,$proveedorr,'class="form-control" id="dropdown_proveedor" '); ?>

	    </div>
		
		<br>
	    <div class="">

	    	<button type="submit" class="btn btn-primary col-lg-1">Filtrar</button>

	    </div>

	    <div class="col-lg-1">

			<a  href="<?php echo base_url('index.php/catalogo');?>" type="button" class="btn btn-default">Resetear</a>

	    </div>

	    <br><br><br>

	    <div class='text-left col-lg-2'>
	    	<br>
	    	Mostrando - <em><?php echo count($servicios); ?> Servicios</em> 
	 
	    </div>

	    <div class='text-right col-lg-10'>
	   
	    <a href="<?php echo base_url('index.php/catalogo/vista_listado');?>" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Lista de Servicios"><i class="fa fa-list-ul fa-2x"></i></a> -
		<a href="<?php echo base_url('index.php/catalogo');?>"  type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Vista de Servicios por Filtros"><i class="fa fa-th fa-2x"></i></a>
			
	    </div>
	    <br><br>
	    <hr>

	</div>
	 <?php echo form_close(); ?>

	<div class="panel panel-primary">
	  <div class="panel-heading text-center" style="font-size:20px;"><b><em>Cat&#225;logo de Servicios</em></b></div>
	  <div class="panel-body">
	    
	    <?php if(count($servicios) > 0) : ?>

	    <br>

	    <?php foreach($servicios as $servicio) : ?>

	       <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
             	<em><b><?php echo $servicio->nombre; ?></b></em>
              </div>
              <div class="panel-body">
              	<table class="table">
              		<img src="<?=base_url().$servicio->ruta_imagen?>" width='80' height='80'  class="img-thumbnail">
              		
              		<thead>
              			 <tr> 
              			<td class="col-lg-4"><b>Categor&#237;a: </b></td>
              			<td class="col-lg-8 text-left">  
		             	  <?php echo $servicio->categoria_servicio;?> 
			            </td>
		            </tr>
              		</thead>

              		<tbody>

		            <tr> 
              			<td class="col-lg-4"><b>Tipo: </b></td>
              			<td class="col-lg-8 text-left">  
		             	  <?php echo $servicio->tipo_servicio;?> 
			            </td>
		            </tr>

		            <tr> 
              			<td class="col-lg-4"><b>Proveedor: </b></td>
              			<td class="col-lg-8 text-left">  
		             	   <?php foreach($proveedores as $proveedor)
							                			{
							                				if($proveedor->proveedor_id == $servicio->proveedor_servicio)
							                				{
							                					echo $proveedor->nombre; 
							                				}
							                			}
							                	   ?> 
			            </td>
		            </tr>

		           

		            <tr> <td></td><td></td></tr>	

		            </tbody>
	            </table>
              </div>

              <div class="panel-footer text-right">
				<a href="<?php echo base_url('index.php/catalogo/vista_negocio/'.$servicio->servicio_id);?>" type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista de Negocio del Servicio"><i class="fa fa-users"></i> Vista de Negocio</a> |

				<a href="<?php echo base_url('index.php/catalogo/vista_tecnica/'.$servicio->servicio_id);?>"  type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista T&#233;cnica del Servicio"><i class="fa fa-wrench"></i> Vista T&#233;cnica</a> |

				<a href="<?php echo base_url('index.php/catalogo/vista_completa/'.$servicio->servicio_id);?>"  type="button" id="cancelar" data-toggle="tooltip" data-placement="top" title="Vista Completa del Servicio"><i class="fa fa-bars"></i> Vista Completa</a>
       		 </div>

            </div>
          </div>

        <?php endforeach ?>


        <?php else : ?>
			<div class="alert alert-info text-center col-md-8 col-md-offset-2" role="alert"><i class="fa fa-exclamation-circle"></i> ¡La busqueda no arrojo resultados!</div>
		<?php endif ?>

      

	  </div>

	</div>


