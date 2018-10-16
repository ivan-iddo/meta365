<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends MY_Controller {

	public function index()
	{
		$data['module'] = "travel";
		
		$this->load->view('include/layout', $data);
	}

	public function kai()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "travel/kai";
			$data['module_name'] = "KAI";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function pesawat()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "travel/pesawat";
			$data['module_name'] = "Pesawat";
			
			$this->load->view('include/layout', $data);
		}
	}
}
