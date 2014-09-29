<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Disponibilidad extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->model('disponibilidad_model');


		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
    }
	
	public function index()
	{
		//Cargando la lista de menus del sidebar genérica (se puede puede personalizar, ver ejemplo
		//en el controlador de modules/utilities/utils.php) 
		$l = $this->utils->list_sidebar();
		$this->utils->template($l,'Disponibilidad/Main','','Gestión de Disponibilidad',' Title Tab',
			'two_level');
	}
	
	public function Calendario()
	{
		$this->load->model('disponibilidad_model','calendar');
		$files_head		=	array(
			base_url('assets/fullcalendar/fullcalendar.css')
			);

		$files_footer	=	array(
			base_url('assets/js/jquery-1.8.3.min.js'),
			base_url('assets/js/jquery-ui-1.9.2.custom.min.js'),
			base_url('assets/js/fullcalendar.min.js'),
			base_url('assets/js/mycalendar.js')
			);

		$files 			= 	array(
			'head'		=>	$files_head,
			'footer'	=>	$files_footer
			);

		//$this->load->view('welcome_message',$files);	
		
		$data['main_content'] = $this->load->view('Calendario',$files,TRUE);
		$this->load->view('front/template',$data);
	}
	//Funcion llamada desde el mycalendar.js que esta en asset/js
	public function json()
    {
    	$this->load->model('disponibilidad_model','calendar');
    	header("Content-Type: application/json");  
        echo $this->calendar->jsonEvents(); 
    }
	//Funcion llamada desde el mycalendar.js que esta en asset/js
	public function resize()
    {
    	$this->load->model('disponibilidad_model','calendar');
    	header("Content-Type: application/json");  
    	$data = array(
    		'event'			=>	$this->input->post('event'),
    		'daystart'		=>	$this->input->post('daystart'),
    		'dayend'		=>	$this->input->post('dayend'),
    	);

    	echo $this->calendar->resize($data);
    }
	//Funcion llamada desde el mycalendar.js que esta en asset/js
	public function drop_event()
    {
    	$this->load->model('disponibilidad_model','calendar');
    	header("Content-Type: application/json");  
    	$data = array(
    		'event'			=>	$this->input->post('event'),
    		'daystart'		=>	$this->input->post('daystart'),
    		'dayend'		=>	$this->input->post('dayend'),
    	);

		echo $this->calendar->drop_event($data);
    }
	//Funcion llamada desde el mycalendar.js que esta en asset/js
	public function delete_event()
    {
    	$this->load->model('disponibilidad_model','calendar');
    	header("Content-Type: application/json");		
    	echo $this->calendar->delete($this->input->post('event')) ? 'el evento ha sido borrado' : 'El evento no pudo borrarse';
    } 
	
	public function NuevoEvento()
	{
		$this->load->model('disponibilidad_model','calendar');
		$files_footer	=	array(
			base_url('assets/js/jquery-1.8.3.min.js'),
			base_url('assets/js/jquery-ui-1.9.2.custom.min.js'),
			base_url('assets/js/jquery.validate.min.js'),
			base_url('assets/js/additional-methods.min.js'),
			base_url('assets/js/form_calendar.js')
			);
			
		$files 			= 	array(
			'footer'	=>	$files_footer
			);
		
		$data['main_content'] = $this->load->view('NuevoEvento',$files,TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function tocalendar()
    {
    	$this->load->model('disponibilidad_model','calendar');
    	$allday 	=	($this->input->post('allday')==1) ? 'true' : 'false';
    	
    	$startdate	=	str_replace('/', '-', $this->input->post('startdate'));
    	$startdate	=	date('Y-m-d',strtotime($startdate));

    	$enddate	=	str_replace('/', '-', $this->input->post('enddate'));
    	$enddate	=	date('Y-m-d',strtotime($enddate));

    	if($allday=='true') // como cadena y no booleano ya que así es como va a la base de datos
    	{
    		$startdate	=	$startdate . ' 00:00:00';
    		$enddate	=	$enddate . ' 00:00:00';
    	} else {
    		$startdate	=	$startdate . ' ' .$this->input->post('starthour') . ':00';
    		$enddate	=	$enddate . ' ' .$this->input->post('endhour') . ':00';
    	}

    	$data=array(
    		'title'		=>	$this->input->post('event'),
    		'start'		=>	$startdate,
    		'end'		=>	$enddate,
    		'allDay'	=>	($this->input->post('allday')==1) ? 'true' : 'false'
    		);
    	$this->db->insert('eventos',$data);
    	redirect('index.php/Disponibilidad/Calendario/','refresh');
    }
		
	public function Monitoreo()
	{
		$data['main_content'] = $this->load->view('Monitoreo','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function ReportesIncidencias()
	{
		$data['main_content'] = $this->load->view('ReportesIncidencias','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Servicio()
	{
		$datos['ids'] = $this->uri->segment(3);
		$data['longitud'] =$this->disponibilidad_model->obtenerlongitudFechasServiciosHistorial($datos);	
		$data['activo'] =$this->disponibilidad_model->obtenerMonitoreoActivo($datos);		
		$data['inactivo'] =$this->disponibilidad_model->obtenerMonitoreoInactivo($datos);
		$data['fechas'] =$this->disponibilidad_model->obtenerFechas($datos);
		$data['nombre_servicio'] =$this->disponibilidad_model->obtenerNombre($datos);
		$data['main_content'] = $this->load->view('Servicio',$data,TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Plan()
	{
		$data['longitud'] =$this->disponibilidad_model->obtenerlongitudServicios();
		$data['servicios'] =$this->disponibilidad_model->obtenernombreServicios();
		$data['disponibilidad_acordado'] =$this->disponibilidad_model->obtenerPorcentajeDisponibilidadAcordado();
		$data['disponibilidad_real'] =$this->disponibilidad_model->obtenerPorcentajeDisponibilidadReal();	
		$data['fiabilidad_acordado'] =$this->disponibilidad_model->obtenerHoraFiabilidadAcordado();
		$data['fiabilidad_real'] =$this->disponibilidad_model->obtenerHoraFiabilidadReal();
		$data['confiabilidad_acordado'] =$this->disponibilidad_model->obtenerHoraConfiabilidadAcordado();
		$data['confiabilidad_real'] =$this->disponibilidad_model->obtenerHoraConfiabilidadReal();
		$data['main_content'] = $this->load->view('Plan',$data,TRUE);
		$this->load->view('front/template',$data);
	}

	public function Registrarincidencia()
	{
		$data['servicios'] = $this->disponibilidad_model->obtenerNameService();
		$data['main_content'] = $this->load->view('Registrarincidencia',$data,TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Recibirincidencia()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('servic', 'Servicio Afectado', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('codigo', 'Codigo de la Incidencia', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('descripcion', 'Descripcion de la Incidencia', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('tiempo_caido', 'Tiempo de Paralizacion', 'xss_clean');
		$this->form_validation->set_rules('tiempo_retraso', 'Tiempo de Retrasos de Trabajo', 'xss_clean');		
		$this->form_validation->set_rules('pro_crit_afect', 'Procesos Criticos Afectados', 'xss_clean|numeric');
		$this->form_validation->set_rules('usuarios_afectados', 'Usuarios Afectados', 'xss_clean|numeric');
		$this->form_validation->set_rules('confiabilidad_informacion', 'Confiabilidad de Informacion', 'xss_clean|numeric');
		$this->form_validation->set_rules('personal_recuperacion', 'Recursos de Personal', 'xss_clean|numeric');
		
		if($this->form_validation->run() === true){//Si se cumplen todas las reglas
		$data = array(
			'codigo' => $this->input->post('codigo'),
			'descripcion' => $this->input->post('descripcion'),
			'tiempo_caido' => $this->input->post('tiempo_caido'),
			'pro_crit_afect' => $this->input->post('pro_crit_afect'),
			'tiempo_retraso' => $this->input->post('tiempo_retraso'),
			'usuarios_afectados' => $this->input->post('usuarios_afectados'),
			'confiabilidad_informacion' => $this->input->post('confiabilidad_informacion'),
			'personal_recuperacion' => $this->input->post('personal_recuperacion')
		);
		$data['servicio_id'] = $_POST['servic'];//Se trae el id del Servicio
		$data['servicios'] = $this->disponibilidad_model->obtenerNameService();
		$this->disponibilidad_model->crearIncidencia($data);
		$data['main_content'] = $this->load->view('CargadoExitoso','',TRUE);
		$this->load->view('front/template',$data);
		}
		else {//Si no se cumplen			
			$data['servicios'] = $this->disponibilidad_model->obtenerNameService();						
			$data['main_content'] = $this->load->view('Registrarincidencia',$data,TRUE);
			$this->load->view('front/template',$data);
		}
	}
	
	public function Opcionesmejoras()
	{			
		$data['servicios'] = $this->disponibilidad_model->obtenerNameService();
		$data['main_content'] = $this->load->view('Opcionesmejoras',$data,TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Recibiropciones()
	{
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('servic', 'Servicios', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('costo_mejoras', 'Costo de la Mejora', 'required|numeric');
		$this->form_validation->set_rules('descripcion_mejoras', 'Descripcion de la Mejora', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('impacto_mejoras', 'Impacto de la Mejora', 'max_length[200]|xss_clean');
		$this->form_validation->set_rules('beneficio_mejoras', 'Beneficios de la Mejora', 'max_length[200]|xss_clean');
		
		if($this->form_validation->run() === true){//Si se cumplen todas las reglas
		$data = array(		
			'impacto_mejoras' => $this->input->post('impacto_mejoras'),
			'descripcion_mejoras' => $this->input->post('descripcion_mejoras'),
			'beneficio_mejoras' => $this->input->post('beneficio_mejoras'),
			'costo_mejoras' => $this->input->post('costo_mejoras')
		);		
		$data['servicio_id'] = $_POST['servic'];//Se trae el id del Servicio
		$data['servicios'] = $this->disponibilidad_model->obtenerNameService();
		$this->disponibilidad_model->crearOpciones($data);
		$data['main_content'] = $this->load->view('CargadoExitoso','',TRUE);
		$this->load->view('front/template',$data);
	}
		else {//Si no se cumplen			
			$data['servicios'] = $this->disponibilidad_model->obtenerNameService();						
			$data['main_content'] = $this->load->view('Opcionesmejoras',$data,TRUE);
			$this->load->view('front/template',$data);
		}
	}
		
	public function Logrosrendimiento()
	{
		$data['servicios'] = $this->disponibilidad_model->obtenerNameService();
		$data['main_content'] = $this->load->view('Logrosrendimiento',$data,TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Recibirlogros()
	{
		$this->load->library('form_validation');		
		$this->form_validation->set_rules('servic', 'Servicio Afectado', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('costo_logros', 'Costo de los Logros', 'required|numeric');
		$this->form_validation->set_rules('descripcion_logros', 'Descripcion de los Logros', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('impacto_logros', 'Impacto de los Logros', 'max_length[200]|xss_clean');
		$this->form_validation->set_rules('beneficio_logros', 'Beneficios de los Logros', 'max_length[200]|xss_clean');
		
		if($this->form_validation->run() === true){//Si se cumplen todas las reglas
		$data = array(
			'impacto_logros' => $this->input->post('impacto_logros'),
			'descripcion_logros' => $this->input->post('descripcion_logros'),
			'beneficio_logros' => $this->input->post('beneficio_logros'),
			'costo_logros' => $this->input->post('costo_logros')
		);
		
		$data['servicio_id'] = $_POST['servic'];//Se trae el id del Servicio
		$data['servicios'] = $this->disponibilidad_model->obtenerNameService();
		$this->disponibilidad_model->crearLogros($data);
		$data['main_content'] = $this->load->view('CargadoExitoso','',TRUE);
		$this->load->view('front/template',$data);
		}
		else {//Si no se cumplen			
			$data['servicios'] = $this->disponibilidad_model->obtenerNameService();						
			$data['main_content'] = $this->load->view('Logrosrendimiento',$data,TRUE);
			$this->load->view('front/template',$data);
		}
	}
	
	public function Oportunidadestecnologicas()
	{
		$data['main_content'] = $this->load->view('Oportunidadestecnologicas','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Recibiroportunidades()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('area', 'Area/Sistema', 'max_length[200]|xss_clean');
		$this->form_validation->set_rules('descripcion', 'Descripcion', 'required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('potencial_beneficio', 'Potenciales Beneficios', 'max_length[200]|xss_clean');
		$this->form_validation->set_rules('recursos_requeridos', 'Recursos Requeridos', 'max_length[200]|xss_clean');
		
		if($this->form_validation->run() === true){//Si se cumplen todas las reglas
		$data = array(
			'descripcion' => $this->input->post('descripcion'),
			'area' => $this->input->post('area'),
			'potencial_beneficio' => $this->input->post('potencial_beneficio'),
			'recursos_requeridos' => $this->input->post('recursos_requeridos')
		);
		
		$this->disponibilidad_model->crearOportunidad($data);
		$data['main_content'] = $this->load->view('CargadoExitoso','',TRUE);
		$this->load->view('front/template',$data);
	}
	else {//Si no se cumplen			
			$data['main_content'] = $this->load->view('Oportunidadestecnologicas','',TRUE);
			$this->load->view('front/template',$data);
		}
	}
	
	public function ImprimirIncidencia()
	{
		$id = $this->uri->segment(3);//capturo la id del servicio seleccionado
		$name = $this->disponibilidad_model->obtenerNombreServicioporID($id);
		//Comienza el PDF
		ob_end_clean();
        $this->load->library('Pdf_Disponibilidad'); 
		$this->pdf = new Pdf_Disponibilidad();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Incidencia del Servicio");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200,200,200);
		$this->pdf->SetFont('Arial', 'B', 17);
		//Primera Pagina
		$this->pdf->Ln(80);
		$this->pdf->SetTextColor(70,100,250); 
		$this->pdf->Text(28, 40, "PLANTILLA DE");
		$this->pdf->Ln(15);	
		$this->pdf->Text(30, 50, "INCIDENCIAS");
		$this->pdf->SetTextColor(0); 
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->Text(165, 103, "(v 1.1)");
		$this->pdf->Rect(16, 30, 178, 85);
		
		$this->pdf->Image('application/modules/Disponibilidad/views/images/imagen.png',150,35,30,25,'');
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('Historial de Revision'));
		$this->pdf->SetTextColor(0);
		$this->pdf->SetFont('Arial', 'B', 9);
		$this->pdf->Ln(15);		
        $this->pdf->Cell(60,7,'NOMBRE',1,0,'C','1');
        $this->pdf->Cell(60,7,'FIRMA',1,0,'C','1');
        $this->pdf->Cell(60,7,'FECHA',1,0,'C','1');
		
		for($i=1;$i<=5;$i++){
			$this->pdf->Ln(7);		
			$this->pdf->Cell(60,7,' ',1,0,'C','0');
			$this->pdf->Cell(60,7,' ',1,0,'C','0');
			$this->pdf->Cell(60,7,' ',1,0,'C','0');
		}
		$this->pdf->Ln(15);
		//Indice
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('Contenido'));
		$this->pdf->SetTextColor(0);
		$this->pdf->SetFont('Arial', 'I', 12);
		$this->pdf->Ln(15);
		$this->pdf->Write(10,utf8_decode("1. Incidencias del $name" ));
		$this->pdf->Ln(8);				
		//Segunda Pagina
		//Comparando Niveles de Servicios Real con lo establecido en los SLAs
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial', 'B', 12);
		$incidencias =$this->disponibilidad_model->obtenerIncidencia($id);
	
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode("1. Incidencias del $name "));
		$this->pdf->SetTextColor(0);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial', 'B', 9);  
		$this->pdf->Ln(7);		
		$this->pdf->SetWidths(array(15,20,33,30,25,25,33));
		$this->pdf->SetAligns(array('C','C','C','C','C','C','C'));
        $this->pdf->RowColor(array(utf8_decode('NUM'),utf8_decode('CODIGO'),utf8_decode('DESCRIPCION'),utf8_decode('TIEMPO DE PARALIZACION'),utf8_decode('PROCESOS AFECTADOS'),utf8_decode('USUARIOS AFECTADOS'),utf8_decode('PORCENTAJE DE CONFIABILIDAD DE INFORMACION')));			          
       
		$x = 1;
		if(empty($incidencias)== false){
        foreach ($incidencias as $row) {
        	$this->pdf->Row(array($x++,utf8_decode($row->codigo),utf8_decode($row->descripcion),utf8_decode($row->tiempo_caido),utf8_decode($row->pro_crit_afect),utf8_decode($row->usuarios_afectados),utf8_decode($row->confiabilidad_informacion)));			          
        }		
		}
		else {
			$this->pdf->Row(array(' ', ' ',' ',' ',' ',' ',' '));			          
        }		
		$this->pdf->Output("Incidencia.pdf", 'I');
	}
	
	public function ImprimirPlan()
	{
		 ob_end_clean();
        $this->load->library('Pdf_Disponibilidad'); 
		$this->pdf = new Pdf_Disponibilidad();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Plan de Disponbilidad");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(200,200,200);
		$this->pdf->SetFont('Arial', 'B', 17);
		//Primera Pagina
		$this->pdf->Ln(80);
		$this->pdf->SetTextColor(70,100,250); 
		$this->pdf->Text(28, 40, "PLANTILLA DE PLAN DE");
		$this->pdf->Ln(15);	
		$this->pdf->Text(37, 50, "DISPONIBILIDAD");
		$this->pdf->SetTextColor(0); 
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->Text(165, 103, "(v 1.1)");
		$this->pdf->Rect(16, 30, 178, 85);		
		$this->pdf->Image('application/modules/Disponibilidad/views/images/imagen.png',150,35,30,25,'');
		
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('Historial de Aprobaciones'));
		$this->pdf->SetTextColor(0);
		$this->pdf->SetFont('Arial', 'B', 9);
		$this->pdf->Ln(15);		
        $this->pdf->Cell(60,7,'NOMBRE',1,0,'C','1');
        $this->pdf->Cell(60,7,'FIRMA',1,0,'C','1');
        $this->pdf->Cell(60,7,'FECHA',1,0,'C','1');
		
		for($i=1;$i<=5;$i++){
			$this->pdf->Ln(7);		
			$this->pdf->Cell(60,7,' ',1,0,'C','0');
			$this->pdf->Cell(60,7,' ',1,0,'C','0');
			$this->pdf->Cell(60,7,' ',1,0,'C','0');
		}
		$this->pdf->Ln(15);
		//Indice
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('Contenido'));
		$this->pdf->SetTextColor(0);
		$this->pdf->SetFont('Arial', 'I', 12);
		$this->pdf->Ln(15);
		$this->pdf->Write(10,utf8_decode('1. Opciones de Mejoras'));
		$this->pdf->Ln(8);
		$this->pdf->Write(10,utf8_decode('2. Logros en el Rendimiento'));
		$this->pdf->Ln(8);
		$this->pdf->Write(10,utf8_decode('3. Oportunidades Tecnológicas'));
		//Segunda Pagina
		//Comparando Niveles de Servicios Real con lo establecido en los SLAs
		$this->pdf->AddPage();
		$this->pdf->SetFont('Arial', 'B', 12);
		$data['longitud'] =$this->disponibilidad_model->obtenerlongitudServicios();
		$data['servicios'] =$this->disponibilidad_model->obtenernombreServicios();
		$acordado =$this->disponibilidad_model->obtenerNivelesServicios();
		$real =$this->disponibilidad_model->obtenerDisponibilidad();
	
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('1. LOS NIVELES DE DISPONIBILIDAD ACORDADOS EN EL SLAs'));
		$this->pdf->SetTextColor(0);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial', 'B', 9);  
		$this->pdf->Ln(7);		
        $this->pdf->Cell(15,7,'NUM',1,0,'C','1');
        $this->pdf->Cell(25,7,'SERVICIO',1,0,'C','1');
        $this->pdf->Cell(46,7,'% DISPONIBILIDAD',1,0,'C','1');
		$this->pdf->Cell(46,7,'HORAS DE FIABILIDAD',1,0,'C','1');
		$this->pdf->Cell(46,7,'HORAS DE CONFIABILIDAD',1,0,'C','1');
        $this->pdf->Ln(7);		
		$this->pdf->SetWidths(array(15,25,46,46,46));
		$this->pdf->SetAligns(array('C','C','C','C','C'));
		
		$x = 1;
		if(empty($acordado)== false){
        foreach ($acordado as $row) {
        	$nom=$this->disponibilidad_model->obtenerNombreServicioporID($row->servicio_id);
        	$this->pdf->Row(array($x++,utf8_decode($nom),utf8_decode($row->porcentaje_disponibilidad),utf8_decode($row->horas_fiabilidad),utf8_decode($row->horas_confiabilidad)));			          
        }
		}
		else {
			$this->pdf->Row(array(' ', ' ',' ',' ',' '));			          
        }	
		
		$this->pdf->Ln(5);
		$this->pdf->SetFont('Arial', 'B', 12);
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('2. LOS NIVELES REALES DE DISPONIBILIDAD '));
		$this->pdf->SetTextColor(0);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial', 'B', 9);  
		$this->pdf->Ln(7);		
        $this->pdf->Cell(15,7,'NUM',1,0,'C','1');
        $this->pdf->Cell(25,7,'SERVICIO',1,0,'C','1');
        $this->pdf->Cell(46,7,'% DISPONIBILIDAD',1,0,'C','1');
		$this->pdf->Cell(46,7,'HORAS DE FIABILIDAD',1,0,'C','1');
		$this->pdf->Cell(46,7,'HORAS DE CONFIABILIDAD',1,0,'C','1');
        $this->pdf->Ln(7);		
		$this->pdf->SetWidths(array(15,25,46,46,46));
		$this->pdf->SetAligns(array('C','C','C','C','C'));
		
		$x = 1;
		if(empty($real)== false){
        foreach ($real as $row) {
        	$nom=$this->disponibilidad_model->obtenerNombreServicioporID($row->servicio_id);
        	$this->pdf->Row(array($x++,utf8_decode($nom),utf8_decode($row->calculo_disponibilidad),utf8_decode($row->calculo_fiabilidad),utf8_decode($row->calculo_confiabilidad)));			          
        }
		}
		else {
			$this->pdf->Row(array(' ', ' ',' ',' ',' '));			          
        }	
				
		$this->pdf->Ln(5);		
		//Tercera Pagina Cuadro de Opciones de Mejoras
		$this->pdf->AddPage(); 
		$this->pdf->SetFont('Arial', 'B', 12);
		$opcionesmejoras = $this->disponibilidad_model->obtenerOpcionesMejoras();
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('3. OPCIONES DE MEJORAS'));
		$this->pdf->SetTextColor(0);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial', 'B', 9);  
		$this->pdf->Write(5, utf8_decode(" Se incluye las diferentes opciones en las que se puede mejorar el servicio"));
		$this->pdf->Ln(7);		
        $this->pdf->Cell(15,7,'NUM',1,0,'C','1');
        $this->pdf->Cell(25,7,'SERVICIO',1,0,'C','1');
        $this->pdf->Cell(40,7,'IMPACTO',1,0,'C','1');
        $this->pdf->Cell(40,7,'DESCRIPCION',1,0,'C','1');        
        $this->pdf->Cell(40,7,'BENEFICIOS',1,0,'C','1');
        $this->pdf->Cell(20,7,'COSTOS',1,0,'C','1');		
        $this->pdf->Ln(7);		
		$this->pdf->SetWidths(array(15,25,40,40,40,20));
		$this->pdf->SetAligns(array('C','C','C','C','C','C'));
		//Cargar los datos de opciones de mejoras de la BD
		 $x = 1;
		if(empty($opcionesmejoras)== false){
        foreach ($opcionesmejoras as $row) {
        	$nom=$this->disponibilidad_model->obtenerNombreServicioporID($row->servicio_id);
        	$this->pdf->Row(array($x++,utf8_decode($nom),utf8_decode($row->impacto_mejoras),utf8_decode($row->descripcion_mejoras),utf8_decode($row->beneficio_mejoras),utf8_decode($row->costo_mejoras)));			          
        }
        }
        else {
			$this->pdf->Row(array(' ', ' ',' ',' ',' ',' '));			          
        }	
		$this->pdf->Ln(5);
		
		//Cuadro de Logros de Rendimiento
		$this->pdf->AddPage(); 
		$this->pdf->SetFont('Arial', 'B', 12);
		$logrosrendimiento = $this->disponibilidad_model->obtenerLogrosRendimiento();
		$this->pdf->SetTextColor(70,20,250);
		$this->pdf->Write(15,utf8_decode('4. LOGROS EN EL RENDIMIENTO'));
		$this->pdf->SetTextColor(0);
		$this->pdf->Ln(15); 
		$this->pdf->SetFont('Arial', 'B', 9);
		$this->pdf->Write(5, utf8_decode(" Las Actividades que progresaron a subsanar las deficiencias en la disponibilidad de servicios TI existentes."));
		$this->pdf->Ln(7);		
        $this->pdf->Cell(15,7,'NUM',1,0,'C','1');
        $this->pdf->Cell(25,7,'SERVICIO',1,0,'C','1');
        $this->pdf->Cell(40,7,'IMPACTO',1,0,'C','1');
        $this->pdf->Cell(40,7,'DESCRIPCION',1,0,'C','1');        
        $this->pdf->Cell(40,7,'BENEFICIOS',1,0,'C','1');
        $this->pdf->Cell(20,7,'COSTOS',1,0,'C','1');		
        $this->pdf->Ln(7);
		
		$this->pdf->SetWidths(array(15,25,40,40,40,20));
		$this->pdf->SetAligns(array('C','C','C','C','C','C'));
		//Cargar los datos de Logros de Rendimiento de la BD
		 $x = 1;
		if(empty($opcionesmejoras)== false){
        foreach ($logrosrendimiento as $row) {
        	$nom=$this->disponibilidad_model->obtenerNombreServicioporID($row->servicio_id);
        	$this->pdf->Row(array($x++,utf8_decode($nom),utf8_decode($row->impacto_logros),utf8_decode($row->descripcion_logros),utf8_decode($row->beneficio_logros),utf8_decode($row->costo_logros)));			          
        }
        }
        else {
			$this->pdf->Row(array(' ', ' ',' ',' ',' ',' '));			          
        }
		$this->pdf->Ln(5);
		
		//Cuadro de Oportunidades Tecnologicas
			$this->pdf->AddPage(); 
		$this->pdf->SetFont('Arial', 'B', 12);
		$oportunidadestecnologicas = $this->disponibilidad_model->obtenerOportunidadesTecnologicas();
		$this->pdf->SetTextColor(70,20,250); 
		$this->pdf->Write(15,utf8_decode('5. OPORTUNIDADES TECNOLÓGICAS'));
		$this->pdf->SetTextColor(0);
		$this->pdf->Ln(15);
		$this->pdf->SetFont('Arial', 'B', 9);
		$this->pdf->Write(5, utf8_decode(" La sección de tecnología de futuros proporciona una indicación de los posibles beneficios y oportunidades de explotación que existen para mejoras tecnológicas previstas."));
		$this->pdf->Ln(7);		
        $this->pdf->Cell(15,7,'NUM',1,0,'C','1');
		$this->pdf->Cell(41,7,'DESCRIPCION',1,0,'C','1'); 
        $this->pdf->Cell(41,7,'AREA',1,0,'C','1');               
        $this->pdf->Cell(41,7,'POTENCIAL BENEFICIO',1,0,'C','1');
        $this->pdf->Cell(41,7,'RECURSOS REQUERIDOS',1,0,'C','1');		
        $this->pdf->Ln(7);
		
		$this->pdf->SetWidths(array(15,41,41,41,41));
		$this->pdf->SetAligns(array('C','C','C','C','C'));
		//Cargar los datos de Oportunidades Tecnologicas de la BD
		 $x = 1;
		 if(empty($oportunidadestecnologicas)== false){
        foreach ($oportunidadestecnologicas as $row) {
        	$this->pdf->Row(array($x++,utf8_decode($row->descripcion),utf8_decode($row->area),utf8_decode($row->potencial_beneficio),utf8_decode($row->recursos_requeridos)));			          
        }
        }
         else {
			$this->pdf->Row(array(' ', ' ',' ',' ',' '));			          
        }
		$this->pdf->Ln(5);
				
		$this->pdf->Output("Plan de Disponibilidad.pdf", 'I');
	}
}
