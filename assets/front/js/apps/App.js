$(document).ready(function() 
{    
    //Crea la instancia del popover
    $('#popoverMenu').popover();

    //Crea la instancia de los toolitips en general
    $('[data-toggle=tooltip]').tooltip();


    //Botones Componentes de TI
    //btn Características: Al pulsar el caret que despliega el panel [PANEL]
    $('a[data-fieldIT=caracteristicas]').on('click', function(){
        var id  = $(this).attr('data-id');

        //Mostrando el Panel
        if($('div[data-id='+id+']').attr('class') == 'panel-body hidden') {
                
            $('div[data-id='+id+']').attr('class', 'panel-body show');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{

            $('div[data-id='+id+']').attr('class', 'panel-body hidden');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //btn editar
    $('a[data-fieldIT=editar]').on('click', function(){
        var id_editar  = $(this).attr('data-id');
        alert('editar id - '+id_editar);    
    });

    //btn eliminar
    $('a[data-fieldIT=eliminar]').on('click', function(){
        var id  = $(this).attr('data-id');
        alert('eliminar id - '+id);    
    });

    //Fin de Componentes de TI
    	//Mostrando los campos de TI que se despliegan al dar click
    	$("a.fieldsIT").on('click', function(){
        	var rowIndex= $(this).attr("id");//get the row id

        	$("div#fields"+rowIndex).collapse("toggle");//show the fields

        	/*Is the row Down?*/
        	img = $("i#i"+rowIndex).attr('class') =='fa fa-chevron-down'?
        	'fa fa-chevron-right':'fa fa-chevron-down';
        	$("i#i"+rowIndex).attr('class',img);
        });


        //editComponentIT
        $("button#editComponentIT").on('click',function(){
        	var rowId = $('i[class="fa fa-check-square-o"]').attr('id');

        	if(typeof(rowId) != "undefined"){
        		var rowId = $('i[class="fa fa-check-square-o"]').attr('id');
        		alert('Hiii, editComponentIT - '+rowId);
        	}else{
        		alert('Your variable is null, choose at least a row');
        	}

        });

        //deleteComponentIT
        $("button#deleteComponentIT").on('click',function(){
        	alert('Hi deleteComponentIT');
        });


    }); 