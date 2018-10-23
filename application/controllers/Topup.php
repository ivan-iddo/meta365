<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "topup/topup";
			$data['module_name'] = "Topup";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function checkout()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "topup/topup_checkout";
			$data['module_name'] = "Topup";
			
			$this->load->view('include/layout', $data);
		}
	}
}
