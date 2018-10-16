<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		if( $this->require_role('admin') )
		{

			$data['module'] = "dashboard";
		
			$this->load->view('include/layout', $data);

		}
	}
}
