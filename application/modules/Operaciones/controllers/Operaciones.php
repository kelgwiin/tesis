<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operaciones extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('data_model','model');
    }
	
	public function index()
	{
		$data['main_content'] = $this->load->view('toolset','',TRUE);
        $this->load->view('front/template',$data);		
	}
    public function real_time_poller()
    {
        $commands = $this->input->post('commands');
        $outterm = $this->model->server_poller($commands);
        $csv = $this->model->temporaryCSV_poller($outterm);
        $output = $this->model->parse_data($csv);
        $plot_array = $this->model->parse_toplot($output);
        echo json_encode($plot_array);
    }
}