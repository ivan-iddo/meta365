<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppob extends MY_Controller {

	public function index()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "ppob";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function pdam()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "ppob/pdam";
			$data['module_name'] = "PDAM";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function pln()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "ppob/pln";
			$data['module_name'] = "PLN";
			
			$this->load->view('include/layout', $data);
		}
	}
}
