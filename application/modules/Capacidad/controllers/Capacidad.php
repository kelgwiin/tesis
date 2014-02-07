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
	/* Inicio Módulo Servicios */
	public function Servicios()
	{
		$data['main_content'] = $this->load->view('Servicios/ListadoServicios','',TRUE);
		$this->load->view('front/template',$data);
	}
	public function Servicio()
	{
		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/Servicio',$datos,TRUE);
		$this->load->view('front/template',$data);
	}
	public function ProcesadorServicio()
	{
		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/ProcesosServicio',$datos,TRUE);
		$this->load->view('front/template',$data);
	}
	public function MemoriaServicio()
	{
		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/MemoriaServicio',$datos,TRUE);
		$this->load->view('front/template',$data);
	}
	public function AlmacenamientoServicio()
	{
		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/AlmacenamientoServicio',$datos,TRUE);
		$this->load->view('front/template',$data);
	}
	public function RedesServicio()
	{
		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/RedesServicio',$datos,TRUE);
		$this->load->view('front/template',$data);
	}
	/* Fin Módulo Servicios */
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
