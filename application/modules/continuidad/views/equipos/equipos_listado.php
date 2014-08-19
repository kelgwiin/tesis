<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Gestión de Continuidad del Negocio</h1>
			<?php echo $breadcrumbs ?>
			<h3>Listado de equipos de desarrollo</h3>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<?php 
				if($this->session->flashdata('alert_success')) print_alert($this->session->flashdata('alert_success'));
				if($this->session->flashdata('alert_error')) print_alert($this->session->flashdata('alert_error'),'danger');
			?>
		</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Equipos de desarrollo para las distintas fases del Plan de Continuidad del Negocio</h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<!-- COMITES DE CRISIS -->
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-green">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-warning fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                            	<div>Comités de</div>
	                                <div class="mid-huge">Crisis</div>
	                                
	                            </div>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
	                    	<a href="#" class="toggledetails">
		                        <span class="pull-left">Mostrar detalles</span>
		                        <span class="pull-left" style="display: none">Ocultar detalles</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-up" style="display: none"></i></span>
	                        </a>
	                        <div class="clearfix" style="margin-top: 25px"></div>
	                        <div class="equipos hidden">
	                        	<hr />
	                        	<blockquote><span><small><em><?php echo lang('comite.crisis') ?></em></small></span></blockquote>
	                        	<div class="row" style="margin-top: 25px; margin-bottom: 25px">
		                        	<div class="col-md-4 col-md-push-11">
		                        		<a class="btn btn-success" href="<?php echo site_url('index.php/continuidad/equipos/crear/crisis') ?>"
		                        			data-toggle="tooltip" data-placement="top" data-original-title="Agregar un nuevo comité de crisis">
		                        			<i class="fa fa-plus" style="color: white"></i>
		                        		</a>
		                        	</div>
	                        	</div>
	                        	<?php if(isset($crisis) && !empty($crisis)) : ?>
		                        	<ul>
		                        		<?php foreach($crisis as $key => $cri) : ?>
			                        		<li style="font-size: 12px">
			                        			<strong><?php echo ucfirst($cri->nombre_equipo) ?>:&nbsp;&nbsp;</strong>
			                        			<?php foreach($cri->equipo as $k => $team) : ?>
			                        				<?php echo ($k == 0) ? $team->nombre : '- '.$team->nombre ?>
			                        			<?php endforeach ?>
			                        			<span class="pull-right">
			                        				<a data-toggle="modal" data-target="#eliminarcrisis<?php echo $cri->id_equipo ?>">
			                        					<i data-toggle="tooltip" data-placement="top"
			                        						data-original-title="Eliminar equipo <?php echo ucfirst($cri->nombre_equipo) ?>"
			                        						class="fa fa-times fa-lg" style="color: #FE2E2E">
			                        					</i>
			                        				</a>
			                        			</span>
		                        			</li>
		                        			<div class="modal fade" id="eliminarcrisis<?php echo $cri->id_equipo ?>"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Eliminar comité de crisis</h4>
														</div>
														<div class="modal-body">
															¿Está seguro de que desea eliminar el equipo <?php echo ucfirst($cri->nombre_equipo) ?>?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
															<a type="button" class="btn btn-danger" style="color: white"
																href="<?php echo site_url('index.php/continuidad/equipos/eliminar/'.$cri->id_equipo) ?>">
																Eliminar
															</a>
														</div>
													</div>
												</div>
											</div>
	                        			<?php endforeach ?>
		                        	</ul>
		                        <?php else : ?>
		                        	<div class="row" style="margin-top: 25px">
		                        		<div class="col-md-12">
		                        			<?php print_alert('Aún no se han creado comités de crisis','danger') ?>
		                        		</div>
		                        	</div>
		                        <?php endif ?>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2"></div>
				
				<!-- EQUIPOS DE RECUPERACION -->
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-green">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-arrow-up fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                            	<div>Equipos de</div>
	                                <div class="mid-huge">Recuperación</div>
	                                
	                            </div>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
	                    	<a href="#" class="toggledetails">
	                            <span class="pull-left">Mostrar detalles</span>
		                        <span class="pull-left" style="display: none">Ocultar detalles</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-up" style="display: none"></i></span>
	                        </a>
	                        <div class="clearfix"></div>
	                        <div class="equipos hidden">
	                        	<hr />
	                        	<blockquote><span><small><em><?php echo lang('comite.recuperacion') ?></em></small></span></blockquote>
	                        	<div class="row" style="margin-top: 25px; margin-bottom: 25px">
		                        	<div class="col-md-4 col-md-push-11">
		                        		<a class="btn btn-success" href="<?php echo site_url('index.php/continuidad/equipos/crear/recuperacion') ?>"
		                        			data-toggle="tooltip" data-placement="top" data-original-title="Agregar un nuevo equipo de recuperación">
		                        			<i class="fa fa-plus" style="color: white"></i>
		                        		</a>
		                        	</div>
	                        	</div>
	                        	<?php if(isset($recuperacion) && !empty($recuperacion)) : ?>
		                        	<ul>
		                        		<?php foreach($recuperacion as $key => $recup) : ?>
			                        		<li style="font-size: 12px">
			                        			<strong><?php echo ucfirst($recup->nombre_equipo) ?>:&nbsp;&nbsp;</strong>
			                        			<?php foreach($recup->equipo as $k => $team) : ?>
			                        				<?php echo ($k == 0) ? $team->nombre : '- '.$team->nombre ?>
			                        			<?php endforeach ?>
			                        			<span class="pull-right">
			                        				<a data-toggle="modal" data-target="#eliminarrecuperacion<?php echo $recup->id_equipo ?>">
			                        					<i data-toggle="tooltip" data-placement="top"
			                        						data-original-title="Eliminar equipo <?php echo ucfirst($recup->nombre_equipo) ?>"
			                        						class="fa fa-times fa-lg" style="color: #FE2E2E">
			                        					</i>
			                        				</a>
			                        			</span>
		                        			</li>
		                        			<div class="modal fade" id="eliminarrecuperacion<?php echo $recup->id_equipo ?>"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Eliminar equipo de recuperación</h4>
														</div>
														<div class="modal-body">
															¿Está seguro de que desea eliminar el equipo <?php echo ucfirst($recup->nombre_equipo) ?>?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
															<a type="button" class="btn btn-danger" style="color: white"
																href="<?php echo site_url('index.php/continuidad/equipos/eliminar/'.$recup->id_equipo) ?>">
																Eliminar
															</a>
														</div>
													</div>
												</div>
											</div>
	                        			<?php endforeach ?>
		                        	</ul>
		                        <?php else : ?>
		                        	<div class="row" style="margin-top: 25px">
		                        		<div class="col-md-12">
		                        			<?php print_alert('Aún no se han creado equipos de recuperación','danger') ?>
		                        		</div>
		                        	</div>
		                        <?php endif ?>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2"></div>
				
				<!-- EQUIPOS DE LOGISTICA -->
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-green">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-sort fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                            	<div>Equipos de</div>
	                                <div class="mid-huge">Logística</div>
	                                
	                            </div>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
	                    	<a href="#" class="toggledetails">
	                            <span class="pull-left">Mostrar detalles</span>
		                        <span class="pull-left" style="display: none">Ocultar detalles</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-up" style="display: none"></i></span>
	                        </a>
	                        <div class="clearfix"></div>
	                        <div class="equipos hidden">
	                        	<hr />
	                        	<blockquote><span><small><em><?php echo lang('comite.logistica') ?></em></small></span></blockquote>
	                        	<div class="row" style="margin-top: 25px; margin-bottom: 25px">
		                        	<div class="col-md-4 col-md-push-11">
		                        		<a class="btn btn-success" href="<?php echo site_url('index.php/continuidad/equipos/crear/logistica') ?>"
		                        			data-toggle="tooltip" data-placement="top" data-original-title="Agregar un nuevo equipo de logística">
		                        			<i class="fa fa-plus" style="color: white"></i>
		                        		</a>
		                        	</div>
	                        	</div>
	                        	<?php if(isset($logistica) && !empty($logistica)) : ?>
		                        	<ul>
		                        		<?php foreach($logistica as $key => $log) : ?>
			                        		<li style="font-size: 12px">
			                        			<strong><?php echo ucfirst($log->nombre_equipo) ?>:&nbsp;&nbsp;</strong>
			                        			<?php foreach($log->equipo as $k => $team) : ?>
			                        				<?php echo ($k == 0) ? $team->nombre : '- '.$team->nombre ?>
			                        			<?php endforeach ?>
			                        			<span class="pull-right">
			                        				<a data-toggle="modal" data-target="#eliminarlogistica<?php echo $log->id_equipo ?>">
			                        					<i data-toggle="tooltip" data-placement="top"
			                        						data-original-title="Eliminar equipo <?php echo ucfirst($log->nombre_equipo) ?>"
			                        						class="fa fa-times fa-lg" style="color: #FE2E2E">
			                        					</i>
			                        				</a>
			                        			</span>
		                        			</li>
		                        			<div class="modal fade" id="eliminarlogistica<?php echo $log->id_equipo ?>"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Eliminar equipo de logística</h4>
														</div>
														<div class="modal-body">
															¿Está seguro de que desea eliminar el equipo <?php echo ucfirst($log->nombre_equipo) ?>?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
															<a type="button" class="btn btn-danger" style="color: white"
																href="<?php echo site_url('index.php/continuidad/equipos/eliminar/'.$log->id_equipo) ?>">
																Eliminar
															</a>
														</div>
													</div>
												</div>
											</div>
	                        			<?php endforeach ?>
		                        	</ul>
		                        <?php else : ?>
		                        	<div class="row" style="margin-top: 25px">
		                        		<div class="col-md-12">
		                        			<?php print_alert('Aún no se han creado equipos de logística','danger') ?>
		                        		</div>
		                        	</div>
		                        <?php endif ?>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2"></div>
				
				<!-- EQUIPOS DE RRPP -->
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-green">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-user fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                            	<div>Equipos de</div>
	                                <div class="mid-huge">RRPP</div>
	                                
	                            </div>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
	                    	<a href="#" class="toggledetails">
	                            <span class="pull-left">Mostrar detalles</span>
		                        <span class="pull-left" style="display: none">Ocultar detalles</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-up" style="display: none"></i></span>
	                        </a>
	                        <div class="clearfix"></div>
	                        <div class="equipos hidden">
	                        	<hr />
	                        	<blockquote><span><small><em><?php echo lang('comite.rrpp') ?></em></small></span></blockquote>
	                        	<div class="row" style="margin-top: 25px; margin-bottom: 25px">
		                        	<div class="col-md-4 col-md-push-11">
		                        		<a class="btn btn-success" href="<?php echo site_url('index.php/continuidad/equipos/crear/rrpp') ?>"
		                        			data-toggle="tooltip" data-placement="top" data-original-title="Agregar un nuevo equipo de relaciones públicas">
		                        			<i class="fa fa-plus" style="color: white"></i>
		                        		</a>
		                        	</div>
	                        	</div>
	                        	<?php if(isset($rrpp) && !empty($rrpp)) : ?>
		                        	<ul>
		                        		<?php foreach($rrpp as $key => $rp) : ?>
			                        		<li style="font-size: 12px">
			                        			<strong><?php echo ucfirst($rp->nombre_equipo) ?>:&nbsp;&nbsp;</strong>
			                        			<?php foreach($rp->equipo as $k => $team) : ?>
			                        				<?php echo ($k == 0) ? $team->nombre : '- '.$team->nombre ?>
			                        			<?php endforeach ?>
			                        			<span class="pull-right">
			                        				<a data-toggle="modal" data-target="#eliminarrrpp<?php echo $rp->id_equipo ?>">
			                        					<i data-toggle="tooltip" data-placement="top"
			                        						data-original-title="Eliminar equipo <?php echo ucfirst($rp->nombre_equipo) ?>"
			                        						class="fa fa-times fa-lg" style="color: #FE2E2E">
			                        					</i>
			                        				</a>
			                        			</span>
		                        			</li>
		                        			<div class="modal fade" id="eliminarrrpp<?php echo $rp->id_equipo ?>"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Eliminar equipo de relaciones públicas</h4>
														</div>
														<div class="modal-body">
															¿Está seguro de que desea eliminar el equipo <?php echo ucfirst($rp->nombre_equipo) ?>?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
															<a type="button" class="btn btn-danger" style="color: white"
																href="<?php echo site_url('index.php/continuidad/equipos/eliminar/'.$rp->id_equipo) ?>">
																Eliminar
															</a>
														</div>
													</div>
												</div>
											</div>
	                        			<?php endforeach ?>
		                        	</ul>
		                        <?php else : ?>
		                        	<div class="row" style="margin-top: 25px">
		                        		<div class="col-md-12">
		                        			<?php print_alert('Aún no se han creado equipos de relaciones públicas','danger') ?>
		                        		</div>
		                        	</div>
		                        <?php endif ?>
	                        </div>
	                    </div>
	                </div>
				</div>
				<div class="col-md-2"></div>
				
				<!-- EQUIPOS DE UNIDADES DE NEGOCIO -->
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-green">
	                    <div class="panel-heading">
	                        <div class="row">
	                            <div class="col-xs-3">
	                                <i class="fa fa-tasks fa-5x"></i>
	                            </div>
	                            <div class="col-xs-9 text-right">
	                            	<div>Equipos de</div>
	                                <div class="mid-huge">Pruebas</div>
	                                
	                            </div>
	                        </div>
	                    </div>
	                    <div class="panel-footer">
	                    	<a href="#" class="toggledetails">
	                            <span class="pull-left">Mostrar detalles</span>
		                        <span class="pull-left" style="display: none">Ocultar detalles</span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-down"></i></span>
		                        <span class="pull-right"><i class="fa fa-arrow-circle-up" style="display: none"></i></span>
	                        </a>
	                        <div class="clearfix"></div>
	                        <div class="equipos hidden">
	                        	<hr />
	                        	<blockquote><span><small><em><?php echo lang('comite.pruebas') ?></em></small></span></blockquote>
	                        	<div class="row" style="margin-top: 25px; margin-bottom: 25px">
		                        	<div class="col-md-4 col-md-push-11">
		                        		<a class="btn btn-success" href="<?php echo site_url('index.php/continuidad/equipos/crear/pruebas') ?>"
		                        			data-toggle="tooltip" data-placement="top" data-original-title="Agregar un nuevo equipo de pruebas">
		                        			<i class="fa fa-plus" style="color: white"></i>
		                        		</a>
		                        	</div>
	                        	</div>
	                        	<?php if(isset($pruebas) && !empty($pruebas)) : ?>
		                        	<ul>
		                        		<?php foreach($pruebas as $key => $prueba) : ?>
			                        		<li style="font-size: 12px">
			                        			<strong><?php echo ucfirst($prueba->nombre_equipo) ?>:&nbsp;&nbsp;</strong>
			                        			<?php foreach($prueba->equipo as $k => $team) : ?>
			                        				<?php echo ($k == 0) ? $team->nombre : '- '.$team->nombre ?>
			                        			<?php endforeach ?>
			                        			<span class="pull-right">
			                        				<a data-toggle="modal" data-target="#eliminarprueba<?php echo $prueba->id_equipo ?>">
			                        					<i data-toggle="tooltip" data-placement="top"
			                        						data-original-title="Eliminar equipo <?php echo ucfirst($prueba->nombre_equipo) ?>"
			                        						class="fa fa-times fa-lg" style="color: #FE2E2E">
			                        					</i>
			                        				</a>
			                        			</span>
		                        			</li>
		                        			<!-- Modal -->
											<div class="modal fade" id="eliminarprueba<?php echo $prueba->id_equipo ?>"
												tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
															</button>
															<h4 class="modal-title" id="myModalLabel">Eliminar equipo de pruebas</h4>
														</div>
														<div class="modal-body">
															¿Está seguro de que desea eliminar el equipo <?php echo ucfirst($prueba->nombre_equipo) ?>?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Atras</button>
															<a type="button" class="btn btn-danger" style="color: white"
																href="<?php echo site_url('index.php/continuidad/equipos/eliminar/'.$prueba->id_equipo) ?>">
																Eliminar
															</a>
														</div>
													</div>
												</div>
											</div>
	                        			<?php endforeach ?>
		                        	</ul>
		                        <?php else : ?>
		                        	<div class="row" style="margin-top: 25px">
		                        		<div class="col-md-12">
		                        			<?php print_alert('Aún no se han creado equipos de pruebas','danger') ?>
		                        		</div>
		                        	</div>
		                        <?php endif ?>
	                        </div>
	                    </div>
	                </div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $equiposlistado_js ?>

	