<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emoney extends CI_Controller {

	public function index()
	{
		$data['module'] = "emoney";
		
		$this->load->view('include/layout', $data);
	}
}
