<div class="col-lg-12">
		
		<div class="row">

			<div class="col-lg-6">
				
				<h2>Listado de Servicios del Sistema</h2>
				<div class="table-responsive">
				
				<table class="table table-bordered table-hover table-striped tablesorter">
	                <thead>
	                  <tr>
	                    <th class="header">Nombre <i class="fa fa-sort"></i> </th>
	                    <th class="header">Fecha Creación <i class="fa fa-sort"></i></th>
	                    <th class="header">Cantidad Ingresos <i class="fa fa-sort"></i></th>
	                  </tr>
	                </thead>
	              <tbody> 
	             		<?php $long=$this->disponibilidad_model->obtenerlongitudServicios(); ?>	                	
	                	<?php $servicios=$this->disponibilidad_model->obtenernombreServicios(); ?>
	                	<?php $ids=$this->disponibilidad_model->obteneridServicios(); ?>
	                	<?php $fechacreacion=$this->disponibilidad_model->obtenerfechacreacionServicios(); ?>
	                	<?php $cantidadingresos=$this->disponibilidad_model->obtenercantidadingresosServicios(); ?>
	                	<?php
	                	$i=1;
	                	while($i<=$long){ ?>	                		
	                		<tr class="active">
		                	<td>		                		                		
		                    	<a href="<?php echo base_url(); ?>index.php/Disponibilidad/ImprimirIncidencia/<?php echo $ids[$i]; ?>"><?php echo $servicios[$i]; ?></a>
		                    </td>
		                    <td><?php echo $fechacreacion[$i]; ?></td>
		                    <td><?php echo $cantidadingresos[$i]; ?></td>
						</tr>
	                	<?php $i=$i+1;
	                	 } ?>
	                
	                </tbody>	                
				</table>
				</div>
				
			</div>
			
		</div>
		
	</div>
			<div class="col-lg-3">
	            <div class="panel panel-info">
	              <div class="panel-heading">
	                <div class="row">
	                  <div class="col-xs-6">
	                    <i class="fa fa-flag fa-5x"></i>
	                  </div>
	                  <div class="col-xs-6 text-center">
	                    <p class="announcement-text">Modulo de Disponibilidad</p>
	                  </div>
	                </div>
	              </div>
	               <a href="<?php echo base_url(); ?>index.php/Disponibilidad/">
	                <div class="panel-footer announcement-bottom">
	                  <div class="row">
	                    <div class="col-xs-6">
	                      Regresar
	                    </div>
	                    <div class="col-xs-6 text-right">
	                      <i class="fa fa-arrow-circle-left"></i>
	                    </div>
	                  </div>
	                </div>
	              </a>
	            </div>
	          </div>	
</div>