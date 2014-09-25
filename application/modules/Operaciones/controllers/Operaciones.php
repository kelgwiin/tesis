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
    public function extract_data()
    {
        $commands = $this->input->post('commands');
        $outterm = $this->model->server_poller($commands);
        $csv = $this->model->temporaryCSV_poller($outterm);
        $output = $this->model->parse_data($csv);
        $plot_array = $this->model->parse_toplot($output);
        echo json_encode($plot_array);
    }
    public function list_stats() { echo json_encode($this->csvmodel->list_stats()); }
    public function load_stats()
    {
        $array_files =  $this->model->list_stats();
        foreach($array_files as $file)
        {
            $this->model->insert_csv_db("{$file}");
        }
    }
}