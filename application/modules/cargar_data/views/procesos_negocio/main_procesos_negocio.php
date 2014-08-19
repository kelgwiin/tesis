


<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gesti&#243;n de Procesos de Negocio</h1>
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> 
				</li>
			</ol>
		</div>
	</div>
	
	<?php if($this->session->flashdata('Success')) { ?>
	<div class="alert alert-success text-center" role="alert" id="success">
		<i class="fa fa-check"></i> <b><?php echo $this->session->flashdata('Success');?></b>
	</div>

      <?php }
      ?>
     <div class="alert alert-success text-center" role="alert" id="success2" style="display: none;">
	</div>

	<div class="panel panel-primary">

		<div class="panel-heading">
	   		<h3 class="panel-title"> <i class="fa fa-building-o"></i> Procesos de Negocio</h3>
	  	</div>

	  	<div class="panel-body">



		<a class="btn btn-success" id="nuevo_proceso" href="<?php echo base_url().'index.php/cargar_datos/procesos_de_negocio/crear'?>"> <i class="fa fa-plus"></i>  Agregar Nuevo Proceso de Negocio</a><br><br>
		
		<div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover text-cent" id="dataTables-example">
                                <thead>
                                    <tr >
                                        <th>Nombre <i class="fa fa-sort"></i></th>
                                        <th width="50%">Descripcion <i class="fa fa-sort"></i></th>
                                        <th>Departamento <i class="fa fa-sort"></i></th>
                                        <th>Operaciones <i class="fa fa-sort"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php
                                	foreach($proceso_negocio as $proceso)
		           					 { ?>
		           						<tr id="<?php echo $proceso->procesoneg_id; ?>">
							                <td> <?php echo $proceso->nombre; ?>  </td>
							                <td> <?php 
                                                  if(strlen($proceso->descripcion)> 300)
                                                        {       
                                                                $conntent = substr($proceso->descripcion, 0, 300);
                                                                echo $conntent.' (...)';                                                       
                                                        }
                                                   else
                                                        {
                                                                echo $proceso->descripcion;
                                                       
                                                        }     
							                			//echo $proceso->descripcion; ?> </td>
							                <td>  <?php foreach($departamentos as $departamento)
							                			{
							                				if($proceso->id_departamento == $departamento->departamento_id)
							                				{
							                					echo $departamento->nombre; 
							                				}
							                			}
							                	   ?></td> 
							                <td class="text-center"> <a href="<?php echo base_url().'index.php/cargar_datos/procesos_de_negocio/ver/'.$proceso->procesoneg_id ?>" type="button" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-search"></i></a> 
							                	 <a href="<?php echo base_url().'index.php/cargar_datos/procesos_de_negocio/modificar/'.$proceso->procesoneg_id ?>" type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar"><i class="fa fa-pencil"></i></a>
							                	 <a type="button" class="btn btn-danger btn-xs" onclick="deleteProceso(<?php echo $proceso->procesoneg_id; ?>);" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times"></i></a> </td>
							            </tr>
							         <?php } ?>    
                                </tbody>
                            </table>
                        </div>
		  	</div><!-- Panel body  -->
	</div>


	<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar</b> este Proceso de Negocio?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" id="eliminar_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</div>