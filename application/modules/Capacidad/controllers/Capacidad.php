<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capacidad extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		$data['main_content'] = $this->load->view('Main','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function ComponentesIT()
	{
		$data['main_content'] = $this->load->view('ComponentesIT','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Servicios()
	{
		$data['main_content'] = $this->load->view('Servicios','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Departamentos()
	{
		$data['main_content'] = $this->load->view('Departamentos','',TRUE);
		$this->load->view('front/template',$data);
	}
	
	public function Umbrales()
	{
		$data['main_content'] = $this->load->view('Umbrales','',TRUE);
		$this->load->view('front/template',$data);
	}
}
