<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller {

	public function index()
	{
		$data['module'] = "travel";
		
		$this->load->view('include/layout', $data);
	}

	public function kai()
	{
		$data['module'] = "travel/kai";
		
		$this->load->view('include/layout', $data);
	}

	public function pesawat()
	{
		$data['module'] = "travel/pesawat";
		
		$this->load->view('include/layout', $data);
	}
}
