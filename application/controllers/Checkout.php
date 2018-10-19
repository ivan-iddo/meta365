<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {
	
	public function index()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "checkout";
			$data['module_name'] = "Checkout";
		
			$this->load->view('include/layout', $data);
		}
	}
}