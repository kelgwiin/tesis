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
              <!-- Creating Menu Apps button-->
              

              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- GESTIÓN DE OPERACIONES-->

                <!--<small> Operaciones</small><br>
                <i class="fa fa-cogs fa-2x"></i> -->

                <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Gestión de Operaciones"
                  data-placement = "top"
                  title="Gestión de Operaciones" 
                  href = "operaciones"  
                 >
                 <i class="fa fa-cogs fa-2x"></i> GO
                 </a>
                  
                 <!-- GESTIÓN DE CAPACIDAD-->
                 <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Gestión de Capacidad"
                  data-placement = "top"
                  title="Gestión de Capacidad" 
                  href = "Capacidad"  
                 >
                 <i class="fa fa-book fa-2x"></i> GC
                 </a> 
                 
                 <!-- GESTIÓN DE RIESGOS-->
                 <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Gestión de Riesgos"
                  data-placement = "top"
                  title="Gestión de Riesgos" 
                  href = "#"  
                 >
                 <i class="fa fa-fire-extinguisher fa-2x"></i> GR
                 </a> 
               </div>
             </div>
             <br> 

              <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- GESTIÓN DE COSTOS-->
                <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Gestión de Costos"
                  data-placement = "top"
                  title="Gestión de Costos" 
                  href = "#"  
                 >
                 <i class="fa fa-clipboard fa-2x"></i> GC
                 </a>

                 <!-- GESTIÓN DE DISPONIBILIDAD-->
                 <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Gestión de Disponibilidad"
                  data-placement = "top"
                  title="Gestión de Disponibilidad" 
                  href = "#"  
                 >
                 <i class="fa fa-suitcase fa-2x"></i> GD
                 </a> 
                 
                 <!-- ACUERDOS DE NIVELES DE SERVICIO-->
                 <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Acuerdos de Niveles de Servicio"
                  data-placement = "top"
                  title="Acuerdos de Niveles de Servicio" 
                  href = "#"  
                 >
                 <i class="fa fa-suitcase fa-2x"></i> NS
                 </a> 
               </div>
             </div>
             <br>

             <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <!-- ACCESO A USUARIOS-->
                <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Acceso a Usuarios"
                  data-placement = "top"
                  title="Acceso a Usuaios" 
                  href = "#"  
                 >
                 <i class="fa fa-users fa-2x"></i> US
                 </a>

                 <!-- CARGAR INFRAESTRUCTURA-->
                 <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Cargar Infraestructura"
                  data-placement = "top"
                  title="Cargar Infraestructura" 
                  href = "cargar_datos"  
                 >
                 <i class="fa fa-sitemap fa-2x"></i> CI
                 </a> 
                 
                 <!-- AJUSTE DE SISTEMA-->
                 <a type="button" class="btn btn-primary"
                  data-toggle="tooltip"
                  data-original-title="Ajuste de Sistema"
                  data-placement = "top"
                  title="Ajuste de Sistema" 
                  href = "#"  
                 >
                 <i class="fa fa-wrench fa-2x"></i> AS
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
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $nombre_usuario; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge"><?php echo $num_msg; ?></span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Preferencias</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>