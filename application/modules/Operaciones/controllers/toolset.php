<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Toolset extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('data_model','csv');
    }
	
	public function index()
	{
		$data['main_content'] = $this->load->view('toolset','',TRUE);
		$this->load->view('front/template',$data);		
	}
    
    public function read_csv()
    {
        $data['main_content'] = $this->csv->readCSV('');
        $this->load->view('front/template',$data);
    }
}