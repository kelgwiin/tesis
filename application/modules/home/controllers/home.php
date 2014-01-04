<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller
{
	public function index()
	{
		$data['main_content'] = $this->load->view('home_view','',TRUE);
		$this->load->view('front/template',$data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
