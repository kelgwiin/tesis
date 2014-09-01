<div id="page-wrapper">


	

	<!-- Cabecera de la descripción-->
	<div class = "row">
		<div class="col-lg-12">
			<h1>Cargar Infraestructura</h1>

			<ol class="breadcrumb">
				<li class="active"><i class="fa fa-dashboard"></i> 
					Carga de los componentes de tecnología de primaryrmación (TI) de la organización.</li>
				</ol>

	<?php if($this->session->flashdata('Success')) { ?>
	<div class="alert alert-success text-center" role="alert" id="success">
		<i class="fa fa-check"></i> <b><?php echo $this->session->flashdata('Success');?></b>
	</div>

      <?php }
      ?>
     <div class="alert alert-success text-center" role="alert" id="success2" style="display: none;">
	</div>


	<div class="row col-lg-12 text-left">

                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_categorias');?>" type="button" class="btn btn-primary"><h5><b> <i class="fa fa-folder-open-o"></i> Gestion de Categor&#237;as </b></h5> </a>

                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_tipos');?>" type="button" class="btn btn-primary"><h5><b> <i class="fa fa-bars"></i> Gestion de Tipos </b></h5> </a>

                    <a href="<?php echo base_url('index.php/cargar_datos/servicio_proveedores');?>" type="button" class="btn btn-primary"><h5><b> <i class="fa fa-exchange"></i> Gestion de Proveedores </b></h5> </a>

                    <a type="button" class="btn btn-primary"><h5><b> <i class="fa fa-clock-o"></i> Gestion de Umbrales </b></h5> </a>

                     <a type="button" class="btn btn-primary"><h5><b> <i class="fa fa-cogs"></i> Gestion de Procesos </b></h5> </a>

                     <a type="button" class="btn btn-primary"><h5><b> <i class="fa fa-cog"></i> Gestion de Tareas </b></h5> </a>
    </div><br>

	<div class="panel panel-primary">

		<div class="panel-heading">
	   		<h3 class="panel-title"> <i class="fa fa-list"></i> Servicios</h3>
	  	</div>

	  	<div class="panel-body">



		<a class="btn btn-success" id="nuevo_proceso" href="<?php echo base_url().'index.php/cargar_datos/servicio/crear'?>"> <i class="fa fa-plus"></i>  Agregar Nuevo Servicio</a><br><br>
		
		<div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTables-proceso">
                              
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

	<div class="modal fade" id="eliminar_todos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		      
		      </div>
		      <div class="modal-body text-center">
		        <p><div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-triangle"></i> ¿Est&#225; seguro que desea <b>Eliminar TODOS</b> los Proceso de Negocio Seleccionados?</div></p>
		      </div>
		      <div class="modal-footer">
		      	<button  id="eliminarselect_confirm" class="btn btn-danger">Eliminar</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>      
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
</div><!-- end of page-wrapper-->