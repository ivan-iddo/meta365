<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppob extends CI_Controller {

	public function index()
	{
		$data['module'] = "ppob";
		
		$this->load->view('include/layout', $data);
	}

	public function pdam()
	{
		$data['module'] = "ppob/pdam";
		
		$this->load->view('include/layout', $data);
	}
}
