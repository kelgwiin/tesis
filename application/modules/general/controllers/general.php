<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends MX_Controller
{
	function __construct()
	{
        parent::__construct();
		$this->lang->load('admin');
		$this->load->model('general_model','general');
    }
	
	public function is_logged($redirect)
	{
		if($this->session->userdata())
			redirect($redirect);
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
}