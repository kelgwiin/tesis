$(document).ready(function() 
{    
    //Crea la instancia del popover
    $('#popoverMenu').popover();
    //Crea la instancia de los toolitips
    $('[data-toggle=tooltip]').tooltip();

    	//Showing the Component IT fields
    	$("a.fieldsIT").on('click', function(){
        	var rowIndex= $(this).attr("id");//get the row id

        	$("div#fields"+rowIndex).collapse("toggle");//show the fields

        	/*Is the row Down?*/
        	img = $("i#i"+rowIndex).attr('class') =='fa fa-chevron-down'?
        	'fa fa-chevron-right':'fa fa-chevron-down';
        	$("i#i"+rowIndex).attr('class',img);
        });

    	//checking the row
    	$('i[data-ischeck=yes]').on('click',function(){
    		$('i[data-ischeck=yes]').attr('class','fa fa-square-o');
    		$(this).attr("class",'fa fa-check-square-o');
    	});

        //addComponentIT
        $("button#addComponentIT").on('click',function(){
        	alert('Hiii, addComponentIT ');
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