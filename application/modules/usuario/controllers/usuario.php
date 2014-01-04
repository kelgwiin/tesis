<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends MX_Controller
{
	public function index()
	{
		$data['main_content'] = $this->load->view('usuario_login','',TRUE);
		$this->load->view('usuario_login',$data);
	}
}