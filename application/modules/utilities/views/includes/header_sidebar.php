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
      <!-- Generando el sidebar dinamicamente -->
        <?php 
          switch ($list_level) {
            case 'one_level':
              foreach ($list as $l) {
                $begin_li = !($l["active"]) ? "<li>": '<li class = "active">';
                echo $begin_li;
                printf('<a href = "%s">',$l["href"]);
                printf('<i class="%s"></i>',$l["icon"]);
                printf('</i> %s</a></li>',$l["chain"]);
              }
              break;

            case 'two_level':
              foreach ($list as $l) {
                if(isset($l['list'])){//Es de DOS niveles
                  //inicio de listas
                  echo '<li class="dropdown">
                          <a href="'.$l['href'].'" class="dropdown-toggle" data-toggle="dropdown"><i class="'.$l['icon'].'"></i> '.$l['chain'].'<b class="caret"></b></a>
                          <ul class="dropdown-menu sub-menu">';

                  //data de level dos
                  foreach ($l['list'] as $sublist) {
                    echo '<li>';
                    printf('<a href = "%s">',$sublist["href"]);
                    printf('</i> %s</a></li>',$sublist["chain"]);
                  }
                  //fin de sub-listas
                  echo '  </ul>
                        </li>';

                }else{//UN sólo nivel
                  echo '<li>';
                  printf('<a href = "%s"> ',$l["href"]);
                  printf('<i class="%s"></i>',$l["icon"]);
                  printf('</i> %s</a></li>',$l["chain"]);
                }
              }
              break;
          }

        
      ?>
   </ul>

<!-- sigue: header_topbar.php (en header_sidebar.php)-->