<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends MX_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->load->library('form_validation');
		$this->lang->load('admin','es');
		$this->load->model('general/general_model','general');
		$this->load->model('usuario_model','usuarios');
    }
	
//--------------------- INICIO - CALLBACKS FORM_VALIDATION ---------------------
	// CALLBACK QUE VERIFICA SI UNA CUENTA DE EMAIL EXISTE EN LA TABLA USUARIOS
	// RETORNA PARA EFECTOS DE PHP E IMPRIME PARA EFECTOS DE AJAX
	public function existemail()
	{
		$email = $this->input->post('email');
		if(strlen($this->input->post('ajax'))) $ajax = TRUE;
		$where['email'] = $email;
		$usuario = $this->general->exist('usuarios',$where);
		
		if(isset($ajax) && $ajax)
		{
			if(!$usuario) echo 0;
			else echo 1;
		}else
		{
			if(!$usuario)
			{
				$this->form_validation->set_message('existemail','El Email ingresado es incorrecto o no se encuentra registrado');
				return FALSE;
			}else
			{
				return TRUE;
			}
		}
		
	}

	// CALLBACK QUE VERIFICA SI LA COMBINACION DE EMAIL Y PASSWORD EXISTE EN LA TABLA USUARIOS
	// RETORNA PARA EFECTOS DE PHP E IMPRIME PARA EFECTOS DE AJAX
	public function validemail()
	{
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		$where['email'] = $email;
		$where['password'] = $password;
		
		if(!$this->general->exist('usuarios',$where))
		{
			$this->form_validation->set_message('validemail','Combinaci�n de Email y Contrase�a incorrecta');
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
	
//--------------------- FIN - CALLBACKS FORM_VALIDATION ---------------------
	
	public function index()
	{
		$view['title'] = 'Iniciar Sesión | '.lang('project.title_long');
		$view['base_url_tit'] = lang('project.title_short');
		$view['project_tit'] = lang('project.title_long');
		$view['usuario_login_js'] = $this->load->view('usuario_login_js','',TRUE);
		$data['main_content'] = $this->load->view('usuario_login',$view,TRUE);
		$this->load->view('usuario_login',$data);
	}
	
	public function login()
	{
		$post['email'] = $_POST['email'];
		$post['password'] = sha1($_POST['password']);
		
		// DELIMITADOR DE ERROR DEL FORM VALIDATION DEL LOGIN
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
		'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
		
		// REGLAS DEL FORM VALIDATION
		$this->form_validation->set_rules('email','<strong>Email</strong>','required|min_length[12]|valid_email|xss_clean|callback_existemail');
		$this->form_validation->set_rules('password','<strong>Contraseña</strong>','required|min_length[3]|xss_clean|callback_validemail');
		
		if(!$this->form_validation->run($this))
		{
			$this->index();
		}else
		{
			$user = $this->general->get_row('usuarios',$post);
			
			if(!empty($user))
			{
				$this->session->set_userdata('user',$user);
				$this->session->set_userdata('logged_in',TRUE);
				redirect('/');
			}
			else
			{
				$error = 'Ocurrió un error intentando iniciar sesión con ese usuario. Por favor contacte a su administrador.';
				$this->session->set_flashdata('error',$error);
				redirect('index.php/usuario/iniciar-sesion');
			}
		}
	}

	public function ver_usuarios()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 1);
		$vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		$view['nivel'] = 1;
		
		if($_POST)
		{
			$data['title'] = lang('user.search').' | '.lang('project.title_long');
			$post = array_filter($_POST);
			// echo_pre($_POST);die_pre($post);
			$view['usuarios'] = $this->usuarios->search_users($post);
		}else
		{
			$data['title'] = lang('user.watch').' | '.lang('project.title_long');
			$view['usuarios'] = $this->general->get_table('usuarios');
		}
		
		$data['main_content'] = $this->load->view($vista,$view,TRUE);
		$this->load->view('front/template',$data);	
	}
	
	public function crear_usuarios()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 2); 
		$vista = ($permiso) ? 'usuario_crear' : 'usuario_sinpermiso';
		$view['nivel'] = 2;
		
		// INFORMACION DE LA VISTA
		$view['estados'] = $this->general->get_table('usuarios_estado');
		$view['roles'] = $this->general->get_table('roles');
		$view['modulos'] = $this->usuarios->get_modulos();
		$view['mod_padre'] = $this->general->get_table('modulo_padre');
		$view['usuario_crear_js'] = $this->load->view('usuario_crear_js','',TRUE);
		
		if($_POST)
		{	
			// DELIMITADOR DE ERROR
			$this->form_validation->set_error_delimiters('<span style="margin-left:5px; color:#DF0101">','<span>');
			$this->form_validation->set_message('is_unique','Ya existe una cuenta registrada con el Email ingresado');
			
			// REGLAS DEL FORM_VALIDATION
			$this->form_validation->set_rules('email','<strong>Email</strong>','required|min_length[12]|valid_email|is_unique[usuarios.email]|xss_clean');
			$this->form_validation->set_rules('password','<strong>Contraseña</strong>','required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('nombre','<strong>Nombre</strong>','required|min_length[5]|xss_clean');
			
			if($this->form_validation->run($this))
			{
				$post = $_POST;
				if(empty($_POST['permisologia']))
					$post['permisologia'] = 'all';
				else
					$post['permisologia'] = implode(',',$_POST['permisologia']);
				
				$post['password'] = sha1($post['password']);
				$post['creacion'] = date('Y-m-d H:i:s');
				$where['email'] = $post['email'];
				if($this->general->insert('usuarios',$post,$where)) redirect('index.php/usuarios');
			}
		}
		
		// INFORMACION DEL TEMPLATE
		$data['title'] = lang('user.create').' | '.lang('project.title_long');
		$data['main_content'] = $this->load->view($vista,$view,TRUE);
		$this->load->view('front/template',$data);	
	}

	public function ficha_usuario($id_usuario)
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 5);
		$vista = ($permiso) ? 'usuario_crear' : 'usuario_sinpermiso';
		
		// INFORMACION DE LA VISTA
		$view['estados'] = $this->general->get_table('usuarios_estado');
		$view['roles'] = $this->general->get_table('roles');
		$view['modulos'] = $this->usuarios->get_modulos();
		$view['mod_padre'] = $this->general->get_table('modulo_padre');
		$view['usuario_crear_js'] = $this->load->view('usuario_crear_js','',TRUE);
		$view['nivel'] = 5;
		$view['user'] = $this->general->get_row('usuarios',array('id_usuario'=>$id_usuario));
		
		// INFORMACION DEL TEMPLATE
		$data['title'] = lang('user.edit').' | '.lang('project.title_long');
		$data['main_content'] = $this->load->view($vista,$view,TRUE);
		$this->load->view('front/template',$data);	
	}
	
	public function buscar_usuarios()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 3);
		$vista = ($permiso) ? 'usuario_buscar' : 'usuario_sinpermiso';
		
		// INFORMACION DE LA VISTA
		$view['estados'] = $this->general->get_table('usuarios_estado');
		$view['roles'] = $this->general->get_table('roles');
		
		// INFORMACION DEL TEMPLATE
		$data['title'] = lang('user.search').' | '.lang('project.title_long');
		$data['main_content'] = $this->load->view($vista,$view,TRUE);
		$this->load->view('front/template',$data);
	}

	public function eliminar_usuario($id_usuario)
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 4);
		if($permiso)
		{
			$this->general->delete('usuarios',array('id_usuario' => $id_usuario));
			$this->session->set_flashdata('success_delete',TRUE);
			redirect('index.php/usuarios');
		}else
		{
			$view['nivel'] = 4;
			// INFORMACION DEL TEMPLATE
			$data['title'] = lang('user.delete').' | '.lang('project.title_long');
			$data['main_content'] = $this->load->view('usuario_sinpermiso',$view,TRUE);
			$this->load->view('front/template',$data);	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('index.php/usuarios/iniciar-sesion');
	}
}