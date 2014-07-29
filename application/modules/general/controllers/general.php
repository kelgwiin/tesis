<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends MX_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->lang->load('admin');
		$this->load->model('general_model','general');
    }
	
	public function is_logged($goto='')
    {
        if($this->session->userdata('logged_in'))
            return TRUE;
        else
            redirect($goto);
    }
	
	public function have_permission($nivel)
	{
		$user = $this->session->userdata('user');
		
		switch ($user->id_rol)
		{
			case 1:
				switch ($user->id_estado)
				{
					case 1: $return = TRUE; break;
					default: $return = FALSE; break;
				}
			break;
			default:
				switch ($user->id_estado)
				{
					case 1:
						$permisología = explode(',',$user->permisologia);
						if(in_array($nivel,$permisología)) $return = TRUE;
						else $return = FALSE;
					break;
					default: $return = FALSE; break;
				}
			break;
		}
		
		return $return;
	}
	
	public function exist_index($table, $where, $fail = 'usuarios/iniciar-sesion', $message = 'Ocurrió un problema inesperado. Por favor intente nuevamente o contacte a su administrador')
	{
		if(!empty($table) && !empty($where))
		{
			if($this->general->exist($table,$where))
				return TRUE;
		}
		$this->session->set_flashdata('alert_error',$message);
		redirect($fail);
	}
	
	public function get_result()
	{
		$table = $this->input->post('table');
		$key = $this->input->post('key');
		$value = $this->input->post('value');
		$where[$key] = $value;
		$result = $this->general->get_result($table,$where);
		echo json_encode($result);
	}
}