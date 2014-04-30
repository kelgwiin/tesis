 <!-- anterior: header.php (en header_sidebar.php)-->
<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="cargar_datos"><?php echo $module_name;?></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
   <ul class="nav navbar-nav side-nav">
      <li ><a href="<?php echo base_url();?>"><i class="fa fa-flag"></i> Volver a Módulos Principales</a></li>
      <!-- Generando el sidebar dinamicamente -->
        <?php 
        foreach ($list as $l) {
          $begin_li = !($l["active"]) ? "<li>": '<li class = "active">';
          echo $begin_li;
          printf('<a href = "%s">',$l["href"]);
          printf('<i class="%s"></i>',$l["icon"]);
          printf('</i> %s</a></li>',$l["chain"]);
        }
      ?>
   </ul>

<!-- sigue: header_topbar.php (en header_sidebar.php)-->