<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PERMITE UNA GESTION PARA LA CONTINUIDAD DEL NEGOCIO DE LA ORGANIZACION
 * @author Fernando Pinto <f6rnando@gmail.com>
*/
 
class Continuidad extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
		$this->load->model('gestionriesgos_model','riesgos');
		$this->load->model('general/general_model','general');
	}
	
	// FUNCIONES Y VARIABLES PRIVADAS DEL CONTROLADOR
	private $title = 'Gestión de Continuidad del Negocio';
	private function _list1()
	{
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$sublista = array
		(
			array
			(
				'chain' => 'Gestión de riesgos y amenazas',
				'href'=> site_url('index.php/continuidad/gestion_riesgos')
			),
			array
			(
				'chain' => 'Equipos de desarrollo',
				'href'=> site_url('index.php/continuidad/equipos')
			),
			array
			(
				'chain' => 'Estrategias para la recuperación',
				'href'=> site_url('index.php/continuidad/estrategias')
			),
			array
			(
				'chain' => 'Planes de continuidad del negocio',
				'href'=> site_url('index.php/continuidad/seleccionar_listado')
			)
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet",
			"list" => $sublista
		);
		return $l;
	}
	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$vista = ($permiso) ? 'descripcion' : 'continuidad_sinpermiso';
		$view['nivel'] = 10;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			'#' => 'Continuidad del Negocio'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list1(),'continuidad/'.$vista,$view,$this->title,'','two_level');
	}
	
	public function formar_equipos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			'#' => 'Equipos de acción'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list1(),'continuidad/formar_equipos',$view,$this->title,'','two_level');
	}
	
	public function chart()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 11);
		$vista = ($permiso) ? 'chart_select' : 'continuidad_sinpermiso';
		$view['nivel'] = 11;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Seleccionar Listado'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$js['riesgos'] = $this->riesgos->get_allrisks();
		
		$baja = $mediabaja = $media = $mediaalta = $alta = 0;
		foreach($js['riesgos'] as $key => $riesgo)
		{
			switch ($riesgo->valoracion)
			{
				case 'Baja': $baja++; break;
				case 'Media-Baja': $mediabaja++; break;
				case 'Media': $media++; break;
				case 'Media-Alta': $mediaalta++; break;
				case 'Alta': $alta++; break;
			}
		}
		$count_risk = count($js['riesgos']);
		$js['percents'] = array
		(
			'Baja' => $this->percent($baja, $count_risk),
			'Media-Baja' => $this->percent($mediabaja, $count_risk),
			'Media' => $this->percent($media, $count_risk),
			'Media-Alta' => $this->percent($mediaalta, $count_risk),
			'Alta' => $this->percent($alta, $count_risk),
		);
		$view['piechart_js'] = $this->load->view('continuidad/continuidad/piechart_js',$js,TRUE);
		$this->utils->template($this->_list1(),'continuidad/continuidad/'.$vista,$view,$this->title,'Listado de PCN','two_level');
	}
	
	public function listado($tipo_listado = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 11);
		$vista = ($permiso) ? 'listado' : 'continuidad_sinpermiso';
		$view['nivel'] = 11;
		$this->load->helper('text');
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/seleccionar_listado' => 'Seleccionar Listado',
			'#' => 'Listado de PCN'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		
		
		// $riesgos = modules::run('continuidad/gestion_riesgos/get_risks');
		// if(!empty($tipo_listado))
		// {
			// foreach($riesgos as $key => $riesgo)
			// {
				// if($riesgo->valoracion != $tipo_listado)
					// unset($riesgos[$key]);
			// }
		// }
		// $view['riesgos'] = $riesgos;
		
		$view['planes_continuidad'] = (empty($tipo_listado)) ? $this->riesgos->get_allpcn() : $this->riesgos->get_allpcn(array('ra.valoracion' => $tipo_listado));
		$tipo_listado = str_replace('-', ' ', $tipo_listado);
		$tipo_listado = ucwords($tipo_listado);
		$tipo_listado = str_replace(' ', '-', $tipo_listado);
		$view['valoracion'] = $tipo_listado;
		$view['listado_js'] = $this->load->view('continuidad/continuidad/listado_js','',TRUE);
		$this->utils->template($this->_list1(),'continuidad/continuidad/'.$vista,$view,$this->title,'Listado de PCN','two_level');
	}
	
	public function crear($valoracion = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		$this->load->helper('text');
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/seleccionar_listado' => 'Seleccionar Listado',
			base_url().'index.php/continuidad/listado_pcn/'.$valoracion => 'Listado de PCN',
			'#' => 'Crear PCN'
		);
		
		if($_POST)
		{
			$post = $_POST;
			// die_pre($post);
			// DELIMITADOR DE ERROR DEL FORM VALIDATION
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			
			// REGLAS DEL FORM VALIDATION
			if($_POST['id_continuidad'])
				$this->form_validation->set_rules('codigo','<strong>Código</strong>','required|xss_clean');
			else
				$this->form_validation->set_rules('codigo','<strong>Código</strong>','required|xss_clean|is_unique[plan_continuidad.codigo]');
			
			$this->form_validation->set_rules('denominacion','<strong>Denominación</strong>','required|xss_clean');
			$this->form_validation->set_message('is_unique', 'El %s que intenta crear ya se encuentra almacenado en la base de datos');
			
			if($this->form_validation->run($this))
			{
				$template['pcn'] = $post;
				$template['amenaza'] = $this->general->get_row('riesgos_amenazas',array('id_riesgo'=>$post['id_riesgo']));
				$encargado = $this->riesgos->get_personal_normal(array('id_personal'=>$post['id_empleado']));
				$template['encargado'] = $encargado[0];
				$equipo = array($post['id_crisis'],$post['id_recuperacion'],$post['id_logistica'],$post['id_rrpp'],$post['id_pruebas']);
				$template['equipos'] = $this->riesgos->get_allteams('',$equipo);
				foreach($template['equipos'] as $key => $equipo)
				{
					foreach ($equipo->equipo as $key => $team)
					{
						$id_involucrados[] = $team->id_personal;
					}
				}
				$id_involucrados = array_unique($id_involucrados);
				$template['involucrados'] = $this->riesgos->get_personal_normal('',$id_involucrados);
				$template['estrategia'] = $this->riesgos->get_allestrategias(array('id_estrategia'=>$_POST['id_estrategia']));
				$this->load->library('mpdf');
				$pdf = $this->load->view('continuidad/continuidad/pdf_template.php',$template,TRUE);
				$mpdf = new mPDF();
				$mpdf->WriteHTML($pdf);
				$name = reset_string($post['denominacion']);
				$ruta = $_SERVER['DOCUMENT_ROOT'].'/assets/back/continuidad_uploads/'.$name.'.pdf';
				if(file_exists($ruta)) unlink($ruta);
				$content = $mpdf->Output($ruta,'F');
				$post['pdf'] = $ruta;
				if(isset($post['id_continuidad']) && !empty($post['id_continuidad']))
				{
					// SI SE ESTA ACTUALIZANDO UN PCN EXISTENTE
					$old_pdf = $this->general->get_row('plan_continuidad',array('id_continuidad'=>$post['id_continuidad']),array('pdf'));
					if(!empty($old_pdf->pdf) && file_exists($old_pdf->pdf)) unlink($old_pdf->pdf);
					
					if($this->general->update('plan_continuidad',$post,array('id_continuidad'=>$post['id_continuidad'])))
					{
						// if($_POST['id_estado'] == 1)
						// {
							// $pdf_file = $mpdf->Output($ruta,'S');
							// $email = new stdClass();
							// $email->subject = 'Activación de PCN';
							// $email->message = 'Se ha activado el Plan de Continuidad del Negocio '.$post['denominacion'].'<br />Se ha adjuntado un archivo PDF con los lineamientos para la ejecución del PCN';
							// $email->pdf = $pdf_file;
							// $this->mailing($template['involucrados'], $email, $valoracion);
						// }
						$this->session->set_flashdata('alert_success','Plan de Continuidad del Negocio <strong>'.$post['denominacion'].'</strong> modificado con éxito');
					}else
						$this->session->set_flashdata('alert_error','Hubo un error al intentar modificar el Plan de  Continuidad del Negocio <strong>'.$post['denominacion'].'</strong>, por favor intente de nuevo o contacte a su administrador');
				}else
				{
					// SI SE CREA UN PCN NUEVO
					$post['fecha_creacion'] = date('Y-m-d H:i:s');
					if($this->general->insert('plan_continuidad',$post))
						$this->session->set_flashdata('alert_success','Nuevo Plan de Continuidad del Negocio creado con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error al intentar crear el Plan de  Continuidad del Negocio, por favor intente de nuevo o contacte a su administrador');
				}
				
				redirect(site_url('index.php/continuidad/listado_pcn/'.$valoracion));
			}
		}
		
		$view['estrategias'] = $this->general->get_table('estrategias_recuperacion');
		$view['valoracion'] = $valoracion;
		$view['crisis'] = $this->riesgos->get_allteams(array('e.id_tipo'=>1));
		$view['recuperacion'] = $this->riesgos->get_allteams(array('e.id_tipo'=>2));
		$view['logistica'] = $this->riesgos->get_allteams(array('e.id_tipo'=>3));
		$view['rrpp'] = $this->riesgos->get_allteams(array('e.id_tipo'=>4));
		$view['pruebas'] = $this->riesgos->get_allteams(array('e.id_tipo'=>5));
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['riesgos'] = $this->riesgos->get_allrisks(array('riesgos_amenazas.valoracion'=>$valoracion));
		$view['departamentos'] = $this->general->get_table('departamento');
		$view['estados'] = $this->general->get_table('usuarios_estado');
		$view['crearpcn_js'] = $this->load->view('continuidad/continuidad/crearpcn_js','',TRUE);
		$this->utils->template($this->_list1(),'continuidad/continuidad/crear_pcn',$view,$this->title,'Crear nuevo PCN','two_level');
	}

	public function modificar_pcn($valoracion, $id_continuidad = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 15);
		$vista = ($permiso) ? 'crear_pcn' : 'continuidad_sinpermiso';
		$view['nivel'] = 15;
		$this->load->helper('text');
		$view['valoracion'] = $valoracion;
		
		$where['id_continuidad'] = $id_continuidad;
		if($this->general->exist('plan_continuidad',$where))
		{
			$view['plan_continuidad'] = $this->riesgos->get_allpcn($where);
			$view['plan_continuidad'] = $view['plan_continuidad'][0];
			$breadcrumbs = array
			(
				base_url() => 'Inicio',
				base_url().'index.php/continuidad' => 'Continuidad del Negocio',
				base_url().'index.php/continuidad/seleccionar_listado' => 'Seleccionar Listado',
				base_url().'index.php/continuidad/listado_pcn/'.$valoracion => 'Listado de PCN',
				'#' => $view['plan_continuidad']->codigo
			);
			$view['estrategias'] = $this->general->get_table('estrategias_recuperacion');
			$view['crisis'] = $this->riesgos->get_allteams(array('e.id_tipo'=>1));
			$view['recuperacion'] = $this->riesgos->get_allteams(array('e.id_tipo'=>2));
			$view['logistica'] = $this->riesgos->get_allteams(array('e.id_tipo'=>3));
			$view['rrpp'] = $this->riesgos->get_allteams(array('e.id_tipo'=>4));
			$view['pruebas'] = $this->riesgos->get_allteams(array('e.id_tipo'=>5));
			$view['riesgos'] = $this->riesgos->get_allrisks(array('riesgos_amenazas.valoracion'=>$valoracion));
			$view['departamentos'] = $this->general->get_table('departamento');
			$view['estados'] = $this->general->get_table('usuarios_estado');
			$view['crearpcn_js'] = $this->load->view('continuidad/continuidad/crearpcn_js','',TRUE);
			$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
			$this->utils->template($this->_list1(),'continuidad/continuidad/'.$vista,$view,$this->title,'Modificar PCN','two_level');
		}else
		{
			$this->session->set_flashdata('alert_error','El Plan de Continuidad del Negocio que intenta modificar no se encuentra en la base de datos');
			redirect(site_url('index.php/continuidad/listado_pcn'));
		}
	}

	private function percent($item, $count)
	{
		return (float)($item * 100)/$count;
	}
	
	/**
	 * FUNCION USADA POR EL LISTADO DE PCN AL ACTIVAR UN PLAN
	 * continuidad/views/continuidad/listado_js.php
	 * **/
	public function activate_pcn()
	{
		$id_continuidad = $this->input->post('id_continuidad');
		$state = $this->input->post('state');
		$return = $this->general->update('plan_continuidad',array('id_estado'=>$state),array('id_continuidad'=>$id_continuidad));
		
		// if($state == 1)
		// {
			// $involucrados = $this->riesgos->get_allinvolucrados($id_continuidad);
			// $pcn = $this->general->get_row('plan_continuidad',array('id_continuidad'=>$id_continuidad));
			// $pdf_file = (!empty($pcn)) ? $mpdf->Output($pcn->pdf,'S') : '';
			// $email = new stdClass();
			// $email->subject = 'Activación de PCN';
			// $email->message = 'Se ha activado el Plan de Continuidad del Negocio '.$pcn->denominacion.'<br />Se ha adjuntado un archivo PDF con los lineamientos para la ejecución del PCN';
			// $email->pdf = $pdf_file;
			// $this->mailing($involucrados, $email, $state);
		// }
		echo $return;
	}

	public function mailing($involucrados,$email,$valoracion)
	{
		//Proceso de ENVIO DE CORREO ELECTRONICO
        $config['protocol']     = "smtp";
		$config['smtp_host']     = "ssl://smtp.googlemail.com";
        $config['smtp_port']     = 465;
		$config['smtp_user']    = "sigitec.facyt@gmail.com";
        $config['smtp_pass']    = 'trabajo.grado.sigitec';
        $config['mailtype']     = "html";
        $config['charset']        ='utf-8';
        $config['newline']        ="\r\n";
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('sigitec.facyt@gmail.com','SIGITEC | Gestión de Continuidad del Negocio');
		
		foreach($involucrados as $key => $people)
		{
			$this->email->to($people->email_corporativo,$people->nombre);
			$this->email->to($people->email_personal,$people->nombre);
		}
		
        $this->email->subject($email->subject);
		$this->email->message($email->message);
		if(isset($email->pdf) && !empty($email->pdf)) $this->email->attach($email->pdf);
		$this->email->send();
		// die_pre($this->email->print_debugger());
		redirect(site_url('index.php/continuidad/listado_pcn/'.$valoracion));
	}

	public function listado_backup()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 15);
		$vista = ($permiso) ? 'listado_backup' : 'continuidad_sinpermiso';
		$view['nivel'] = 15;
		$this->load->helper('text');
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Respaldos BD'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['respaldos'] = $this->general->get_table('respaldo_db');
		
		$this->utils->template($this->_list1(),'continuidad/continuidad/'.$vista,$view,$this->title,'Respaldos de la base de datos','two_level');
	}

	public function crea_backup()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 15);
		$vista = ($permiso) ? 'listado_backup' : 'continuidad_sinpermiso';
		$view['nivel'] = 15;
		
		if($_POST)
		{
			$post = $_POST;
			$post['fecha_creacion'] = date('Y-m-d H:i:s');
			$this->backup_db($post);
		}
		redirect(site_url('index.php/continuidad/respaldos'));
	}

	public function backup_db($insert)
	{
		$config = array
		(
			'tables'      => array(),  			// Array of tables to backup.
			'ignore'      => array(),           // List of tables to omit from the backup
			'format'      => 'sql',             // gzip, zip, txt
			//'filename'    => 'backup_'.date('YmdHis').'.sql',    // File name - NEEDED ONLY WITH ZIP FILES
			'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
			'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
			'newline'     => "\n"               // Newline character used in backup file
		);
		
		$this->load->dbutil();
		$backup =& $this->dbutil->backup($config);
		$this->load->helper('file');
		$filename = 'backup_'.date('YmdHis').'.sql';
		$ruta = $_SERVER['DOCUMENT_ROOT'].'/assets/back/continuidad_uploads/dump_db/'.$filename;
		write_file($ruta, $backup);
		$insert['ruta'] = $ruta;
		
		$this->session->set_flashdata('filename',$filename);
		$this->session->set_flashdata('backup',$backup);
		
		if($this->general->insert('respaldo_db',$insert))
			$this->session->set_flashdata('alert_success','Base de datos respaldada con éxito');
		else
			$this->session->set_flashdata('alert_error','Hubo un error al intentar respaldar la Base de Datos');
		
		redirect(site_url('index.php/continuidad/respaldos'));
	}
	
	public function download_backup($id_respaldo = '')
	{
		if(!empty($id_respaldo))
		{
			$ruta = $this->general->get_row('respaldo_db',array('id_respaldo'=>$id_respaldo),array('ruta'));
			$file = end(explode('/',$ruta->ruta));
			$this->load->helper('download');
			$data = file_get_contents($ruta->ruta);
			force_download($file, $data);
		}else
			$this->session->set_flashdata('alert_error','No es posible descargar esta base de datos');
		
		redirect(site_url('index.php/continuidad/respaldos'));
	}
}