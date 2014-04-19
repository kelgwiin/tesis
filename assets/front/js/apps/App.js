//---------------------------------------------
//Creado por Kelwin Gamez <kelgwiin@gmail.com> |
//Fecha: 05-02-2014                            |
//---------------------------------------------

$(document).ready(function() 
{    
    //Crea la instancia del popover
    $('#popoverMenu').popover();

    //Crea la instancia de los toolitips en general
    $('[data-toggle=tooltip]').tooltip();


    //--------------------------------------------------------------------------------
    //Conjunto de Eventos del Módulo Cargar Arquitectura (cargar_data)                |
    //--------------------------------------------------------------------------------
    //
    //
    //--------------------------------
    //EVENTOS DE CARGAR DATOS BÁSICOS |
    //--------------------------------
    
    //:: Guardar Datos Básicos ::
    //Los son procesados a través de ajax
    $('form#fr-datos-basicos').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);

        // grab the url from the form element
        var url = bk_this.attr('action');
            
        //Obteniendo la data del form
        var dataToSend = bk_this.serialize();

        //Función procesar llamada desde el post
        var fo_proccess = function (data){
            if(data.estatus == "ok"){
                //Dehabilitando todos los campos
                $('input#nombre-organizacion-basico').attr('disabled','disabled');
                $('input#nombre-moneda-basico').attr('disabled','disabled');
                $('input#abreviatura-moneda-basico').attr('disabled','disabled');
                $('textarea#descripcion-basico').attr('disabled','disabled');

                //Deshabilitando el boton de guardado
                $('button#btn_guardar_datos_basicos').attr('disabled','disabled');

                //Deshabilitando mensaje de error (puede estar o no habilitado)
                $('div#error-datos-basicos-cargar-datos').attr('class','alert alert-danger alert-dismissable hidden');

                //Habilitando mensaje de guardado o actualizado
                if($('a#btn-editar-datos-basicos-basico').attr('data-status-edicion') == 'on'){
                    $('div#msj-datos-basicos-actualizado').attr('class','alert alert-success alert-dismissable show');
                }else{
                    $('div#msj-datos-basicos-guardado').attr('class','alert alert-success alert-dismissable show');
                }

                //Cambiando el estatus de edición a off, poterior al guardado
                $('a#btn-editar-datos-basicos-basico').attr('data-status-edicion','off');

                //Habilitando el boton de edición
                $('a#btn-editar-datos-basicos-basico').removeAttr('disabled');

                //Colocando el id de la Organización para que este disponible para actualización
                $('a#btn-editar-datos-basicos-basico').attr('data-organizacion-id',data.organizacion_id);

                //Escondiendo msj de error inesperado
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable hidden');
            }else{
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
            }
        }//end-of: function fo_proccess

        //Verificando si es actualizar para cambiar el la  llamada al controlador
        if($('a#btn-editar-datos-basicos-basico').attr('data-status-edicion') == 'on'){
            url = 'index.php/cargar_datos/basico/'+$('a#btn-editar-datos-basicos-basico').attr('data-organizacion-id');
        }
        //Haciendo la llamada post desde ajax
        $.post( url, dataToSend, fo_proccess,'json');
    });
    
    //:: Muestra los Mensajes de Error ::
    //Cuando no se encuentren llenos los campos obligatorios.
    $('#btn_guardar_datos_basicos').on('click', function(){
        //Nombre de la Organización
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
    
    //:: btn Editar::
    //Habilita los campos para que se puedan editar
    $('a#btn-editar-datos-basicos-basico').on('click', function(){
        
        //Habilitando los campos
        $('input#nombre-organizacion-basico').removeAttr('disabled');
        $('input#nombre-moneda-basico').removeAttr('disabled');
        $('input#abreviatura-moneda-basico').removeAttr('disabled');
        $('textarea#descripcion-basico').removeAttr('disabled');

        //Habilitando el boton de guardar
        $('button#btn_guardar_datos_basicos').removeAttr('disabled');

        //Activando el status de edicion
        $(this).attr('data-status-edicion','on');
        

        //Deshabilitando el msj de guardado
        $('div#msj-datos-basicos-guardado').attr('class','alert alert-success alert-dismissable hidden');
        
        //Deshabilitando el msj de actualizado
        $('div#msj-datos-basicos-actualizado').attr('class','alert alert-success alert-dismissable hidden');
    });
    //FIN: CARGAR DATOS BÁSICOS 



    //-----------------------------
    //EVENTOS DE COMPONENTES DE TI |
    //-----------------------------
    
    //:: btn Características (De uso Múltiple en: Componentes TI, Departamentos y Servicios )::
    //Al pulsar el caret que despliega el panel [PANEL]
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

    //:: btn Eliminar - Mostrar Modal:: 
    //Muestra el mensaje de confirmación de eliminación (en componente de ti y en Servicios)
    $('a[data-fieldIT=eliminar]').on('click', function(){
        var id  = $(this).attr('data-id');//getting id

        //Se muestra el diálogo de confirmación
        $('div#confirm-delete').dialog('open');

        //Se coloca el valor del id 
        $('div#confirm-delete').attr('data-id',id);
    });
    
    //:: btn Confirmar Eliminación ::
    //movido a componentes_ti_view.php en el boton de confirmación del modal
    

    //:: Mensajes de Error - btn Guardar ::
    //Es usado para mostrar los  mensajes de error correspondientes a los campos obligatiorios
    $('button#btn-guardar-componentes-ti').on('click', function (){
        //Nombre
        var in1 = $('input#nombre-componente-ti').val();
        if(in1.length <= 0 ){
            $('div[data-id=fg-nombre-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-nombre-componente-ti]').attr('class','col-md-2 show');
        }else{
            $("div[data-id=fg-nombre-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-nombre-componente-ti]').attr('class','col-md-2 hidden');
        }
        
        //Categoría: N/A
        
        //Descripción
        var in2 = $('textarea#descripcion-componente-ti').val();
        if(in2.length <= 0 ){
            $('div[data-id=fg-descripcion-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-descripcion-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-descripcion-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-descripcion-componente-ti]').attr('class','col-md-1 hidden');
        }

        //Fecha Compra
        var in3 = $('input#fecha-compra-componente-ti').val();
        if(in3.length <= 0 ){
            $('div[data-id=fg-fecha-compra-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-fecha-compra-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-fecha-compra-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-fecha-compra-componente-ti]').attr('class','col-md-1 hidden');
        }

        //Fecha de Elaboración
        var in4 = $('input#fecha-elaboracion-componente-ti').val();
        if(in4.length <= 0 ){
            $('div[data-id=fg-fecha-elaboracion-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-fecha-elaboracion-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-fecha-elaboracion-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-fecha-elaboracion-componente-ti]').attr('class','col-md-1 hidden');
        }   

        //Tiempo de vida
        var in5 = $('input#tiempo-vida-componente-ti').val();
        if(in5.length <= 0 ){
            $('div[data-id=fg-tiempo-vida-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-tiempo-vida-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-tiempo-vida-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-tiempo-vida-componente-ti]').attr('class','col-md-1 hidden');
        }

        //Unida de Tiempo de Vida: N/A

        //Precio
        var in6 = $('input#precio-componente-ti').val();
        if(in6.length <= 0 ){
            $('div[data-id=fg-precio-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-precio-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-precio-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-precio-componente-ti]').attr('class','col-md-1 hidden');
        }

        //Cantidad
        var in7 = $('input#cantidad-componente-ti').val();
        if(in7.length <= 0 ){
            $('div[data-id=fg-cantidad-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-cantidad-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-cantidad-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-cantidad-componente-ti]').attr('class','col-md-1 hidden');
        }
            
        //Capacidad
        var id_item = $('select#categoria-componente-ti :selected').val();//Opción de la Categoría seleccionada
        base_item = ($('select#categoria-componente-ti').find('option:eq('+ (parseInt(id_item)-1)+')')).attr('data-base');

        var in8 = $('input#capacidad-componente-ti').val();

        if(base_item != '-1' && in8.length <= 0 ){
            $('div[data-id=fg-capacidad-componente-ti]').attr('class','form-group has-error');
            $('div[data-id=icon-capacidad-componente-ti]').attr('class','col-md-1 show');
        }else{
            $("div[data-id=fg-capacidad-componente-ti]").attr('class','form-group');
            $('div[data-id=icon-capacidad-componente-ti]').attr('class','col-md-1 hidden');
        }

        //Maestro Unidad de Medida según la Categoría: N/A
        
        //Mostrando el aviso de error en la parte superior
        if(in1.length <= 0 || in2.length <= 0 || in3.length <= 0 || in4.length <= 0 ||
            in5.length <= 0 || in6.length <= 0 || in7.length <= 0 || (base_item == '-1' && in8 <= 0) ){
            $('div#msj-error-componentes-ti').attr('class','alert alert-danger alert-dismissable show');
        }else{
            $('div#msj-error-componentes-ti').attr('class','alert alert-danger alert-dismissable hidden');
        }
    });

    //:: select Categoría ::
    //Llenado de campo de Medidas según a la categoría que pertenezca
    $('select#categoria-componente-ti').on('change',function(){
        var id_item = $(this).val();
        var id_last = $('select#categoria-componente-ti :last').val();
        var base_item = ($(this).find('option:eq('+ (parseInt(id_item)-1)+')')).attr('data-base');
        
        url = 'index.php/cargar_datos/medidas_capacidad/'+id_item;
        var fo = function (data){
            $('select#ma-unidad-medida-componente-ti option').remove();
            $('select#ma-unidad-medida-componente-ti').append(data).removeAttr('disabled');
        }
        dataType = 'html';
        $.post(url,null,fo,dataType);

        //Colocando obligatorio o no el campo de capacidad en función de categoría a la que pertenezca
        if(base_item == '-1'){
            $('input#capacidad-componente-ti').removeAttr('required');
        }else{
            $('input#capacidad-componente-ti').attr('required','required');
        }

    });

    //:: Form - Guardar componente de ti ::
    $('form#fr-nuevo-componente-ti').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);

        // grab the url from the form element
        var url = bk_this.attr('action');
            
        //Obteniendo la data del form
        var dataToSend = bk_this.serialize();
        //Función procesar llamada desde el post
        var fo_proccess = function (data){
            if(data.estatus == 'ok'){
                $(location).attr('href','index.php/cargar_datos/componentes_ti/guardado');
            }else{
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
            }
        }
        //llamada del post
        $.post(url,dataToSend, fo_proccess,'json');

    });

    //:: Form - Actualizar componente de ti ::
    $('form#fr-actualizar-componente-ti').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);

        // grab the url from the form element
        var url = bk_this.attr('action');
            
        //Obteniendo la data del form
        var dataToSend = bk_this.serialize();
        
        //Función procesar llamada desde el post
        var fo_proccess = function (data){
            if(data.estatus == 'ok'){
                $(location).attr('href','index.php/cargar_datos/componentes_ti/actualizado');
            }else{
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
            }
        }
        
        //llamada del post
       $.post(url,dataToSend, fo_proccess,'json');
    });

    //:: btn Buscar Componente de TI ::
    $('button#btn-buscar-componente-ti').on('click',function(){
        var field_buscar = $('input#input-buscar-componente-ti').val();
        var op_selected = $('select#filtro-componente-ti').val();

        if(op_selected != 'todos' && field_buscar.length > 0){
            $('div[data-id=fg-buscar-componente-ti]').attr('class','form-group');
            $('span#label-msj-error-componente-ti').attr('class','label label-danger hidden');
        }else{
            if(op_selected == 'todos'){
                $('div[data-id=fg-buscar-componente-ti]').attr('class','form-group');
                $('span#label-msj-error-componente-ti').attr('class','label label-danger hidden');
            }else{
                $('span#label-msj-error-componente-ti').attr('class','label label-danger show');
                $('div[data-id=fg-buscar-componente-ti]').attr('class','form-group has-error');
            }
        }
       
    });
    //:: select filtro cabecera componente de ti ::
    //Permite cambiar a requerido o no el campo de buscar
    $('select#filtro-componente-ti').on('change',function(){
        val = $(this).val();
        if(val == 'todos'){
            //Removiendo la opción de requeridp y deshabilitándolo
            $('input#input-buscar-componente-ti').removeAttr('required')
            .attr('disabled','disabled');
            //Quitando avisos de mensajes
            $('div[data-id=fg-buscar-componente-ti]').attr('class','form-group');
            $('span#label-msj-error-componente-ti').attr('class','label label-danger hidden');
        }else{
            //colocando el campo como requerido y habilitándolo
            $('input#input-buscar-componente-ti').attr('required','required')
            .removeAttr('disabled','disabled');
        }
    });   

    //:: Select de Tipo de Asignación ::
    //si es múltiple entonces el campo cantidad se coloca en y se inhabilita
    $('select#tipo-asignacion-componente-ti').on('change',function(){
        if($(this).val() == 'MULT'){
            $('input#cantidad-componente-ti').attr('value','1');
            $('input#cantidad-componente-ti').attr('disabled','disabled');
        }else{
            $('input#cantidad-componente-ti').removeAttr('value');
            $('input#cantidad-componente-ti').removeAttr('disabled');
        }
    });
    //FIN: COMPONENTES DE TI
    


    //---------------------
    //EVENTO DE SERVICIOS |
    //---------------------
    //
    //:: Btn para mostrar la lista de Comandos/Operaciones :: dentro del 
    //apartado "Cronograma de Ejecución"
    $('a[data-fieldIT=comandos-operaciones]').on('click', function(){
        var id  = $(this).attr('data-id');

        //Mostrando la lista de comandos que se encuentran ocultos en la tabla
        if($('ul[data-id='+id+']').attr('class') == 'hidden') {

            $('ul[data-id='+id+']').attr('class', 'show');
            //cambiando el caret
           /* $('i#'+id).attr('class','fa fa-caret-down fa-lg');*/
        }else{

            $('ul[data-id='+id+']').attr('class', 'hidden');
            //cambiando el caret
            /*$('i#'+id).attr('class','fa fa-caret-right fa-lg');*/
        }
    });

    //Mostrando los sub-menus dentro de las Características de los Servicios
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
            $('input#monto-ingreso-nuevo-servicio').removeAttr('disabled').
            attr('required','required');   
        }else{
            $('input#monto-ingreso-nuevo-servicio').attr('disabled','disabled')
            .removeAttr('required');            
        }
    });

    //:: select filtrado servicio ::
    //habilita o inhabilita el campo buscar
    $('select#filtro-servicio').on('change',function(){
        val = $(this).val();
        if(val != 'nombre'){
            //Removiendo la opción de requerido y deshabilitándolo
            $('input#input-buscar-servicio').removeAttr('required')
            .attr('disabled','disabled');
            //Quitando avisos de mensajes
            $('div#fg-buscar-servicio').attr('class','form-group');
            $('span#label-msj-error-servicio').attr('class','label label-danger hidden');
        }else{
            //colocando el campo como requerido y habilitándolo
            $('input#input-buscar-servicio').attr('required','required')
            .removeAttr('disabled','disabled');
        }
    });

    //:: btn buscar Mensaje de Error - servicio ::
    $('button#btn-buscar-servicio').on('click',function(){
        if($('select#filtro-servicio').val() == 'nombre'){
            var input = $('input#input-buscar-servicio').val();

            if(input.length <= 0){
                $('div#fg-buscar-servicio').attr('class','form-group has-error');
                $('span#label-msj-error-servicio').attr('class','label label-danger show');
            }else{
                $('div#fg-buscar-servicio').attr('class','form-group');
                $('span#label-msj-error-servicio').attr('class','label label-danger hidden');
            }
        }
    }); 

    //Agregar formulario Principal de Cronograma de Ejecución
    $('a[data-id=btn-add-forms-cronograma]').on('click', function (){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'))+1;//Número de fila actual
        var form_cronogramas = '<div class="panel panel-info sche-bgcolor" data-id = "form-cronograma-'+num+'"> <div class="panel-body"> <!-- Numeración --> <div class="row"> <div class ="col-md-12"> <p class = "text-muted "><strong><small>CRONOGRAMA #'+num+'</small></strong></p> </div> </div><!-- Numeración --> <br> <!-- Campos de Cronograma de Ejecución --> <div class = "row" ><!-- inner --> <!-- Desccripción del  Cronograma --> <div class = "col-md-2"><!-- label --> <label for = "descripcion-cronograma-'+num+'" class ="control-label">Descripción</label> </div> <div class="col-md-3"> <input type="text" name="descripcion-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Descripción"data-toggle = "tooltip" data-original-title = "Descripción del Cronograma"> </div><!-- /col-3: Descripción del Cronograma--> <!-- Horario desde--> <div class = "col-md-1"><!-- label --> <label for = "horario-desde-cronograma-'+num+'" class = "control-label">Desde</label> </div> <div class="col-md-2"> <input type="time" name="horario-desde-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Desde"data-toggle = "tooltip" data-original-title = "Horario inicial"> </div><!-- /col-3: Horario desde--> <!-- Horario hasta --> <div class = "col-md-1"><!-- label --> <label for = "horario-hasta-cronograma-'+num+'" class = "control-label">Hasta</label> </div> <div class="col-md-2"> <input type="time" name="horario-hasta-cronograma-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Hasta"data-toggle = "tooltip" data-original-title = "Horario final"> </div><!-- /col-3: Horario hasta--> <div class = "col-md-1"></div><!-- vacío--> </div><!-- /row: Campos de Cronograma de Ejecución--> <!-- Registro de Comandos y Operaciones --> <br> <h4 class = "text-primary">Registro de Comandos y Operaciones </h4> <!-- Boton de Añadir y Eliminar formulario de Comandos y Operaciones--> <div class = "row"> <div class="col-md-1"> <a  class = "btn "data-id = "btn-add-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Agregar formulario al final"data-placement = "top"> <i class = "fa fa-plus fa-lg"></i> Añadir </a> </div><!-- /col-1--> <div class="col-md-1"> <a  class = "btn "data-id = "btn-remove-forms-comandos-oper"data-secuencia = "'+num+'"data-toggle = "tooltip"data-original-title = "Eliminar último formulario"data-placement = "top"> <i class = "fa fa-minus fa-lg"></i> Eliminar </a> </div><!-- /col-1--> <div class = "col-md-10"></div><!-- Vacío--> </div><!-- /row: Boton Añadir y Eliminar formulario de Comandos y Operaciones --> <!-- Lista de Comandos y Operaciones --> <div class = "row"  > <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-fcomandos-oper = "form-comando-oper-'+num+'"> <!--Contador de numeros  de filas de comandos y operaciones --> <label class = "sr-only" id = "num-filas-comandos-oper-'+num+'" data-num-filas = "1"></label> <!--Campos Iniciales --> <div class="row" data-id = "sec-'+num+'-comando-oper-1"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-'+num+'-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- Operación --> <div class = "col-md-3"> <input type="text" name="operacion-'+num+'-1" data-secuencia = "1"class="form-control"  required="required"  placeholder = "Operación"data-toggle = "tooltip" data-original-title = "Operación a ejecutar"> </div><!-- /col-3: Operación --> <div class = "col-md-6"></div><!-- Vacío--> <!-- /row: Comandos y Operaciones --> </div> <!-- A partir de aquí se agregar desde jquery --> </div><!-- /col-12--> <!-- /row: Lista de Comandos y Operaciones --> </div> </div><!-- /panel-body--> <!-- /panel--> </div>';

        $('div[data-fcronograma=forms-cronograma]').append(form_cronogramas);//Creando el nuevo formulario
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

    //Eliminar formulario Principal de Cronograma de Ejecución
    $('a[data-id=btn-remove-forms-cronograma]').on('click',function(){
        var num = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
        
        if(num > 1){
            //Verificando si es Actualizar
            // para así añadirlo temporalmente para su posterior actualización
            oper = $('form#fr-nuevo-servicio').attr('data-oper');
            if(oper == 'actualizar'){
                db_id = $('div[data-id=form-cronograma-'+num+']').attr('data-db-id');
                
                if(!(typeof(db_id) === "undefined")){//verifcando que no sea un cronograma nuevo
                    $('div#list-id-cronograma').append('<span id = "'+db_id+'"></span>');
                }    
            }

            //Elimando visualmente
            $('div[data-id=form-cronograma-'+num+']').remove();
            $('label#num-filas-cronogramas').attr('data-num-filas',num-1);//Actualizando el contador

        }
    });
    
    //Agregar formulario Comandos y Operaciones (Cronograma de Ejecución )
    $('a[data-id=btn-add-forms-comandos-oper]').on('click',add_form_comandos_operaciones);
    
    //Eliminar formulario Comandos y Operaciones (Cronograma de Ejecución )
    $('a[data-id=btn-remove-forms-comandos-oper]').on('click',remove_form_comandos_operaciones);

    //Agregar formulario del Umbral
    $('a#btn-add-forms-umbrales').on('click',function(){

        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'))+1;//Número de fila actual
        var form_umbrales = '<div class = "row" data-id = "form-umbral-'+num+'"> <!-- inner--> <div class = "col-md-3"> <input type="text" name="descripcion-umbrales-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Descripción"data-toggle = "tooltip" data-original-title = "Descripción del Umbral"> </div> <div class = "col-md-3"> <input type="number" name="tiempo-acordado-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Tiempo"data-toggle = "tooltip" data-original-title = "Tiempo acordado"> </div> <div class = "col-md-3"> <select name="medida-umbrales-'+num+'"  class="form-control" data-secuencia = "'+num+'"data-toggle = "tooltip" data-original-title = "Medida del Tiempo"> <option value="hh"> Horas</option> <option value="mm"> Minutos </option> <option value="ss"> Segundos </option> </select> </div> <div class = "col-md-3"> <input type="number" name="valor-umbrales-'+num+'" min = "1" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Valor"data-toggle = "tooltip" data-original-title = "Valor"> </div> </div><!-- /row: form '+num+'--> <br data-id = "form-umbral-'+num+'">';
        $('div[data-fumbrales=forms-umbrales]').append(form_umbrales);//Creando el nuevo formulario
        $('label#num-filas-umbrales').attr('data-num-filas',num);//Actualizando el contador

        //Se hace la llamada del tooltip de nuevo para que la instancia que se creo 
        //se le puedan enlazar los eventos.
        $('[data-toggle=tooltip]').tooltip();
    });

    //Eliminar formulario del Umbral
    $('a#btn-remove-forms-umbrales').on('click',function(){
        var num = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
        if(num > 1){
            //Verificando si es Actualizar
            // para así añadirlo temporalmente para su posterior actualización
            oper = $('form#fr-nuevo-servicio').attr('data-oper');
            if(oper == 'actualizar'){
                db_id = $('div[data-id=form-umbral-'+num+']').attr('data-db-id');
                
                if(!(typeof(db_id) === "undefined")){//verifcando que no sea un umbral nuevo
                    $('div#list-id-umbral').append('<span id = "'+db_id+'"></span>');
                }    
            }

            //Eliminando visualmente
            $('div[data-id=form-umbral-'+num+']').remove();
            $('br[data-id=form-umbral-'+num+']').remove();
            $('label#num-filas-umbrales').attr('data-num-filas',(num-1));//Actualizando el contador    
        }
    });

    
    //Agregar formulario del Procesos
    $('a#btn-add-forms-procesos').on('click',function(){

        var num = parseInt($('label#num-filas-procesos').attr('data-num-filas'))+1;//Número de fila actual
        var form_procesos= '<div class = "row" data-id = "form-proceso-'+num+'"> <!-- inner--> <!-- Nombre--> <div class = "col-md-4"> <input type="text" name="nombre-procesos-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Nombre"data-toggle = "tooltip" data-original-title = "Nombre del Proceso"> </div> <!-- Descripción (opcional) --> <div class = "col-md-4"> <input type="text" name="descripcion-procesos-'+num+'"  data-secuencia = "'+num+'"class="form-control"  placeholder = "Descripción"data-toggle = "tooltip" data-original-title = "Descripción del Proceso (opcional)"> </div> <!-- Tipo (opcional) --> <div class = "col-md-4"> <input type="text" name="tipo-procesos-'+num+'" data-secuencia = "'+num+'"class="form-control"  placeholder = "Tipo"data-toggle = "tooltip" data-original-title = "Tipo de Proceso (opcional)"> </div> </div><!-- /row: inner procesos --> <br data-id = "form-proceso-'+num+'">';

        $('div[data-fprocesos=forms-procesos]').append(form_procesos);//Creando el nuevo formulario
        $('label#num-filas-procesos').attr('data-num-filas',num);//Actualizando el contador

        //Se hace la llamada del tooltip de nuevo para que la instancia que se creo 
        //se le puedan enlazar los eventos.
        $('[data-toggle=tooltip]').tooltip();
    });

    //Eliminar formulario del Procesos
    $('a#btn-remove-forms-procesos').on('click',function(){
        var num = parseInt($('label#num-filas-procesos').attr('data-num-filas'));
        if(num > 1){
            //Verificando si es Actualizar
            // para así añadirlo temporalmente para su posterior actualización
            oper = $('form#fr-nuevo-servicio').attr('data-oper');
            if(oper == 'actualizar'){
                db_id = $('div[data-id=form-proceso-'+num+']').attr('data-db-id');
                
                if(!(typeof(db_id) === "undefined")){//verifcando que no sea un proceso nuevo
                    $('div#list-id-proceso').append('<span id = "'+db_id+'"></span>');
                }    
            }
            //Eliminando Visualmente
            $('div[data-id=form-proceso-'+num+']').remove();
            $('br[data-id=form-proceso-'+num+']').remove();
            $('label#num-filas-procesos').attr('data-num-filas',(num-1));//Actualizando el contador    
        }
    });


    // :: btn Guardar Servicio  - Mensaje de Error ::
    $('button#btn-guardar-servicio').on('click',function(){
        var is_empty = false;

        if(($('input#nombre-servicio').val()).length <= 0 || 
            
            ($('input[data-cb=genera-ingresos-nuevo-servicio]').is(':checked') && 
             $('input#monto-ingreso-nuevo-servicio').val().length <= 0) ||

            $('textarea#descripcion-datos-basicos-servicio').val().length <= 0
        ){
            is_empty = true;
        }

        if(!is_empty){
            //Se verifican los formularios de cronogramas de ejecución
            tama = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
            
            //cabecera del cronograma
            for (var i = 1; i <= tama && !is_empty; i++) {
                if($('input[name=descripcion-cronograma-'+i+']').val().length <= 0 || 
                    $('input[name=horario-desde-cronograma-'+i+']').val().length<=0 ||
                    $('input[name=horario-hasta-cronograma-'+i+']').val().length<=0
                ){//
                    is_empty = true;
                }

              //Verificando los comandos y operaciones
              tama_com_oper = parseInt($('label#num-filas-comandos-oper-'+i).attr('data-num-filas'));
              for(var j = 1; j <= tama_com_oper && !is_empty; j++){
                if($('input[name=comando-'+i+'-'+j+']').val().length <= 0 ||
                    $('input[name=operacion-'+i+'-'+j+']').val().length <= 0){
                    is_empty = true;
                }
              }

            }//end of: for cronogramas

            //Verificando los Umbrales
            tama_umbrales = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
            for (var k = 1; k <= tama_umbrales && !is_empty; k++) {
                if($('input[name=descripcion-umbrales-'+k+']').val().length <= 0 ||
                    $('input[name=tiempo-acordado-umbrales-'+k+']').val().length <= 0 ||
                    $('input[name=valor-umbrales-'+k+']').val().length <= 0 

                    ){

                    is_empty = true;
                }
            }//end of: for umbrales

            //Verificando los procesos
            tama_procesos = parseInt($('label#num-filas-procesos').attr('data-num-filas'));
            for ( k = 1;  k <= tama_procesos && !is_empty; k++) {
                   if($('input[name=nombre-procesos-'+k+']').val().length <= 0){
                        is_empty = true;
                   }
            }//end of: for procesos
        }

       if(is_empty){
            //Mostrando msj de error
            $('div#msj-error-servicios').attr('class','alert alert-danger alert-dismissable show');
       }
    });

    //:: Form - Guardar Servicio (NUEVO) ::
    $('form[data-oper=nuevo]').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);

        // grab the url from the form element
        var url = bk_this.attr('action');
            
        oper = "guardado";

        //Validando que los nombres de los Procesos sean únicos

        //Procesos
        tama_procesos = parseInt($('label#num-filas-procesos').attr('data-num-filas'));
        list_procesos_ = new Array();
        nombres_procesos_ = new Array();
        for ( k = 1;  k <= tama_procesos; k++) {
            list_procesos_.push({
              nombre:$('input[name=nombre-procesos-'+k+']').val(),
              descripcion:$('input[name=descripcion-procesos-'+k+']').val(),
              tipo:$('input[name=tipo-procesos-'+k+']').val()
            });

            //Nombre de los procesos
            nombres_procesos_.push($('input[name=nombre-procesos-'+k+']').val());
               
        }//end of: for procesos

        function save_serv_db(url,list_procesos_,oper){

            //Función procesar llamada desde el post
            var fo_proccess = function (data){
                if(data.estatus == 'ok'){
                    $(location).attr('href','index.php/cargar_datos/servicios/'+oper);
                }else{
                    $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
                }
            }
            
            //Preparando datos para enviar al post

            //Datos básicos
            genera_ingresos_ = $('input[data-cb=genera-ingresos-nuevo-servicio]').is(':checked');
            if(genera_ingresos_){
                monto_ = $('input#monto-ingreso-nuevo-servicio').val();
            }else{
                monto_ = 0;
            }

            //Cronogramas de Ejecución
            tama = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
            list_cronogramas_ejecucion_ = new Array();

            for (var i = 1; i <= tama; i++) {
              //Obteniendo los comandos y operaciones
                l_c_o = new Array();
                tama_com_oper = parseInt($('label#num-filas-comandos-oper-'+i).attr('data-num-filas'));
                for(var j = 1; j <= tama_com_oper; j++){
                    l_c_o.push({
                        comando:$('input[name=comando-'+i+'-'+j+']').val(),
                        operacion:$('input[name=operacion-'+i+'-'+j+']').val()
                    });
                }

                //Datos básicos & agregando la lista de comandos y operaciones
                row = {
                        descripcion:$('input[name=descripcion-cronograma-'+i+']').val(),
                        horario_desde:$('input[name=horario-desde-cronograma-'+i+']').val(),
                        horario_hasta:$('input[name=horario-hasta-cronograma-'+i+']').val(),
                        list_comandos_operaciones:l_c_o
                };

                list_cronogramas_ejecucion_.push(row);

            }//end of: for cronogramas

            //Umbrales
            tama_umbrales = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
            list_umbrales_ = new Array();
            for (var k = 1; k <= tama_umbrales; k++) {
                list_umbrales_.push({
                    descripcion:$('input[name=descripcion-umbrales-'+k+']').val(),
                    tiempo_acordado:$('input[name=tiempo-acordado-umbrales-'+k+']').val(),
                    medida_tiempo:$('select[name=medida-umbrales-'+k+']').val(),
                    valor:$('input[name=valor-umbrales-'+k+']').val()
                });
            }//end of: for umbrales

            params = {
                nombre:$('input#nombre-servicio').val(),
                tipo_servicio:$('select#tipo-servicio').val(),
                genera_ingresos:genera_ingresos_,
                monto:monto_,
                descripcion:$('textarea#descripcion-datos-basicos-servicio').val(),
                list_cronogramas_ejecucion:list_cronogramas_ejecucion_,
                list_umbrales:list_umbrales_,
                list_procesos:list_procesos_
            };
            //llamada del post
            $.post(url,params,fo_proccess,'json');
        }



        //Validando que los nombres locales son diferentes
        nombres_repetidos = false;
        for (var i = 0; i < tama_procesos && !nombres_repetidos; i++) {
            for (var j = 0; j < tama_procesos && !nombres_repetidos; j++) {
                if(i != j){
                    if(nombres_procesos_[i] == nombres_procesos_[j]){
                        nombres_repetidos = true;
                    }
                }
            } 
        }//end of: for validaciones locales de los nombres

        if(!nombres_repetidos){
            //Escondiendo el msj de duplicado local
            $('div#msj-nombres-duplicados-local').attr('class','alert alert-danger alert-dismissable hidden');
            
            url_val = 'index.php/cargar_datos/servicios/validar_nombres';
            params_val = {nombres_procesos:nombres_procesos_};

            $.post(url_val,params_val,
                function(data){
                    if(data.repetidos == 'yes'){
                        var nom_repe='<code id = "data-nom-repe">';
                        for (var i = 0; i < data.nombres.length; i++) {
                            nom_repe += data.nombres[i];
                            if(i != data.nombres.length-1 ){
                                nom_repe+=', ';
                            }
                        }
                        nom_repe+= '</span>';
                        $('code#data-nom-repe').remove();//eliminando por si existía
                        $('div#msj-nombres-duplicados-db').append(nom_repe)
                        .attr('class','alert alert-danger alert-dismissable show');
                    }else{
                        //Guarda el nuevo servicio
                        save_serv_db(url,list_procesos_,oper);
                    }
                }
            ,'json');    
        }else{
            $('div#msj-nombres-duplicados-db').attr('class','alert alert-danger alert-dismissable hidden');
            $('div#msj-nombres-duplicados-local').attr('class','alert alert-danger alert-dismissable show');
        }
        
    });
    
    //:: Form - Guardar Servicio (ACTUALIZAR) ::
    $('form[data-oper=actualizar]').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);

        // grab the url from the form element
        var url = bk_this.attr('action');
            
        oper = "actualizado";

        //Validando que los nombres de los Procesos sean únicos

        //Procesos
        tama_procesos = parseInt($('label#num-filas-procesos').attr('data-num-filas'));
        list_procesos_nuevos_ = new Array();
        list_procesos_act_ = new Array();
        nombres_procesos_nuevos_ = new Array();
        nombres_procesos_act_ = new Array();
        nombres_procesos_ = new Array();//para la verificación de los nombres localmente

        for ( k = 1;  k <= tama_procesos; k++) {
            //Verificando si son nuevos o actualizados los procesos
            db_id_pro = $('div[data-id=form-proceso-'+k+']').attr('data-db-id');
            if(!(typeof(db_id_pro) === "undefined")){//Es actualizar
                list_procesos_act_.push({
                  id:db_id_pro,  
                  nombre:$('input[name=nombre-procesos-'+k+']').val(),
                  descripcion:$('input[name=descripcion-procesos-'+k+']').val(),
                  tipo:$('input[name=tipo-procesos-'+k+']').val()
                });

                //Nombre de los procesos
                nombres_procesos_act_.push({nombre:$('input[name=nombre-procesos-'+k+']').val(),
                                        servicio_proceso_id:db_id_pro});
            }else{//Es nuevo
                list_procesos_nuevos_.push({
                  nombre:$('input[name=nombre-procesos-'+k+']').val(),
                  descripcion:$('input[name=descripcion-procesos-'+k+']').val(),
                  tipo:$('input[name=tipo-procesos-'+k+']').val()
                });

                //Nombre de los procesos
                nombres_procesos_nuevos_.push($('input[name=nombre-procesos-'+k+']').val());
            }
            //Para verificación local
            nombres_procesos_.push($('input[name=nombre-procesos-'+k+']').val());
               
        }//end of: for procesos

        function save_serv_db(url,list_procesos_nuevos_, list_procesos_act_,oper){

            //Función procesar llamada desde el post
            var fo_proccess = function (data){
                alert(data);
                /*if(data.estatus == 'ok'){
                    $(location).attr('href','index.php/cargar_datos/servicios/'+oper);
                }else{
                    $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
                }*/
            }
            
            //Preparando datos para enviar al post

            //Datos básicos
            genera_ingresos_ = $('input[data-cb=genera-ingresos-nuevo-servicio]').is(':checked');
            if(genera_ingresos_){
                monto_ = $('input#monto-ingreso-nuevo-servicio').val();
            }else{
                monto_ = 0;
            }

            //Cronogramas de Ejecución
            tama = parseInt($('label#num-filas-cronogramas').attr('data-num-filas'));
            list_cronogramas_ejecucion_nuevo_ = new Array();
            list_cronogramas_ejecucion_act_ = new Array();

            for (var i = 1; i <= tama; i++) {
                //Verificando si es actualizar o nuevo
                db_id_c = $('div[data-id=form-cronograma-'+i+']').attr('data-db-id');
                if(!(typeof(db_id_c) === "undefined")){//Es :: ACTUALIZAR ::
                    //Obteniendo los comandos y operaciones
                    l_c_o_nuevo = new Array();
                    l_c_o_act = new Array();

                    tama_com_oper = parseInt($('label#num-filas-comandos-oper-'+i).attr('data-num-filas'));
                    for(var j = 1; j <= tama_com_oper; j++){
                        db_id_co = $('div[data-id=sec-'+i+'-comando-oper-'+j+']').attr('data-db-id');

                        if(!(typeof(db_id_co) === "undefined")){//Es -- Actualizar --
                            l_c_o_act.push({
                                id:db_id_co,
                                comando:$('input[name=comando-'+i+'-'+j+']').val(),
                                operacion:$('input[name=operacion-'+i+'-'+j+']').val()
                            });
                        }else{//Es -- Nuevo --
                            l_c_o_nuevo.push({
                                comando:$('input[name=comando-'+i+'-'+j+']').val(),
                                operacion:$('input[name=operacion-'+i+'-'+j+']').val()
                            });
                        }
                    }//end of: for Comandos & Operaciones

                    //Datos básicos & agregando la lista de comandos y operaciones
                    row = {
                            id: db_id_c,
                            descripcion:$('input[name=descripcion-cronograma-'+i+']').val(),
                            horario_desde:$('input[name=horario-desde-cronograma-'+i+']').val(),
                            horario_hasta:$('input[name=horario-hasta-cronograma-'+i+']').val(),
                            list_comandos_operaciones_nuevo:l_c_o_nuevo,
                            list_comandos_operaciones_act:l_c_o_act
                    };
                    list_cronogramas_ejecucion_act_.push(row);
                }else{//Es ::: NUEVO ::
                    //Obteniendo los comandos y operaciones
                      l_c_o = new Array();
                      tama_com_oper = parseInt($('label#num-filas-comandos-oper-'+i).attr('data-num-filas'));
                      for(var j = 1; j <= tama_com_oper; j++){
                          l_c_o.push({
                              comando:$('input[name=comando-'+i+'-'+j+']').val(),
                              operacion:$('input[name=operacion-'+i+'-'+j+']').val()
                          });
                      }
                      //Datos básicos & agregando la lista de comandos y operaciones
                      row = {
                              descripcion:$('input[name=descripcion-cronograma-'+i+']').val(),
                              horario_desde:$('input[name=horario-desde-cronograma-'+i+']').val(),
                              horario_hasta:$('input[name=horario-hasta-cronograma-'+i+']').val(),
                              list_comandos_operaciones:l_c_o
                      };

                      list_cronogramas_ejecucion_nuevo_.push(row);
                }
            }//end of: for cronogramas

            //Umbrales
            tama_umbrales = parseInt($('label#num-filas-umbrales').attr('data-num-filas'));
            list_umbrales_act_ = new Array();
            list_umbrales_nuevo_ = new Array();
            for (var k = 1; k <= tama_umbrales; k++) {
                db_id_u = $('div[data-id=form-umbral-'+k+']').attr('data-db-id');

                if(!(typeof(db_id_u) === "undefined")){//Es Actualizar
                    list_umbrales_act_.push({
                        id:db_id_u,
                        descripcion:$('input[name=descripcion-umbrales-'+k+']').val(),
                        tiempo_acordado:$('input[name=tiempo-acordado-umbrales-'+k+']').val(),
                        medida_tiempo:$('select[name=medida-umbrales-'+k+']').val(),
                        valor:$('input[name=valor-umbrales-'+k+']').val()
                    });                
                }else{
                    list_umbrales_nuevo_.push({
                        descripcion:$('input[name=descripcion-umbrales-'+k+']').val(),
                        tiempo_acordado:$('input[name=tiempo-acordado-umbrales-'+k+']').val(),
                        medida_tiempo:$('select[name=medida-umbrales-'+k+']').val(),
                        valor:$('input[name=valor-umbrales-'+k+']').val()
                    });
                }
            }//end of: for umbrales

            //Consultando los elementos eliminados
            var del_ids = function(target){
                del = $('div#'+target+' > span');
                list_del = new Array();
                del.each(function(){
                    list_del.push($(this).attr('id'));
                });
                return list_del;    
            }

            eliminados_ids_ = {
                tareas:del_ids('list-id-cronograma'),
                tarea_detalle:del_ids('list-id-comando-oper'),
                umbral:del_ids('list-id-umbral'),
                proceso:del_ids('list-id-proceso')                   
            };

            params = {
                nombre:$('input#nombre-servicio').val(),
                tipo_servicio:$('select#tipo-servicio').val(),
                genera_ingresos:genera_ingresos_,
                cantidad_ingresos:monto_,
                descripcion:$('textarea#descripcion-datos-basicos-servicio').val(),
                list_cronogramas_ejecucion_nuevo:list_cronogramas_ejecucion_nuevo_,
                list_cronogramas_ejecucion_act:list_cronogramas_ejecucion_act_,
                list_umbrales_nuevo:list_umbrales_nuevo_,
                list_umbrales_act:list_umbrales_act_,
                list_procesos_nuevo:list_procesos_nuevos_,
                list_procesos_act:list_procesos_act_,
                eliminados_ids:eliminados_ids_
            };
            //llamada del post
            $.post(url,params,fo_proccess,'text');
        }//end of function: save_serv_db



        //Validando que los nombres locales son diferentes
        nombres_repetidos = false;
        for (var i = 0; i < tama_procesos && !nombres_repetidos; i++) {
            for (var j = 0; j < tama_procesos && !nombres_repetidos; j++) {
                if(i != j){
                    if(nombres_procesos_[i] == nombres_procesos_[j]){
                        nombres_repetidos = true;
                    }
                }
            } 
        }//end of: for validaciones locales de los nombres

        if(!nombres_repetidos){
            //Escondiendo el msj de duplicado local
            $('div#msj-nombres-duplicados-local').attr('class','alert alert-danger alert-dismissable hidden');
            
            url_val = 'index.php/cargar_datos/servicios/validar_nombres_actualizar';
            
            //Verificando si hay procesos nuevos a actualizar
            if(nombres_procesos_nuevos_.length > 0){
                params_val = {nombres_procesos_nuevos:nombres_procesos_nuevos_,
                                nombres_procesos_act:nombres_procesos_act_};    
            }else{
                params_val = {nombres_procesos_act:nombres_procesos_act_};
            }
            

            $.post(url_val,params_val,
                function(data){
                    
                    if(data.repetidos == 'yes'){
                        var nom_repe='<code id = "data-nom-repe">';
                        for (var i = 0; i < data.nombres.length; i++) {
                            nom_repe += data.nombres[i];
                            if(i != data.nombres.length-1 ){
                                nom_repe+=', ';
                            }
                        }
                        nom_repe+= '</span>';
                        $('code#data-nom-repe').remove();//eliminando por si existía
                        $('div#msj-nombres-duplicados-db').append(nom_repe)
                        .attr('class','alert alert-danger alert-dismissable show');
                    }else{
                        
                        //Actualizando el Servicio
                       save_serv_db(url,list_procesos_nuevos_, list_procesos_act_,oper);
                    }
                }
            ,'json');    
        }else{
            $('div#msj-nombres-duplicados-db').attr('class','alert alert-danger alert-dismissable hidden');
            $('div#msj-nombres-duplicados-local').attr('class','alert alert-danger alert-dismissable show');
        }
    });
    //btn eliminar (muestra el modal) se activa con el mismo evento de componente de ti.
    
    //confirmar eliminación está en el documento de servicios.php

    //
    //FIN: EVENTOS DE SERVICIOS


    //---------------------------
    // EVENTOS DE DEPARTAMENTOS |
    //--------------------------
    //
    //:: Ícono ::
    //cambiando ícono del dpto
    $('button[data-icono=icono]').on('click',function(){
        $('button[data-icono=icono]').attr('data-select','no').
        attr('class','btn btn-info');//deseleccionando

        $(this).attr('data-select','si').attr('class','btn btn-info active');
    });

    //:: Mensajes de Error en boton guardar ::
    //se muestran cuando no se encuentran lleno alguno de los campos requeridos
    $('button#btn-guardar-dpto').on('click',function(){
        //Nombre
        var in1 = $('input#nombre-dpto').val();
        if(in1.length <= 0 ){
            $('div#fg-nombre-dpto').attr('class','form-group has-error');
            $('div#icon-nombre-dpto').attr('class','col-md-1 show');
        }else{
            $("div#fg-nombre-dpto").attr('class','form-group');
            $('div#icon-nombre-dpto').attr('class','col-md-1 hidden');
        }

        //Descripción
        var in2 = $('textarea#descripcion-dpto').val();
        if(in2.length <= 0 ){
            $('div#fg-descripcion-dpto').attr('class','form-group has-error');
            $('div#icon-descripcion-dpto').attr('class','col-md-1 show');
        }else{
            $("div#fg-descripcion-dpto").attr('class','form-group');
            $('div#icon-descripcion-dpto').attr('class','col-md-1 hidden');
        }

        //Componentes de ti copiados
        longi = $('select#copied-componentes-ti-dpto > option').length;

        if(longi <= 0){
            $('div#fg-copied-componentes-ti-dpto').attr('class','form-group has-error');
            $('div#icon-copied-componentes-ti-dpto').attr('class','col-md-1 show');
        }else{
            $('div#fg-copied-componentes-ti-dpto').attr('class','form-group');
            $('div#icon-copied-componentes-ti-dpto').attr('class','col-md-1 hidden');
        }

        
        //Condición para mostrar etiqueta de error
        if(in1.length <= 0 || in2.length <= 0 || longi <= 0){
            $('div#msj-error-componentes-ti').attr('class','alert alert-danger alert-dismissable show');//mostrar msj
        }else{
            $('div#msj-error-componentes-ti').attr('class','alert alert-danger alert-dismissable hidden');//escoder msj
        }

    });
    
    //:: btn add Componente al dpto ::
    $('button#add-comp-ti-dpto').on('click',function(){
        options = $('select#all-componentes-ti-dpto :selected');
        options.each(     
                function(){
                    op = $(this);
                    $('select#copied-componentes-ti-dpto').append(op);
                }
            );
    });

    //:: btn rm Componente al dpto ::
    //remueve los componentes seleccionados
    $('button#rm-comp-ti-dpto').on('click',function(){
        options = $('select#copied-componentes-ti-dpto :selected');
        lon = options.length;
        vals = "";
        options.each(     
                function(){
                    op = $(this);
                    $('select#all-componentes-ti-dpto').append(op);
                }
            );
    });

    //:: Form - Guardar Dpto (NUEVO) & Actualizar ::
    //todo depende del campo "data-oper" del formulario
    $('form#fr-nuevo-dpto').on('submit',function(event){
        event.preventDefault();
        // store reference to the form
        var bk_this = $(this);
        
        // grab the url from the form element
        var url = bk_this.attr('action');
            
        var oper = bk_this.attr('data-oper');

        //Función procesar llamada desde el post
        var fo_proccess = function (data){
            if(data.estatus == 'ok'){
                $(location).attr('href','index.php/cargar_datos/departamentos/'+oper);
            }else{
                $('div#msj-error-inesperado-basico').attr('class','alert alert-danger alert-dismissable show');
            }
        }
        
        //Preparando datos para enviar al post
            
            //Obteniendo lista de IDs de Componentes de ti
        options = $('select#copied-componentes-ti-dpto > option');
        list_comp_ti_ = new Array();

        options.each(function(){
            act = $(this);
            list_comp_ti_.push({id:act.val(),cant_disp:act.attr('data-cant-disp')});
        });

        params = {
            nombre:$('input#nombre-dpto').val(),
            descripcion:$('textarea#descripcion-dpto').val(),
            icono_fa:$('button[data-select=si]').attr('data-icofa'),
            list_comp_ti:list_comp_ti_
        }

        //llamada del post
        if(options.length > 0){//para que no envíe la data cuando esté vacía
            $.post(url,params,fo_proccess,'json');
        }
    });
    
    //:: select filtro 
    //:: inhabilita campo de buscar cuando es la "todos"
    $('select#filtro-dpto').on('change',function(){
        var value = $(this).val();
        if(value == 'todos'){
            $('input#buscar-dpto').removeAttr('required');
            $('input#buscar-dpto').attr('disabled','disabled');
            $('div#fg-buscar-dpto').attr('class','form-group');
            $('span#label-msj-error-dpto').attr('class','label label-danger hidden');
        }else{
            $('input#buscar-dpto').attr('required','required');
            $('input#buscar-dpto').removeAttr('disabled');
        }
    });

    //:: btn buscar Mensaje de Error ::
    $('button#btn-buscar-dpto').on('click',function(){
        if($('select#filtro-dpto').val() != 'todos'){
            var input = $('input#buscar-dpto').val();

            if(input.length <= 0){
                $('div#fg-buscar-dpto').attr('class','form-group has-error');
                $('span#label-msj-error-dpto').attr('class','label label-danger show');
            }else{
                $('div#fg-buscar-dpto').attr('class','form-group');
                $('span#label-msj-error-dpto').attr('class','label label-danger hidden');
            }
        }
    });

        //:: btn Eliminar - Mostrar Modal dpto:: 
    //Muestra el mensaje de confirmación de eliminación
    $('a[data-fieldIT=eliminar-dpto]').on('click', function(){
        var id  = $(this).attr('data-id');//getting id

        //Se muestra el diálogo de confirmación
        $('div#confirm-delete').dialog('open');

        //Se coloca el valor del id 
        $('div#confirm-delete').attr('data-id',id);
    });
    
    //:: btn Confirmar Eliminación dpto ::
    //movido a departamentos.php en el confirmar del modal
    
    // FIN: EVENTOS DE DEPARTAMENTO


}); 

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
    var form_comandos_oper = '<div class="row" data-id = "sec-'+num_secuencia+'-comando-oper-'+num+'"><!-- inner de Comandos y Operaciones --> <!-- Comando --> <div class = "col-md-3"> <input type="text" name="comando-'+num_secuencia+'-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Comando"data-toggle = "tooltip" data-original-title = "Comando"> </div><!-- /col-3: Comando --> <!-- Operación --> <div class = "col-md-3"> <input type="text" name="operacion-'+num_secuencia+'-'+num+'" data-secuencia = "'+num+'"class="form-control"  required="required"  placeholder = "Operación"data-toggle = "tooltip" data-original-title = "Operación a ejecutar"> </div><!-- /col-3: Operación --> <div class = "col-md-6"></div><!-- Vacío--> <!-- /row: Comandos y Operaciones --> </div>';

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
        
    if(num > 1 ){
        //Verificando si es Actualizar
        // para así añadirlo temporalmente para su posterior actualización
        oper = $('form#fr-nuevo-servicio').attr('data-oper');
        if(oper == 'actualizar'){
            db_id = $('div[data-id=sec-'+num_secuencia+'-comando-oper-'+num+']').attr('data-db-id');
            
            if(!(typeof(db_id) === "undefined")){//verifcando que no sea un comando/operación nuevo
                $('div#list-id-comando-oper').append('<span id = "'+db_id+'"></span>');
            }    
        }

        //Eliminando Visualmente
        $('div[data-id=sec-'+num_secuencia+'-comando-oper-'+num+']').remove();
        $('label#num-filas-comandos-oper-'+num_secuencia).attr('data-num-filas',num-1);//Actualizando el contador 
    }
}
