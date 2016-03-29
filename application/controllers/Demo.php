<?php

class Demo extends CI_Controller {

	public function index()
	{
		$this->load->view('demo');
	}
	
	public function performers()
	{
	    $this->load->model('Performer');
	    
	    $start = isset($_GET['start']) && !empty($_GET['start']) ? (int)$_GET['start'] : 0;
	    $length = isset($_GET['length']) && !empty($_GET['length']) ? (int)$_GET['length'] : 4;
	    
	    return $this->output
	                ->set_content_type('application/json')
	                ->set_status_header(200)
	                ->set_output(json_encode(
	                   $this->Performer->getRange($start, $length)    
	                ));
	}
}
