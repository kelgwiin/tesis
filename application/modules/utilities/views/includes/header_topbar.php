<!-- anterior: header_sidebar.php (en header_topbar.php)-->
<ul class="nav navbar-nav navbar-right navbar-user">
              
              <!-- Button of Apps Menu -->
              <li>
              <a
              id="popoverMenu"
              data-toggle="popover" data-placement="bottom" 
              data-html = "true"
              data-title = "Servicios"
              data-container="body"
              data-content='
              <!--Menu de Apps de los Servicios-->
              

              <div class="row">
               <div class="col-lg-4 col-md-4">
                <!-- GESTIÓN DE OPERACIONES-->

                <a type="button" class="btn"
                  title="Gestión de Operaciones" 
                  href = "operaciones"  
                 >
                 <i class="fa fa-cogs fa-3x"></i> <br> <small>Gestión de<br>Operaciones</small>
                 </a>
                </div>

                <div class="col-lg-4 col-md-4">
                 <!-- GESTIÓN DE CAPACIDAD-->
                 <a type="button" class="btn"
                  title="Gestión de Capacidad" 
                  href = "<?php echo site_url("index.php/Capacidad");?>"  
                 >
                 <i class="fa fa-book fa-3x"></i> <br> <small>Gestión de<br>Capacidad</small>
                 </a> 
                 </div>

                 <div class="col-lg-4 col-md-4">
                 <!-- GESTIÓN DE RIESGOS-->
                 <a type="button" class="btn "
                  title="Gestión de Riesgos" 
                  href = "#"  
                 >
                 <i class="fa fa-fire-extinguisher fa-3x"></i> <br> <small>Gestión de<br>Continuidad<br>del Negocio</small>
                 </a> 
               </div>

             </div>
             <br> 

              <div class="row">
               <div class="col-lg-4 col-md-4">
                
                <!-- GESTIÓN DE COSTOS-->

                <a type="button" class="btn"
                  title="Gestión de Costos" 
                  href = "<?php echo site_url('index.php/Costos');?>"  
                 >
                 <i class="fa fa-clipboard fa-3x"></i> <br> <small> Gestión de<br>Costos</small>
                 </a>
                </div>

                <div class="col-lg-4 col-md-4">
                 <!-- GESTIÓN DE DISPONIBILIDAD-->
                 <a type="button" class="btn"
                  title="Gestión de Disponibilidad" 
                  href = "<?php echo site_url("index.php/Disponibilidad");?>"  
                 >
                 <i class="fa fa-clock-o fa-3x"></i> <br> <small>Gestión de<br>Disponibilidad</small>
                 </a> 
                 </div>
                 
                 <div class="col-lg-4 col-md-4">
                 <!-- ACUERDOS DE NIVELES DE SERVICIO-->
                 <a type="button" class="btn"
                  title="Acuerdos de Niveles de Servicio" 
                  href = "#"  
                 >
                 <i class="fa fa-suitcase fa-3x"></i><br> <small>Gestión de<br>Nvls. de Serv.</small>
                 </a> 
               </div>

             </div>
             <br>

             <div class="row">
               <div class="col-lg-4 col-md-4">
                <!-- ACCESO A USUARIOS-->
                <a type="button" class="btn"
                  title="Acceso a Usuaios" 
                  href = "#"  
                 >
                 <i class="fa fa-users fa-3x"></i> <br> <small>Acceso<br>a Usuarios</small>
                 </a>
                 </div>

                 <div class="col-lg-4 col-md-4">
                 <!-- CARGAR INFRAESTRUCTURA-->
                 <a type="button" class="btn"
                  title="Cargar Infraestructura" 
                  href = "<?php echo site_url("index.php/cargar_datos");?>"  
                 >
                 <i class="fa fa-sitemap fa-3x"></i> <br> <small>Cargar<br> Infraestructura</small>
                 </a>
                 </div>
                 
                 <div class="col-lg-4 col-md-4">
                 <!-- AJUSTE DE SISTEMA-->
                 <a type="button" class="btn"
                  title="Ajuste de Sistema" 
                  href = "#"  
                 >
                 <i class="fa fa-wrench fa-3x"></i> <br> <small>Ajustes de<br>Sistema</small>
                 </a> 
               </div>

             </div>
              '

              data-original-title="" title="" >
              <i class = "fa fa-th" id = "tooltipMenuIcon" data-toggle="tooltip"
              data-original-title="Aplicaciones"
              data-placement = "left"
              >
                
              </i>
            </a>
            </li>
            <li class="divider"></li>
            <!-- end of button of Apps Menu -->

            <li class="dropdown messages-dropdown">

              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              	<i class="fa fa-envelope"></i> Mensajes 
              		<span class="badge"><?php echo $num_msg; ?></span> <b class="caret"></b> <!-- Hacer una función que pregunte constantemente por mensajes para sistema -->
              </a>
              <ul class="dropdown-menu">
                <li class="dropdown-header"><?php echo $num_msg; ?> Mensajes Nuevos</li>
                <?php foreach($mensajes as $m){ ?>
                <li class="message-preview">
                  <a href="#">
                    <span class="avatar"><img src="<?php echo $m['avatar']; ?>"></span>
                    <span class="name"><?php echo $m['nombre']; ?>:</span>
                    <span class="message"><?php echo $m['mensaje']; ?></span>
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo $m['hora']; ?></span>
                  </a>
                </li>
                <li class="divider"></li>
                <?php } ?>                
                <li><a href="#">Ver Inbox <span class="badge"><?php echo $num_msg; ?></span></a></li>
              </ul>
            </li>
            <li class="dropdown alerts-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alertas <span class="badge"><?php echo $num_ale; ?></span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
              	<?php foreach($alertas as $a){ ?>
                <li><a href="#"><?php echo $a['desc']; ?> <span class="label label-<?php echo strtolower($a['prioridad']); ?>"><?php echo $a['categoria']; ?></span></a></li>
                <li class="divider"></li>
                <?php } ?>
                <li><a href="#">Ver Todas</a></li> <!-- Enlace a alertas -->
              </ul>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                <?php $nombre_usuario = !empty($this->session->userdata('user')->nombre) ? $this->session->userdata('user')->nombre : 'Usuario' ?>
                <?php echo $nombre_usuario; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge"><?php echo $num_msg; ?></span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Preferencias</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url() ?>index.php/usuarios/cerrar-sesion"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
      <!-- Fin de Configuraciones de header...-->
      