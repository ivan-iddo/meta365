<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emoney extends MY_Controller {

	public function index()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "emoney";
			$data['module_name'] = "E-money";
			
			$this->load->view('include/layout', $data);
		}
	}
}
