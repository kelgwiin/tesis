<?php

class Datos_basicos_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('utilities/utilities_model');
    }
    /**
     * Del maestro de unidad de medida obtiene la info que coincida con 
     * la categoría dada.
     * @param  Integer $id_categoria ID de la categoría asociado
     * @return Array  De forma: 
     * array('ma_unidad_medida_id' => Integer,
     *       'abrev_nombre' => String,
     *       'valor_nivel' => Integer 
     * )
     */
    public function unidades_medida_capacidad($id_categoria){
    	$sql = 'SELECT ma_unidad_medida_id,abrev_nombre, valor_nivel '.
    	 		' FROM ma_unidad_medida ' .
    	 		' WHERE ma_categoria_id = ?; ';

        $q = $this->db->query($sql, array($id_categoria));
        if($q->num_rows() > 0){
            $rows = $q->result_array();    
        }else{
            $rows = NULL;
        }
    	return $rows;
    }

     /**
     * Obtiene todos los componentes de ti que no hayan sido borrados
     * y que estén en activos (en estado 'ON').
     * 
     * 
     * @param String $target Una cadena que indica si se aplicará un filtro
     * en la consulta. Dominio {all,nombre,categoria}
     * @param String $data_target Dato de comparación del nombre o categoria.
     * Si es all este campo se deja vacío.
     * 
     * @return Array Contiene la siguiente forma:
     * 
     *     Array(
     *         'list_comp_ti' => Array *,
     *         'num_rows_comp_ti' => Integer
     *     )
     * 
     * [*] Cada ítem contiene la siguiente forma:
     *     Array(
     *      'componente_ti_id'=> Integer,
     *      'ma_unidad_medida_id' => Integer,
     *      'fecha_compra' => String,
     *      'fecha_elaboracion'=> String,
     *      'fecha_creacion' => String,
     *      'tiempo_vida' => Integer,
     *      'unidad_tiempo_vida' => AA|MM|DD|NA,
     *      'precio' => Double,
     *      'capacidad' => Double,
     *      'nombre' => String,
     *      'descripcion' => String,
     *      'cantidad' => Integer,
     *      'cantidad_disponible' => Integer,
     *      'tipo_asignacion' => MULT|UNI,
     *      'activa' => ON|OFF,
     *      'borrado' => Boolean,
     *      
     *      'abrev_nombre' => String
     *      'nom_categ' => String,
     *      'icono_fa' => String
     *     )
     */
    public function all_componentes_ti($target, $data_target = null){
        $sql_comp_ti = "";

        switch ($target) {
            case 'all':
                $sql_comp_ti = "SELECT  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
                                FROM componente_ti as comp join (ma_categoria as categ, ma_unidad_medida as uni) 
                                ON (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
                                WHERE borrado = false and activa = 'ON'
                                ORDER BY comp.componente_ti_id;";
                                
                break;
            case 'nombre':
                $sql_comp_ti = "SELECT  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
                                FROM componente_ti as comp join (ma_categoria as categ, ma_unidad_medida as uni) 
                                ON (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
                                WHERE borrado = false and activa = 'ON' AND comp.nombre LIKE '%".$data_target."%'
                                ORDER BY comp.componente_ti_id;";
                break;
            case 'categoria':
                $sql_comp_ti = "SELECT  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa 
                                FROM componente_ti as comp join (ma_unidad_medida as uni,ma_categoria as categ)
                                ON (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id AND uni.ma_categoria_id = categ.ma_categoria_id) 
                                WHERE borrado = false and activa = 'ON' AND categ.nombre like '%".$data_target."%' 
                                ORDER BY comp.componente_ti_id;";
                break;
        }
        
        $q = $this->db->query($sql_comp_ti);
        $list_comp_ti = $q->result_array();
        $num_comp_ti = $q->num_rows();//Número de filas

        $resp  = array(
            'list_comp_ti' => $list_comp_ti,
            'num_rows_comp_ti'=>$num_comp_ti
        );
        return $resp;
    }
    /**
     * Permite obtener la información de la categoría y la
     * unidad de medida a partir de el ID de unidad de medida
     * @param  Integer $id_unidad_medida ID de la unidad de medida
     * @return Array Contiene la info de la categoria y la unidad de medida
     * con el siguiente formato:
     * Array(
     *     'nomcateg' => String,
     *     'abrev_unidad' =>String,
     *     'id' => Integer, // ID de la categoría    
     *     'basecateg' => Integer // Valor de base de la categoría.
     * )
     */
    public function info_categoria($id_unidad_medida){
        $sql = "SELECT abrev_nombre, ma_categoria_id  
                FROM ma_unidad_medida 
                WHERE ma_unidad_medida_id = '".$id_unidad_medida."';";

        $q = $this->db->query($sql);
        $rs = $q->first_row('array');

        $abrev_unidad = $rs['abrev_nombre'];
        $id_categ = $rs['ma_categoria_id'];

        $sql = "SELECT nombre, valor_base as base  
                FROM ma_categoria
                WHERE ma_categoria_id = '".$id_categ."';";
        $q = $this->db->query($sql);
        $rs = $q->first_row('array');
        $nomcateg = $rs['nombre'];
        $base = $rs['base'];

        return array('nomcateg' => $nomcateg, 'abrev_unidad'=>$abrev_unidad,
            'id' =>$id_categ, 'basecateg' => $base);
    }
    /**
     * Obtiene todos los ids y nombres de los componentes de ti 
     * que se encuentran activos y disponibles según el campo de disponibilidad.
     * 
     * Si se pasa el parámetro de $dpto_id entonces se filtran los que no 
     * pertenezcan ya al dpto.
     * 
     * @param Integer $dpto_id ID asociado al departamento.
     * @return Array Una array asociativo del tipo:
     * Array(
     *     'id' => Integer,
     *     'nombre'=>String,
     *     'cant_disp'=>Integer
     * )
     */
    public function ids_nombres_comp_ti($dpto_id=NULL){
        if(!isset($dpto_id)){
            $sql = "SELECT componente_ti_id as id,nombre, cantidad_disponible as cant_disp
                    FROM componente_ti
                    WHERE borrado = false AND activa = 'ON' AND (cantidad_disponible > 0  OR tipo_asignacion = 'MULT');";
        }else{
            $sql = "SELECT comp.componente_ti_id as id,comp.nombre, comp.cantidad_disponible as cant_disp
                    FROM componente_ti as comp
                    WHERE borrado = false AND activa = 'ON' AND (cantidad_disponible > 0
                        OR tipo_asignacion = 'MULT')  AND comp.componente_ti_id not in (
                        
                        SELECT comp.componente_ti_id as id 
                        FROM componente_ti as comp JOIN (inventario_ti as iv, inventario_componente_ti as icti)
                            ON (iv.departamento_id = '".$dpto_id."' AND icti.inventario_ti_id = iv.inventario_ti_id AND 
                            comp.componente_ti_id = icti.componente_ti_id)
                    );";
        }

        
        $q = $this->db->query($sql);
        return $q->result_array(); 
    }

    /**
     * Agrega el dpto en conjunto con los componentes asociados
     * @param Array $data Tiene la siguiente forma:
     * Array(  'nombre' => String,
     *         'descripcion' => String,
     *         'icono_fa' => String,
     *         'list_comp_ti' => array (ids de comp ti)
     * )
     */
    public function add_dpto_comp_ti($data){
        $st_dpto = false;
        $st_inv = false;
        $st_inv_comp = false;

        //Agregando el dpto
        $data_dpto = array('nombre' => $data['nombre'], 
                'descripcion' => $data['descripcion'],
                'icono_fa'=>$data['icono_fa']);
        $st_dpto= $this->utilities_model->add($data_dpto,'departamento');
        
        //Agregando el inventario
        $date = date('Y-m-d H:i:s',now());
        $id_dpto = $this->db->insert_id();//id del dpto insertado
        $data_inv = array('departamento_id' => $id_dpto, 'fecha_creacion' => $date);
        $st_inv = $this->utilities_model->add($data_inv,'inventario_ti');

        //Agregando los Componentes de TI & Actualizando cant. disponible (interrelación)
        $id_inv = $this->db->insert_id();//id del inv. insertado
        foreach ($data['list_comp_ti'] as $r) {
            $data_comp = array('inventario_ti_id'=>$id_inv, 'componente_ti_id'=>$r['id']);
            $this->utilities_model->add($data_comp,'inventario_componente_ti');

            //actualizando la cantidad disponible
            $sql_cant_disp =   "UPDATE componente_ti 
                                SET cantidad_disponible = ".($r['cant_disp']-1)."
                                WHERE tipo_asignacion='UNI' AND componente_ti_id = '".$r['id']."';";
            $st_inv_comp = $this->db->query($sql_cant_disp);
        }
        return $st_dpto && $st_inv && $st_inv_comp;
    }
    /**
     * Retorna el conjunto de departamento con los componentes de ti asociados
     * @param String $filter_by_name Filtra por nombre los dptos pero por defecto 
     * está en vacío.
     * @return Array array ('data' => array de array *,
     *         'total_rows' => Integer)
     * 
     * Es una array de dos campos [data, total rows]. El campo de "data"
     * contien una clave de tipo entero y en cada uno posee dos array como se 
     * describen abajo.
     * 
     *        [*] Array('dpto' => array de dpto **
     *               'list_comp_ti' => array de comp de ti ***)
     * 
     * [**] Cada ítem contiene la siguiente forma
     * 
     * Array(
     *   'departamento_id' => Integer,
     *   'nombre' => String,
     *   'icono_fa' => String,
     *   'descripcion'=> String,
     *   'borrado' =>boolean)
     * 
     *  [***] Cada ítem contiene la siguiente forma
     * 
     * Array(
     *  'nombre' => String,
     *  'id' => Integer
     * )
     */
    public function all_dpto($filter_by_name=NULL){
        //Departamentos
        if(!isset($filter_by_name)){
            $sql_dpto = "SELECT departamento_id, nombre, icono_fa, descripcion 
                        FROM departamento 
                        WHERE borrado = false 
                        ORDER BY departamento_id;
                        ";
        }else{
            $sql_dpto = "SELECT departamento_id, nombre, icono_fa, descripcion 
                        FROM departamento 
                        WHERE borrado = false AND nombre LIKE '%".$filter_by_name."%' 
                        ORDER BY departamento_id; ";
        }
        
        $q = $this->db->query($sql_dpto);
        $list_dpto = $q->result_array();

        //Inventario - Inventario_Comp_TI
        //se obtienen los componente a partir del id de la interrelación
        $resp = array();
        $total_rows = $q->num_rows();
        $i = 0;
        foreach ($list_dpto as $row) {
            $id_dpto = $row['departamento_id'];

            //NOTA: para que sólo tome el inventario más reciente
            //ya que un dpto puede tener más de un inventario
            $sql_inv = "SELECT inventario_ti_id AS id, fecha_creacion as f
                        FROM inventario_ti
                        WHERE departamento_id = '".$id_dpto."'
                        ORDER BY fecha_creacion DESC;";
            $q = $this->db->query($sql_inv);
            $inv = $q->first_row('array');

            //Consultando los componentes
            $sql_icti = "SELECT comp.nombre, comp.componente_ti_id as id
                        FROM inventario_componente_ti AS icti join 
                        componente_ti AS comp 
                        ON (icti.componente_ti_id = comp.componente_ti_id AND 
                            icti.inventario_ti_id = '".$inv['id']."');";
            $q_cti = $this->db->query($sql_icti);

            $row['fecha_creacion'] = $inv['f'];//Fecha de creación del último inventario
            $resp[$i]['dpto'] = $row;            
            $resp[$i]['list_comp_ti'] = $q_cti->result_array();
            $i+=1;       
        }

        return array('data' => $resp, 'total_rows'=>$total_rows);
    }//end-of: function all_dpto

    /**
     * Se obtienen los componentes de TI asignados a un dpto
     * @param  Integer $id_dpto ID del departamento.
     * @return Array Una array asociativo del tipo:
     * array(
     *     'id' => Integer,
     *     'nombre'=>String,
     *     'cant_disp'=>Integer
     * )
     */
    public function comp_ti_asig_dpto($id_dpto){
        //NOTA: para que sólo tome el inventario más reciente
        //ya que un dpto puede tener más de un inventario
        $sql_inv = "SELECT inventario_ti_id AS id
                    FROM inventario_ti
                    WHERE departamento_id = '".$id_dpto."'
                    ORDER BY fecha_creacion DESC;";
        $q = $this->db->query($sql_inv);
        $inv = $q->first_row('array');

        //Consultando los componentes
        $sql_icti = "SELECT comp.nombre, comp.componente_ti_id as id, comp.cantidad_disponible as cant_disp
                    FROM inventario_componente_ti AS icti join 
                    componente_ti AS comp 
                    ON (icti.componente_ti_id = comp.componente_ti_id AND 
                        icti.inventario_ti_id = '".$inv['id']."');";
        $q_cti = $this->db->query($sql_icti);   

        return $q_cti->result_array();
    }
    /**
     * Actualiza la información del dpto. En el caso del inventario lo que hace
     * es crear uno nuevo cada vez que se realiza alguna modificación.
     * @param  Array $data Tiene la siguiente forma:
     *     array('nombre' => String,
     *           'descripcion'=>String,
     *           'icono_fa'=>String,
     *           'dpto_id'=>Integer,
     *           'list_comp_ti'=>array de comp de ti *)
     * 
     * [*] Cada entrada contiene la siguiente forma:
     *     array('id'=>Integer,
     *           'cant_disp'=>Integer )
     * @return Boolean TRUE|FALSE Dependiendo si actualiza o no con éxito.
     */
    public function update_dpto($data){
        //Actualizando la información del dpto.
        $info_dpto = array('nombre'=>$data['nombre'],
            'descripcion'=>$data['descripcion'],
            'icono_fa'=>$data['icono_fa']);
        $st_dpto = $this->utilities_model->update('departamento',
            array('departamento_id'=>$data['dpto_id']),$info_dpto);

        //:: Creando el nuevo inventario ::
        //Agregando el inventario
        $dpto_id = $data['dpto_id'];
        $date = date('Y-m-d H:i:s',now());
        $data_inv = array('departamento_id' => $dpto_id, 'fecha_creacion' => $date);
        $st_inv = $this->utilities_model->add($data_inv,'inventario_ti');

        //Agregando los Componentes de TI & Actualizando cant. disponible (interrelación)
        $id_inv = $this->db->insert_id();//id del inv. insertado
        foreach ($data['list_comp_ti'] as $r) {
            $data_comp = array('inventario_ti_id'=>$id_inv, 'componente_ti_id'=>$r['id']);
            $this->utilities_model->add($data_comp,'inventario_componente_ti');

            //actualizando la cantidad disponible
            $sql_cant_disp =   "UPDATE componente_ti 
                                SET cantidad_disponible = ".($r['cant_disp']-1)."
                                WHERE tipo_asignacion='UNI' AND componente_ti_id = '".$r['id']."';";
            $st_inv_comp = $this->db->query($sql_cant_disp);
        }
        return $st_dpto && $st_inv && $st_inv_comp;
    }
    /**
     * Guarda el servicio en conjunto con: los Cronogramas de Ejecución, 
     * los Umbrales y los Procesos asociados.
     * 
     * @param Array $data Contiene la siguiente forma.
     *    Array(
     *    'nombre'=> String,
     *    'tipo_servicio'=>String,
     *    'genera_ingresos'=>Boolean,
     *    'monto'=>Integer,
     *    'descripcion'=>String,
     *    'list_cronogramas'=> Array *,
     *    'list_umbrales'=> Array **,
     *    'list_procesos'=> Array ***
     * )   
     * 
     * [*] Cada item es de la siguiente forma:
     *     Array(
     *         'nombre'=>String,
     *         'horario_desde'=>String,
     *         'horaio_hasta'=>String,
     *         'list_comandos_operaciones'=>Array('comando' => String,'operacion'=>String)
     * )
     * 
     * [**] Cada item es de la siguiente forma:
     *     Array(
     *         'descripcion'=>String,
     *         'tiempo_acordado'=>String,
     *         'medida_tiempo'=>String,
     *         'valor'=>Integer
     *     )
     * 
     * [***] Cada item es de la siguiente forma:
     *     Array(
     *         'nombre'=>String,
     *         'descripcion'=>String,
     *         'tipo'=>String
     *     )
     */
    public function add_servicio($data){
        //Agregando el servicio
        $date = date('Y-m-d H:i:s',now());
        $data_serv = array(
            'nombre'=>$data['nombre'],
            'descripcion'=>$data['descripcion'],
            'fecha_creacion'=>$date,
            'tipo'=>$data['tipo_servicio'],
            'genera_ingresos'=>($data['genera_ingresos']=='true'?true:false),
            'cantidad_ingresos'=>$data['monto']
        );
        $st_servicio = $this->utilities_model->add($data_serv,'servicio');
        $serv_id = $this->db->insert_id();//id del último campo insertado

        //Cronogramas de Ejecución
        foreach ($data['list_cronogramas_ejecucion'] as $item) {
            //Tarea (Cronograma)
            $data_tarea = array(
                'servicio_id'=>$serv_id,
                'descripcion'=>$item['descripcion'],
                'horario_desde'=>$item['horario_desde'],
                'horario_hasta'=>$item['horario_hasta']
            );
            $st_tarea = $this->utilities_model->add($data_tarea,'tarea');
            $tarea_id = $this->db->insert_id();//id de la tarea insertada

            //Tarea Detalle (Comandos & Operaciones )
            foreach ($item['list_comandos_operaciones'] as $item_co) {
                $data_tdet = array(
                    'tarea_id'=>$tarea_id,
                    'operacion'=>$item_co['operacion'],
                    'comando'=>$item_co['comando']
                );
                $this->utilities_model->add($data_tdet,'tarea_detalle');
            }
        }//end of: foreach Cronogramas de Ejecución

        //Umbrales
        foreach ($data['list_umbrales'] as $item) {
            $data_umb = array(
                'servicio_id'=>$serv_id,
                'descripcion'=>$item['descripcion'],
                'tiempo_acordado'=>$item['tiempo_acordado'],
                'medida'=>$item['medida_tiempo'],
                'valor'=>$item['valor']
            );
            $st_umb = $this->utilities_model->add($data_umb,'umbral');
        }

        //Procesos (servicio_proceso)
        foreach ($data['list_procesos'] as $item) {
            $data_pro = array (
                'servicio_id'=>$serv_id,
                'nombre'=>$item['nombre'],
                'descripcion'=>$item['descripcion'],
                'tipo'=>$item['tipo']
            );
            $st_pro = $this->utilities_model->add($data_pro,'servicio_proceso');
        }

        return $st_servicio && $st_tarea && $st_umb && $st_pro;
    }
    /**
     * Devuelve una lista con los nombre de procesos repetidos en la tabla 'servicio_proceso'
     * @param  Array $l_nom Lista de los nombre de los procesos a verificar.
     * @return Array        Lista de los nombres repetidos.
     */
    public function nombre_procesos_repetidos($l_nom){
        $sql = 'SELECT nombre
                FROM servicio_proceso
                WHERE nombre in ';

        $data_where = '(';
        $num_vals = count($l_nom);
        for ($i=0; $i < $num_vals; $i++) { 
            $data_where .= "?,";
        }
        $lon = strlen($data_where);
        $data_where[$lon-1] = ')';
        
        $sql .= $data_where . ' ;';
        
        $q = $this->db->query($sql,$l_nom);
        
        if($q->num_rows() > 0 ){
            $r = $q->result_array();
            $r_procesado = array();
            foreach ($r as $v) {
                $r_procesado[] = $v['nombre'];
            }
            return $r_procesado;
        }else{
            return NULL;    
        }

    }

    /**
     * Obtiene los nombres de procesos repetidos que no coincidad los ids dados.
     * @param  Array $l Un Array que posee la siguiente estructura:
     *         Array(
     *            nombre: String,
     *            servicio_proceso_id: Integer   
     *         )
     * @return Array Conjunto de nombres de procesos repetidos
     */
    public function nombre_procesos_repetidos_act($l){
        $sql = 'SELECT nombre
                FROM servicio_proceso
                WHERE servicio_proceso_id NOT IN ';
        
        $in_proceso_id = ' (';
        $in_nombre = ' AND nombre IN (';

        $num_vals = count($l);
        $l_id = array();
        $l_nombre = array();
        for ($i=0; $i < $num_vals; $i++) { 
            $in_nombre .= "?,";
            $in_proceso_id .= "?,";
            $l_id[] = $l[$i]['servicio_proceso_id'];
            $l_nombre[] = $l[$i]['nombre'];
        }
        $l_values = array_merge($l_id,$l_nombre);

        //Elimando la última coma de los nombres
        $lon = strlen($in_nombre);
        $in_nombre[$lon-1] = ')';
        
        //Elimnando la última coma de los ids de los procesos
        $lon = strlen($in_proceso_id);
        $in_proceso_id[$lon-1] = ')';
        $in_proceso_id .= " ";
        

        $sql .= $in_proceso_id . $in_nombre .  ' ;';
        
        $q = $this->db->query($sql,$l_values);
        
        if($q->num_rows() > 0 ){
            $r = $q->result_array();
            $r_procesado = array();
            foreach ($r as $v) {
                $r_procesado[] = $v['nombre'];
            }
            return $r_procesado;
        }else{
            return NULL;    
        }

    }

    /**
     * Obtiene todos los Servicios en conjunto con: los Cronogramas de Ejecución (tareas),
     * Umbrales y Procesos.
     * 
     * @param  Array   $data_filtro Posee la siguiente forma
     *      Array(
     *          'accion' => todos|filtrar,
     *          'operacion'=>todos|nombre|USR|SYS,
     *          'genera_ingresos'=> 0|1,
     *          'info' => String        
     *      )
     * @return Array Un campo 'total_rows' y un Array donde cada entrada 
     * contiene la siguiente forma:
     *      Array(
     *          'servicio_id' => Integer,
     *          'nombre'=>String,
     *          'descripcion'=>String,
     *          'fecha_creacion'=>String,
     *          'tipo'=>SYS|USR,
     *          'genera_ingresos'=>Boolean,
     *          'list_umbral'=>Array *,
     *          'list_tarea'=>Array **,
     *          'list_proceso'=>Array ***,
     *      )
     * [*] Cada ítem contiene la siguiente forma
     *     Array(
     *         'umbral_id' => Integer,
     *         'descripcion' => String,
     *         'tiempo_acordado'=>Integer,
     *         'medida'=>hh|mm|ss,
     *         'valor'=>Integer
     *     )
     * 
     * [**] Cada ítem contiene la siguiente forma
     *     Array(
     *         'tarea_id' => Integer,
     *         'descripcion' => String,
     *         'horario_desde' => String,
     *         'horario_hasta' => String,
     *         'list_tarea_detalle' => Array (Array('tarea_detalle_id' => int,'operacion'=> String, 'comando'=> String), ... , )
     *     )
     *
     * [***] Cada ítem contiene la siguiente forma
     *     Array (
     *         'servicio_proceso_id' => Integer,
     *         'nombre' => String
     *         'tipo' => String,
     *         'descripcion' => String 
     *     )
     */
    public function all_servicio($data_filtro=NULL){
        if(!isset($data_filtro)){// Si son las opciones de filtrado
            $sql = 'SELECT servicio_id, nombre, descripcion, fecha_creacion, 
                        tipo, genera_ingresos, cantidad_ingresos
                    FROM servicio
                    WHERE borrado = false 
                    ORDER BY servicio_id ;';
        }else{
            

            switch ($data_filtro['operacion']) {
                case 'by_ingresos':
                    $genera_in = $data_filtro['genera_ingresos'];
                    $sql = 'SELECT servicio_id, nombre, descripcion, fecha_creacion, 
                                tipo, genera_ingresos, cantidad_ingresos
                            FROM servicio
                            WHERE borrado = false AND genera_ingresos = '.$genera_in.'
                            ORDER BY servicio_id ;';

                    break;
                
                //Filtrando los servicios por nombre
                case 'nombre':
                    $filter_by_name = $data_filtro['info'];
                    $sql = "SELECT servicio_id, nombre, descripcion, fecha_creacion, 
                                tipo, genera_ingresos, cantidad_ingresos
                            FROM servicio
                            WHERE borrado = false AND nombre LIKE '%".$filter_by_name."%' 
                            ORDER BY servicio_id ;";                    
                    break;

                default: // USR | SYS
                    $tipo = $data_filtro['operacion'];
                    $sql = "SELECT servicio_id, nombre, descripcion, fecha_creacion, 
                                tipo, genera_ingresos, cantidad_ingresos
                            FROM servicio
                            WHERE borrado = false AND tipo = '".$tipo."'
                            ORDER BY servicio_id ;";
                    break;
            }

        }

        $q = $this->db->query($sql);
        $servicios = $q->result_array();
        $idx = 0;
        $resp = array();
        
        if($q->num_rows() == 0){
            return array('total_rows'=> 0, 'data' => NULL);
        }

        foreach ($servicios as $row) {
            //Cronogramas (tarea)
            $list_tarea = array();
            
            $sql_tarea = 'SELECT *
                        FROM tarea
                        WHERE servicio_id = '.$row['servicio_id'].' AND borrado = false ;';

            $q_tarea = $this->db->query($sql_tarea);
            $tareas = $q_tarea->result_array();

            // Comando & Operaciones (tarea_detalle)
            $it = 0;
            foreach ($tareas as $t) {
                $sql_tdet = 'SELECT tarea_detalle_id, comando, operacion
                            FROM tarea_detalle
                            WHERE borrado = false AND tarea_id = '.$t['tarea_id'].' ;';
                $q_tdet  = $this->db->query($sql_tdet);
                $list_tarea[$it] = $t;
                $list_tarea[$it]['list_tarea_detalle'] = $q_tdet->result_array();
                $it+=1;
            }

            //Umbrales (umbral)
            $sql_umb = 'SELECT umbral_id, descripcion, tiempo_acordado, medida, valor
                        FROM umbral 
                        WHERE borrado = false and servicio_id = '.$row['servicio_id'].';';
            $q_umb = $this->db->query($sql_umb);

            //Procesos (servicio_proceso)
            $sql_pro = 'SELECT servicio_proceso_id, nombre, tipo, descripcion
                        FROM servicio_proceso
                        WHERE borrado = false AND servicio_id = '.$row['servicio_id'].' ;';
            $q_pro = $this->db->query($sql_pro);

            $resp[$idx] = $row;
            $resp[$idx]['list_tarea'] = $list_tarea;
            $resp[$idx]['list_umbral'] = $q_umb->result_array();
            $resp[$idx]['list_proceso'] = $q_pro->result_array();

            $idx+=1;
        }
        return array('data'=> $resp,'total_rows'=>$q->num_rows());
    }

    /**
     * Obtiene la información del servicio en conjunto con la info asociada a 
     * siguientes tablas 'tarea', 'tarea_detalle', 'umbral' y 'servicio_proceso'.
     * 
     * Este método es usado para obtener la información del servicio que se desea actualizar
     * @param  Integer $servicio_id ID del servicio
     * @return Array   El array posee el siguiente el formato:
     *        Array(
     *            'servicio' => Array *,
     *            'list_tarea'=> Array **,
     *            'list_umbral'=> Array ***,
     *            'list_proceso'=>Array ****
     *        )
     * NOTA: Para ver los detalles de los arrays internos puede ver la especificación
     * del método 'all_servicio'.
     *     
     */
    public function servicio_info_by_id($servicio_id){
        //Servicio
        $s = $this->utilities_model->row_by_id('servicio','servicio_id',$servicio_id);

        //Tareas
        $sql_t = 'SELECT * 
                  FROM tarea
                  WHERE borrado = false AND servicio_id =  '.$s['servicio_id'].' ;';
        $q_t = $this->db->query($sql_t);
        $tareas = $q_t->result_array();

        $list_tarea = array();
        $it = 0;
        foreach ($tareas as $t) {
            $sql_tdet = 'SELECT tarea_detalle_id, operacion, comando
                        FROM tarea_detalle
                        WHERE borrado = false AND tarea_id = '.$t['tarea_id'].';';
            $q_tdet = $this->db->query($sql_tdet);

            $list_tarea[$it] = $t;
            $list_tarea[$it]['list_tarea_detalle'] = $q_tdet->result_array();
            $it += 1;
        }

        //Umbrales (umbral)
        $sql_umb = 'SELECT umbral_id, descripcion, tiempo_acordado, medida, valor
                    FROM umbral 
                    WHERE borrado = false AND servicio_id = '.$s['servicio_id'].';';
        $q_umb = $this->db->query($sql_umb);

        //Procesos (servicio_proceso)
        $sql_pro = 'SELECT servicio_proceso_id, nombre, tipo, descripcion
                    FROM servicio_proceso
                    WHERE borrado = false AND servicio_id = '.$s['servicio_id'].' ;';
        $q_pro = $this->db->query($sql_pro);

        $resp = array();
        $resp['servicio'] = $s;
        $resp['list_tarea'] = $list_tarea;
        $resp['list_umbral'] = $q_umb->result_array();
        $resp['list_proceso'] = $q_pro->result_array();

        return $resp;
    }
    /**
     * Actualiza el servicio  y elimina lógicamente los elementos necesarios.
     * @param  Array $p Contiene la siguiente estructura
     *         Array(
     *             servicio_id: Integer
     *             nombre: String
     *             tipo_servicio: USR|SYS
     *             genera_ingresos: 0|1
     *             monto: Integer
     *             descripcion: String
     *             list_cronogramas_ejecucion_nuevo: Array
     *             list_cronogramas_ejecucion_act: Array
     *             list_umbrales_nuevo: Array
     *             list_umbrales_act: Array
     *             list_procesos_nuevo: Array
     *             list_procesos_act: Array
     *             eliminados_ids: Array
     *         
     * )
     * @return Boolean TRUE|FALSE Dependiendo de se actualiza o no con éxito los campos.
     */
    public function update_servicio($data){
        $st_tarea = TRUE;
        $st_umb = TRUE;
        $st_pro = TRUE;
        
        //Servicio
        $p_servicio = array(
            'nombre'=>$data['nombre'],
            'tipo'=>$data['tipo_servicio'],
            'genera_ingresos'=>($data['genera_ingresos']=='true'?true:false),
            'cantidad_ingresos'=>$data['cantidad_ingresos'],
            'descripcion'=>$data['descripcion']
            );
        $st_servicio = $this->utilities_model->update('servicio',
            array('servicio_id'=>$data['servicio_id']),
            $p_servicio);

        //Tareas (Cronogramas de Ejecución) :: NUEVO
        if(isset($data['list_cronogramas_ejecucion_nuevo']) && $data['list_cronogramas_ejecucion_nuevo'] != NULL ){//Si hay algún Cronograma Nuevo
            foreach ($data['list_cronogramas_ejecucion_nuevo'] as $item) {
                //Tarea (Cronograma)
                $data_tarea = array(
                    'servicio_id'=>$data['servicio_id'],
                    'descripcion'=>$item['descripcion'],
                    'horario_desde'=>$item['horario_desde'],
                    'horario_hasta'=>$item['horario_hasta']
                );
                $st_tarea = $this->utilities_model->add($data_tarea,'tarea');
                $tarea_id = $this->db->insert_id();//id de la tarea insertada

                //Tarea Detalle (Comandos & Operaciones )
                foreach ($item['list_comandos_operaciones'] as $item_co) {
                    $data_tdet = array(
                        'tarea_id'=>$tarea_id,
                        'operacion'=>$item_co['operacion'],
                        'comando'=>$item_co['comando']
                    );
                    $this->utilities_model->add($data_tdet,'tarea_detalle');
                }
            }//end of: foreach Cronogramas de Ejecución
        }//end of: if Cronogramas de Ejecución - NUEVO
        
        //Tareas (Cronogramas de Ejecución) :: ACTUALIZAR
        foreach ($data['list_cronogramas_ejecucion_act'] as $item) {
            //Tarea (Cronograma)
            $data_tarea = array(
                'descripcion'=>$item['descripcion'],
                'horario_desde'=>$item['horario_desde'],
                'horario_hasta'=>$item['horario_hasta']
            );
            $tarea_id = $item['id'];

            $st_tarea_act = $this->utilities_model->
                update('tarea',array('tarea_id'=>$tarea_id),$data_tarea);

            //Tarea Detalle (Comandos & Operaciones ) :: NUEVO
            if(isset($item['list_comandos_operaciones_nuevo']) && $item['list_comandos_operaciones_nuevo'] != NULL ){
                foreach ($item['list_comandos_operaciones_nuevo'] as $item_co) {
                    $data_tdet = array(
                        'tarea_id'=>$tarea_id,
                        'operacion'=>$item_co['operacion'],
                        'comando'=>$item_co['comando']
                    );
                    $this->utilities_model->add($data_tdet,'tarea_detalle');
                }     
            }//end of: if Tarea Detalle NUEVO

            //Tarea Detalle (Comandos & Operaciones ) :: ACTUALIZAR
            foreach ($item['list_comandos_operaciones_act'] as $item_co) {
                $data_tdet = array(
                    //No es necesario actualizar el campo 'tarea_id'
                    'operacion'=>$item_co['operacion'],
                    'comando'=>$item_co['comando']
                );
                $tarea_detalle_id = $item_co['id'];
                $this->utilities_model->update('tarea_detalle',
                    array('tarea_detalle_id'=>$tarea_detalle_id), $data_tdet);
            }//end of: foreach Tarea Detalle ACTUALIZAR
        }//end of: foreach Cronogramas de Ejecución - ACTUALIZAR

        //Umbrales - NUEVO
        if(isset($data['list_umbrales_nuevo']) && $data['list_umbrales_nuevo'] != NULL){//Si hay algún umbral nuevo
            foreach ($data['list_umbrales_nuevo'] as $item) {
                $data_umb = array(
                    'servicio_id'=>$data['servicio_id'],
                    'descripcion'=>$item['descripcion'],
                    'tiempo_acordado'=>$item['tiempo_acordado'],
                    'medida'=>$item['medida_tiempo'],
                    'valor'=>$item['valor']
                );
                $st_umb = $this->utilities_model->add($data_umb,'umbral');    
            }
        }//end of: if Umbrales - NUEVO

        //Umbrales - ACTUALIZAR
        foreach ($data['list_umbrales_act'] as $item) {
            $data_umb = array(
                //No es necesario actualizar el campo 'servicio_id'
                'descripcion'=>$item['descripcion'],
                'tiempo_acordado'=>$item['tiempo_acordado'],
                'medida'=>$item['medida_tiempo'],
                'valor'=>$item['valor']
            );
            $umbral_id = $item['id'];

            $st_umb_act = $this->utilities_model->update('umbral',
                array('umbral_id'=>$umbral_id), $data_umb);
        }//end of: foreach Umbrales - ACTUALIZAR
        

        //Procesos (servicio_proceso) - NUEVO
        if(isset($data['list_procesos_nuevo']) && $data['list_procesos_nuevo'] != NULL){
            foreach ($data['list_procesos_nuevo'] as $item) {
                $data_pro = array (
                    'servicio_id'=>$data['servicio_id'],
                    'nombre'=>$item['nombre'],
                    'descripcion'=>$item['descripcion'],
                    'tipo'=>$item['tipo']
                );
                $st_pro = $this->utilities_model->add($data_pro,'servicio_proceso');
            }
        }//end of: if Proceso - NUEVO

        //Procesos (servicio_proceso) - ACTUALIZAR
        foreach ($data['list_procesos_act'] as $item) {
            $data_pro = array (
                //No es necesario actualizar el campo 'servicio_id'
                'nombre'=>$item['nombre'],
                'descripcion'=>$item['descripcion'],
                'tipo'=>$item['tipo']
            );
            $sp_id = $item['id'];//servicio_proceso_id

            $st_pro_act = $this->utilities_model->update('servicio_proceso',
                array('servicio_proceso_id'=>$sp_id), $data_pro);
        }

        //Eliminando los campos dados sus IDs
        //:: Tarea (Cronogramas)
        if(isset($data['eliminados_ids']['tareas']) && $data['eliminados_ids']['tareas'] != NULL){
            foreach ($data['eliminados_ids']['tareas'] as $id) {
                //Tarea
                $data = array('borrado'=>TRUE);
                $this->utilities_model->update('tarea',array('tarea_id'=>$id),$data);
                
                //Tarea Detalle
                $this->utilities_model->update('tarea_detalle',array('tarea_id'=>$id),$data);
            }
        }
        //:: Tarea Detalle (Comandos & Operaciones)
        if(isset($data['eliminados_ids']['tarea_detalle']) && $data['eliminados_ids']['tarea_detalle'] != NULL){
            foreach ($data['eliminados_ids']['tarea_detalle'] as $id) {
                $data = array('borrado'=>TRUE);
                $this->utilities_model->update('tarea_detalle',array('tarea_detalle_id'=>$id),$data);
            }
        }

        //:: Umbral
        if(isset($data['eliminados_ids']['umbral']) && $data['eliminados_ids']['umbral'] != NULL){
            foreach ($data['eliminados_ids']['umbral'] as $id) {
                $data = array('borrado'=>TRUE);
                $this->utilities_model->update('umbral',array('umbral_id'=>$id),$data);
            }
        }

         //:: Proceso
        if(isset($data['eliminados_ids']['proceso']) && $data['eliminados_ids']['proceso'] != NULL){
            foreach ($data['eliminados_ids']['proceso'] as $id) {
                $data = array('borrado'=>TRUE);
                $this->utilities_model->update('servicio_proceso',array('servicio_proceso_id'=>$id),$data);   
            }
        }
        
        //Fin de Eliminanción

        return $st_servicio && $st_tarea && $st_tarea_act && $st_umb && $st_umb_act && 
        $st_pro && $st_pro_act;
    }

} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php