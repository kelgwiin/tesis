

$( document ).ready(function() {


     // Desactiva el tablesorter.
     $('#dataTables-categorias').unbind('appendCache applyWidgetId applyWidgets sorton update updateCell')
       .removeClass('tablesorter')
       .find('thead th')
       .unbind('click mousedown')
       .removeClass('header headerSortDown headerSortUp');

    // Crea el Datatable
    $('#dataTables-categorias').dataTable({
      bFilter: false, 
      "bSort" : false,
      //bInfo: false,
      "lengthMenu": [ 10, 25, 50, 75, 100 ]
    });
 


});


 