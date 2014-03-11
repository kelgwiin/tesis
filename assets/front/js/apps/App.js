>>>>>>>>>>>>>>>>>>>> File 1
//---------------------------------------------
//Creado por Kelwin Gamez <kelgwiin@gmail.com> |
//Fecha: 05-02-2014                            |
//---------------------------------------------

>>>>>>>>>>>>>>>>>>>> File 2
//---------------------------------------------
//Creado por Kelwin Gamez <kelgwiin@gmail.com> |
//Fecha: 05-02-2014                            |
//---------------------------------------------

>>>>>>>>>>>>>>>>>>>> File 3
<<<<<<<<<<<<<<<<<<<<
$(document).ready(function() 
{    
    //Crea la instancia del popover
    $('#popoverMenu').popover();

    //Crea la instancia de los toolitips en general
    $('[data-toggle=tooltip]').tooltip();

>>>>>>>>>>>>>>>>>>>> File 1
    //--------------------------------
    //EVENTOS DE CARGAR DATOS BÃSICOS |
    //--------------------------------
    //Muestra los Mensajes de Error.
    //Cuando no se encuentren llenos los campos obligatorios.
    $('#btn_guardar_datos_basicos').on('click', function(){
        //Nombre de la OrganizaciÃ³n
        var in1 = $('input#nombre-organizacion-basico').val();

       if(in1.length <= 0 ){
            $('div[data-id=fg-nombre-organizacion-basico]').attr('class','form-group has-error');
            $('div[data-id=icon-nombre-organizacion-basico]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-nombre-organizacion-basico]").attr('class','form-group');
            $('div[data-id=icon-nombre-organizacion-basico]').attr('class','col-md-1 hidden');
        }
        
        //Nombre de la Moneda
        var in2 = $('input#nombre-moneda-basico').val();
        if(in2.length <= 0 ){
            $('div[data-id=fg-nombre-moneda-basico]').attr('class','form-group has-error');
            $('div[data-id=icon-nombre-moneda-basico]').attr('class', "col-md-1 show");
        }else{
            $('div[data-id=fg-nombre-moneda-basico]').attr('class','form-group');
            $('div[data-id=icon-nombre-moneda-basico]').attr('class', "col-md-1 hidden");
        }

        //Abreviatura de la moneda
        var in3 = $('input#abreviatura-moneda-basico').val();
        if(in3.length <= 0){
            $('div[data-id=fg-abreviatura-moneda-basico]').attr('class','form-group has-error');
            $('div[data-id=icon-abreviatura-moneda-basico]').attr('class','col-md-1 show');
        }else{
            $('div[data-id=fg-abreviatura-moneda-basico]').attr('class','form-group');
            $('div[data-id=icon-abreviatura-moneda-basico]').attr('class','col-md-1 hidden');
        }

        if(in1.length <= 0 || in2.length <= 0 || in3.length <= 0){
            $('#error-datos-basicos-cargar-datos').attr('class','alert alert-danger alert-dismissable show');
        }else{
                        $('#error-datos-basicos-cargar-datos').attr('class','alert alert-danger alert-dismissable hidden');
        }
        
    });

    //FIN: CARGAR DATOS BÃSICOS 




    //--------------------------------
    //EVENTOS DE COMPONENTES DE TI |
    //-----------------------------
    
>>>>>>>>>>>>>>>>>>>> File 2
    //-----------------------------
    //EVENTOS DE COMPONENTES DE TI |
    //-----------------------------
    
>>>>>>>>>>>>>>>>>>>> File 3

    //Botones Componentes de TI
<<<<<<<<<<<<<<<<<<<<
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

>>>>>>>>>>>>>>>>>>>> File 1
    //FIN: COMPONENTES DE TI
    
>>>>>>>>>>>>>>>>>>>> File 2
    //FIN: COMPONENTES DE TI
    


    //---------------------
    //EVENTOS DE SERVICIOS |
    //---------------------
    
    //Btn para mostrar la lista de Comandos/Operaciones dentro del 
    //apartado "Cronograma de EjecuciÃ³n"
    $('a[data-fieldIT=comandos-operaciones]').on('click', function(){
        var id  = $(this).attr('data-id');

        //Mostrando la lista de comandos que se encuentran ocultos en la tabla
        if($('ul[data-id='+id+']').attr('class') == 'hidden') {

            $('ul[data-id='+id+']').attr('class', 'show');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{

            $('ul[data-id='+id+']').attr('class', 'hidden');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //Mostrando los sub-menus dentro de las CaracterÃ­sticas de los Servicios
    $('a[data-fieldIT=caracteristicas-servicios]').on('click', function (){
        var titulo_tooltip = $(this).attr('data-original-title');
        var id = $(this).attr('data-id');

        if(titulo_tooltip == 'Mostrar'){//esta oculto?
            $('div[data-id='+id+']').attr('class','show');
            $(this).attr('data-original-title','Ocultar');

            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{
            $('div[data-id='+id+']').attr('class','hidden');
            $(this).attr('data-original-title','Mostrar');
>>>>>>>>>>>>>>>>>>>> File 3
    //Fin de Componentes de TI
    	//Mostrando los campos de TI que se despliegan al dar click
    	$("a.fieldsIT").on('click', function(){
        	var rowIndex= $(this).attr("id");//get the row id
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
>>>>>>>>>>>>>>>>>>>> File 2
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });
>>>>>>>>>>>>>>>>>>>> File 3
        	$("div#fields"+rowIndex).collapse("toggle");//show the fields
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
>>>>>>>>>>>>>>>>>>>> File 2
    //Checkbox que habilita el campo de montos
    $('input[data-cb=genera-ingresos-nuevo-servicio]').on('click', function(){
        if($(this).is(':checked')){
            $('input[data-id=monto-ingreso-nuevo-servicio]').removeAttr('disabled');   
        }else{
            $('input[data-id=monto-ingreso-nuevo-servicio]').attr('disabled','on');            
        }
    });

    //Agregar formulario Principal de Cronograma de EjecuciÃ³n
    $('a[data-id=btn-add-forms-cronograma]').on('click', function (){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'))+1;//NÃºmero de fila actual
        var form_cronogramas = '<div class="panel panel-info" data-id = "form-cronograma-'+num+'"> <div class="panel-body"> <!-- NumeraciÃ³n --> <div class="row"> <div class ="col-md-12"> <p class = "text-muted "><strong><small>CRONOGRAMA #'+num+'</small></strong></p> </div> </div><!-- NumeraciÃ³n --> <br> <!-- Campos de Cronograma de EjecuciÃ³n --> <div class = "row" ><!-- inner --> <!-- DesccripciÃ³n del  Cronograma --> <div class = "col-md-1"><!-- label --> <label for = "descripcion-cronograma-'+num+'" class ="control-label">DescripciÃ³n</label> </div> <div class="col-md-3"> <input type="text" name="descripcion-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "DescripciÃ³n"data-toggle = "tooltip" data-original-title = "DescripciÃ³n del Cronograma"> </div><!-- /col-3: DescripciÃ³n del Cronograma--> <!-- Horario desde--> <div class = "col-md-1"><!-- label --> <label for = "horario-desde-cronograma-'+num+'" class = "control-label">Desde</label> </div> <div class="col-md-3"> <input type="time" name="horario-desde-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Desde"data-toggle = "tooltip" data-original-title = "Horario inicial"> </div><!-- /col-3: Horario desde--> <!-- Horario hasta --> <div class = "col-md-1"><!-- label --> <label for = "horario-hasta-cronograma-'+num+'" class = "control-label">Hasta</label> </div> <div class="col-md-3"> <input type="time" name="horario-hasta-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Hasta"data-toggle = "tooltip" data-original-title = "Horario final"> </div><!-- /col-3: Horario hasta--> </div><!-- /row: Campos de Cronograma de EjecuciÃ³n--> <!-- Registro de Comandos y Operaciones --> <br> <h4 class = "text-primary">Registro de Comandos y Operaciones </h4> <!-- Boton de AÃ±adir y Eliminar formulario de Comandos y Operaciones--> <div class = "row"> <div class="col-md-1"> <a  class = "btn "data-id = "btn-add-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Agregar formulario al final"data-placement = "top"> <i class = "fa fa-plus fa-lg"></i> AÃ±adir </a> </div><!-- /col-1--> <div class="col-md-1"> <a  class = "btn "data-id = "btn-remove-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Eliminar Ãºltimo formulario"data-placement = "top"> <i class = "fa fa-minus fa-lg"></i> Eliminar </a> </div><!-- /col-1--> <div class = "col-md-10"></div><!-- VacÃ­o--> </div><!-- /row: Boton AÃ±adir y Eliminar formulario de Comandos y Operaciones --> <!-- Lista de Comandos y Operaciones --> <div class = "row"  > <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcomandos-oper = "form-comando-oper-'+num+'"> <!--Contador de numeros  de filas de comandos y operaciones --> <label class = "sr-only" id = "num-filas-comandos-oper-'+num+'" data-num-filas = "1"></label> <!--Campos Iniciales --> <div class="row" data-id = "sec-'+num+'-comando-oper-1"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- OperaciÃ³n --> <div class = "col-md-3"> <input type="text" name="operacion-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "OperaciÃ³n"data-toggle = "tooltip" data-original-title = "OperaciÃ³n a ejecutar"> </div><!-- /col-3: OperaciÃ³n --> <div class = "col-md-6"></div><!-- VacÃ­o--> <!-- /row: Comandos y Operaciones --> </div> <!-- A partir de aquÃ­ se agregar desde jquery --> </div><!-- /col-12--> <!-- /row: Lista de Comandos y Operaciones --> </div> </div><!-- /panel-body--> <!-- /panel--> </div>'; $('div[data-fcronograma=forms-cronograma]').append(form_cronogramas);//Creando el nuevo formulario
        $('label#num-filas-cronogramas').attr('data-num-filas',num);//Actualizando el contador 
        $('[data-toggle=tooltip]').tooltip();//Enlazando tooltips nuevos

        //Enlazando eventos de botones 
        //Desenlazar eventos viejos y enlazarlos todos de nuevo.
        //Puede optimizarse buscando el selector exacto que acepte mas de un atributo de "data". Buscar despues
        //Notas desde 06-03-2014
        $('a[data-id=btn-add-forms-comandos-oper]').unbind('click',add_form_comandos_operaciones);
        $('a[data-id=btn-remove-forms-comandos-oper]').unbind('click',remove_form_comandos_operaciones);
        $('a[data-id=btn-add-forms-comandos-oper]').bind('click',add_form_comandos_operaciones);
        $('a[data-id=btn-remove-forms-comandos-oper]').bind('click',remove_form_comandos_operaciones);
        
    });
>>>>>>>>>>>>>>>>>>>> File 3
        	/*Is the row Down?*/
        	img = $("i#i"+rowIndex).attr('class') =='fa fa-chevron-down'?
        	'fa fa-chevron-right':'fa fa-chevron-down';
        	$("i#i"+rowIndex).attr('class',img);
        });
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
    //---------------------
    //EVENTOS DE SERVICIOS |
    //---------------------
    
    //Btn para mostrar la lista de Comandos/Operaciones dentro del 
    //apartado "Cronograma de EjecuciÃ³n"
    $('a[data-fieldIT=comandos-operaciones]').on('click', function(){
        var id  = $(this).attr('data-id');

        //Mostrando la lista de comandos que se encuentran ocultos en la tabla
        if($('ul[data-id='+id+']').attr('class') == 'hidden') {
>>>>>>>>>>>>>>>>>>>> File 2
    //Eliminar formulario Principal de Cronograma de EjecuciÃ³n
    $('a[data-id=btn-remove-forms-cronograma]').on('click',function(){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
        
        if(num != 0){
            $('div[data-id=form-cronograma-'+num+']').remove();
            $('label#num-filas-cronogramas').attr('data-num-filas',num-1);//Actualizando el contador    
        }
    });
    
    //Agregar formulario Comandos y Operaciones (Cronograma de EjecuciÃ³n )
    $('a[data-id=btn-add-forms-comandos-oper]').on('click',add_form_comandos_operaciones);
    
    //Eliminar formulario Comandos y Operaciones (Cronograma de EjecuciÃ³n )
    $('a[data-id=btn-remove-forms-comandos-oper]').on('click',remove_form_comandos_operaciones);

    //Agregar formulario del Umbral
    $('a#btn-add-forms-umbrales').on('click',function(){

        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'))+1;//NÃºmero de fila actual
        var form_umbrales =     '<div class = "row" data-id ="form-umbral-'+num+'"> <!-- inner--> <div class = "col-md-3"> <input type="text" name="descripcion-umbrales-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "DescripciÃ³n"data-toggle = "tooltip" data-original-title = "DescripciÃ³n del Umbral"> </div> <div class = "col-md-3"> <input type="number" name="tiempo-acordado-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Tiempo"data-toggle = "tooltip" data-original-title = "Tiempo acordado"> </div> <div class = "col-md-3"> <select name="medida-umbrales-'+num+'"  class="form-control" data-secuencia = "'+num+'"data-toggle = "tooltip" data-original-title = "Medida del Tiempo"> <option value="header"> Medida </option> <option value="hh"> Horas</option> <option value="mm"> Minutos </option> <option value="ss"> Segundos </option> </select> </div> <div class = "col-md-3"> <input type="number" name="valor-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Valor"data-toggle = "tooltip" data-original-title = "Valor"> </div> </div> <br data-id ="form-umbral-'+num+'">';
     
        $('div[data-fumbrales=forms-umbrales]').append(form_umbrales);//Creando el nuevo formulario
        $('label#num-filas-umbrales').attr('data-num-filas',num);//Actualizando el contador

        //Se hace la llamada del tooltip de nuevo para que la instancia que se creo 
        //se le puedan enlazar los eventos.
        $('[data-toggle=tooltip]').tooltip();
>>>>>>>>>>>>>>>>>>>> File 3
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
            $('ul[data-id='+id+']').attr('class', 'show');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{
>>>>>>>>>>>>>>>>>>>> File 2
    });
>>>>>>>>>>>>>>>>>>>> File 3
        //editComponentIT
        $("button#editComponentIT").on('click',function(){
        	var rowId = $('i[class="fa fa-check-square-o"]').attr('id');
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
            $('ul[data-id='+id+']').attr('class', 'hidden');
            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //Mostrando los sub-menus dentro de las CaracterÃ­sticas de los Servicios
    $('a[data-fieldIT=caracteristicas-servicios]').on('click', function (){
        var titulo_tooltip = $(this).attr('data-original-title');
        var id = $(this).attr('data-id');

        if(titulo_tooltip == 'Mostrar'){//esta oculto?
            $('div[data-id='+id+']').attr('class','show');
            $(this).attr('data-original-title','Ocultar');

            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-down fa-lg');
        }else{
            $('div[data-id='+id+']').attr('class','hidden');
            $(this).attr('data-original-title','Mostrar');

            //cambiando el caret
            $('i#'+id).attr('class','fa fa-caret-right fa-lg');
        }
    });

    //Checkbox que habilita el campo de montos
    $('input[data-cb=genera-ingresos-nuevo-servicio]').on('click', function(){
        if($(this).is(':checked')){
            $('input[data-id=monto-ingreso-nuevo-servicio]').removeAttr('disabled');   
        }else{
            $('input[data-id=monto-ingreso-nuevo-servicio]').attr('disabled','on');            
        }
    });

    //Agregar formulario Principal de Cronograma de EjecuciÃ³n
    $('a[data-id=btn-add-forms-cronograma]').on('click', function (){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'))+1;//NÃºmero de fila actual
        var form_cronogramas = '<div class="panel panel-info" data-id = "form-cronograma-'+num+'"> <div class="panel-body"> <!-- NumeraciÃ³n --> <div class="row"> <div class ="col-md-12"> <p class = "text-muted "><strong><small>CRONOGRAMA #'+num+'</small></strong></p> </div> </div><!-- NumeraciÃ³n --> <br> <!-- Campos de Cronograma de EjecuciÃ³n --> <div class = "row" ><!-- inner --> <!-- DesccripciÃ³n del  Cronograma --> <div class = "col-md-1"><!-- label --> <label for = "descripcion-cronograma-'+num+'" class ="control-label">DescripciÃ³n</label> </div> <div class="col-md-3"> <input type="text" name="descripcion-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "DescripciÃ³n"data-toggle = "tooltip" data-original-title = "DescripciÃ³n del Cronograma"> </div><!-- /col-3: DescripciÃ³n del Cronograma--> <!-- Horario desde--> <div class = "col-md-1"><!-- label --> <label for = "horario-desde-cronograma-'+num+'" class = "control-label">Desde</label> </div> <div class="col-md-3"> <input type="time" name="horario-desde-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Desde"data-toggle = "tooltip" data-original-title = "Horario inicial"> </div><!-- /col-3: Horario desde--> <!-- Horario hasta --> <div class = "col-md-1"><!-- label --> <label for = "horario-hasta-cronograma-'+num+'" class = "control-label">Hasta</label> </div> <div class="col-md-3"> <input type="time" name="horario-hasta-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Hasta"data-toggle = "tooltip" data-original-title = "Horario final"> </div><!-- /col-3: Horario hasta--> </div><!-- /row: Campos de Cronograma de EjecuciÃ³n--> <!-- Registro de Comandos y Operaciones --> <br> <h4 class = "text-primary">Registro de Comandos y Operaciones </h4> <!-- Boton de AÃ±adir y Eliminar formulario de Comandos y Operaciones--> <div class = "row"> <div class="col-md-1"> <a  class = "btn "data-id = "btn-add-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Agregar formulario al final"data-placement = "top"> <i class = "fa fa-plus fa-lg"></i> AÃ±adir </a> </div><!-- /col-1--> <div class="col-md-1"> <a  class = "btn "data-id = "btn-remove-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Eliminar Ãºltimo formulario"data-placement = "top"> <i class = "fa fa-minus fa-lg"></i> Eliminar </a> </div><!-- /col-1--> <div class = "col-md-10"></div><!-- VacÃ­o--> </div><!-- /row: Boton AÃ±adir y Eliminar formulario de Comandos y Operaciones --> <!-- Lista de Comandos y Operaciones --> <div class = "row"  > <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcomandos-oper = "form-comando-oper-'+num+'"> <!--Contador de numeros  de filas de comandos y operaciones --> <label class = "sr-only" id = "num-filas-comandos-oper-'+num+'" data-num-filas = "1"></label> <!--Campos Iniciales --> <div class="row" data-id = "sec-'+num+'-comando-oper-1"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- OperaciÃ³n --> <div class = "col-md-3"> <input type="text" name="operacion-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "OperaciÃ³n"data-toggle = "tooltip" data-original-title = "OperaciÃ³n a ejecutar"> </div><!-- /col-3: OperaciÃ³n --> <div class = "col-md-6"></div><!-- VacÃ­o--> <!-- /row: Comandos y Operaciones --> </div> <!-- A partir de aquÃ­ se agregar desde jquery --> </div><!-- /col-12--> <!-- /row: Lista de Comandos y Operaciones --> </div> </div><!-- /panel-body--> <!-- /panel--> </div>'; $('div[data-fcronograma=forms-cronograma]').append(form_cronogramas);//Creando el nuevo formulario
        $('label#num-filas-cronogramas').attr('data-num-filas',num);//Actualizando el contador 
        $('[data-toggle=tooltip]').tooltip();//Enlazando tooltips nuevos

        //Enlazando eventos de botones 
        //Desenlazar eventos viejos y enlazarlos todos de nuevo.
        //Puede optimizarse buscando el selector exacto que acepte mas de un atributo de "data". Buscar despues
        //Notas desde 06-03-2014
        $('a[data-id=btn-add-forms-comandos-oper]').unbind('click',add_form_comandos_operaciones);
        $('a[data-id=btn-remove-forms-comandos-oper]').unbind('click',remove_form_comandos_operaciones);
        $('a[data-id=btn-add-forms-comandos-oper]').bind('click',add_form_comandos_operaciones);
        $('a[data-id=btn-remove-forms-comandos-oper]').bind('click',remove_form_comandos_operaciones);
        
    });

    //Eliminar formulario Principal de Cronograma de EjecuciÃ³n
    $('a[data-id=btn-remove-forms-cronograma]').on('click',function(){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
        
        if(num != 0){
            $('div[data-id=form-cronograma-'+num+']').remove();
            $('label#num-filas-cronogramas').attr('data-num-filas',num-1);//Actualizando el contador    
        }
    });
    
    //Agregar formulario Comandos y Operaciones (Cronograma de EjecuciÃ³n )
    $('a[data-id=btn-add-forms-comandos-oper]').on('click',add_form_comandos_operaciones);
    
    //Eliminar formulario Comandos y Operaciones (Cronograma de EjecuciÃ³n )
    $('a[data-id=btn-remove-forms-comandos-oper]').on('click',remove_form_comandos_operaciones);

    //Agregar formulario del Umbral
    $('a#btn-add-forms-umbrales').on('click',function(){

        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'))+1;//NÃºmero de fila actual
        var form_umbrales =     '<div class = "row" data-id ="form-umbral-'+num+'"> <!-- inner--> <div class = "col-md-3"> <input type="text" name="descripcion-umbrales-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "DescripciÃ³n"data-toggle = "tooltip" data-original-title = "DescripciÃ³n del Umbral"> </div> <div class = "col-md-3"> <input type="number" name="tiempo-acordado-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Tiempo"data-toggle = "tooltip" data-original-title = "Tiempo acordado"> </div> <div class = "col-md-3"> <select name="medida-umbrales-'+num+'"  class="form-control" data-secuencia = "'+num+'"data-toggle = "tooltip" data-original-title = "Medida del Tiempo"> <option value="header"> Medida </option> <option value="hh"> Horas</option> <option value="mm"> Minutos </option> <option value="ss"> Segundos </option> </select> </div> <div class = "col-md-3"> <input type="number" name="valor-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Valor"data-toggle = "tooltip" data-original-title = "Valor"> </div> </div> <br data-id ="form-umbral-'+num+'">';
     
        $('div[data-fumbrales=forms-umbrales]').append(form_umbrales);//Creando el nuevo formulario
        $('label#num-filas-umbrales').attr('data-num-filas',num);//Actualizando el contador

        //Se hace la llamada del tooltip de nuevo para que la instancia que se creo 
        //se le puedan enlazar los eventos.
        $('[data-toggle=tooltip]').tooltip();

    });

    //Eliminar formulario del Umbral
    $('a#btn-remove-forms-umbrales').on('click',function(){
        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
        if(num != 0){
            $('div[data-id=form-umbral-'+num+']').remove();
            $('br[data-id=form-umbral-'+num+']').remove();
            $('label#num-filas-umbrales').attr('data-num-filas',num-1);//Actualizando el contador    
        }
    });
>>>>>>>>>>>>>>>>>>>> File 2
    //Eliminar formulario del Umbral
    $('a#btn-remove-forms-umbrales').on('click',function(){
        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
        if(num != 0){
            $('div[data-id=form-umbral-'+num+']').remove();
            $('br[data-id=form-umbral-'+num+']').remove();
            $('label#num-filas-umbrales').attr('data-num-filas',num-1);//Actualizando el contador    
        }
    });
>>>>>>>>>>>>>>>>>>>> File 3
        	if(typeof(rowId) != "undefined"){
        		var rowId = $('i[class="fa fa-check-square-o"]').attr('id');
        		alert('Hiii, editComponentIT - '+rowId);
        	}else{
        		alert('Your variable is null, choose at least a row');
        	}
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
    //FIN: EVENTOS DE SERVICIOS
>>>>>>>>>>>>>>>>>>>> File 2
    //FIN: EVENTOS DE SERVICIOS
>>>>>>>>>>>>>>>>>>>> File 3
        });
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
>>>>>>>>>>>>>>>>>>>> File 2
>>>>>>>>>>>>>>>>>>>> File 3
        //deleteComponentIT
        $("button#deleteComponentIT").on('click',function(){
        	alert('Hi deleteComponentIT');
        });
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
}); 
>>>>>>>>>>>>>>>>>>>> File 2
}); 
>>>>>>>>>>>>>>>>>>>> File 3
<<<<<<<<<<<<<<<<<<<<

>>>>>>>>>>>>>>>>>>>> File 1
//--------------------
//LISTA DE FUNCIONES  |
//--------------------
//
/**
 * Agrega un nuevo formulario de comandos y operaciones en la sección de
 * Cronograma de Ejecución
 */
function add_form_comandos_operaciones(){
    var num_secuencia = $(this).attr('data-secuencia');
    var num = parseInt($('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas'))+1;//Número de fila actual
    var form_comandos_oper = '<div class="row" data-id = "sec-'+num_secuencia+'-comando-oper-'+num+'"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- Operación --> <div class = "col-md-3"> <input type="text" name="operacion-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Operación"data-toggle = "tooltip" data-original-title = "Operación a ejecutar"> </div><!-- /col-3: Operación --> <div class = "col-md-6"></div><!-- Vacío--> <!-- /row: Comandos y Operaciones --> </div>';

    $('div[data-fcomandos-oper=form-comando-oper-'+num_secuencia+']').append(form_comandos_oper);//Creando el nuevo formulario
    $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num);//Actualizando el contador 
    $('[data-toggle=tooltip]').tooltip();//Enlazando tooltips nuevos
}

/**
 * Remueve el último formulario de comandos y operaciones en la sección de
 * Cronograma de Ejecución
 */
function remove_form_comandos_operaciones(){
    var num_secuencia = $(this).attr('data-secuencia');
    var num = parseInt($('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas'));//Número de fila actual
        
    if(num != 0 ){
        $('div[data-id=sec-'+num_secuencia+'-comando-oper-'+num+']').remove();
        $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num-1);//Actualizando el contador 
    }
}
>>>>>>>>>>>>>>>>>>>> File 2
//--------------------
//LISTA DE FUNCIONES  |
//--------------------
//
/**
 * Agrega un nuevo formulario de comandos y operaciones en la sección de
 * Cronograma de Ejecución
 */
function add_form_comandos_operaciones(){
    var num_secuencia = $(this).attr('data-secuencia');
    var num = parseInt($('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas'))+1;//Número de fila actual
    var form_comandos_oper = '<div class="row" data-id = "sec-'+num_secuencia+'-comando-oper-'+num+'"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- Operación --> <div class = "col-md-3"> <input type="text" name="operacion-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Operación"data-toggle = "tooltip" data-original-title = "Operación a ejecutar"> </div><!-- /col-3: Operación --> <div class = "col-md-6"></div><!-- Vacío--> <!-- /row: Comandos y Operaciones --> </div>';

    $('div[data-fcomandos-oper=form-comando-oper-'+num_secuencia+']').append(form_comandos_oper);//Creando el nuevo formulario
    $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num);//Actualizando el contador 
    $('[data-toggle=tooltip]').tooltip();//Enlazando tooltips nuevos
}

/**
 * Remueve el último formulario de comandos y operaciones en la sección de
 * Cronograma de Ejecución
 */
function remove_form_comandos_operaciones(){
    var num_secuencia = $(this).attr('data-secuencia');
    var num = parseInt($('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas'));//Número de fila actual
        
    if(num != 0 ){
        $('div[data-id=sec-'+num_secuencia+'-comando-oper-'+num+']').remove();
        $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num-1);//Actualizando el contador 
    }
}
>>>>>>>>>>>>>>>>>>>> File 3
    }); 
<<<<<<<<<<<<<<<<<<<<
