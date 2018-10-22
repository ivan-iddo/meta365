<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emoney extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model('emoney_model');
        $this->load->library('form_validation');
    }

	public function index()
	{
		if( $this->require_role('admin') )
		{
		$data = array(
           'module' => "emoney",
           'module_name' => "e-Money",
		   'product' => $this->emoney_model->data(),
		);

			$this->load->view('include/layout', $data);
		}
	}
	
	public function get()
	{
		$id = $this->input->post("id");
		$data = $this->emoney_model->id($id);
		echo json_encode($data);
	}
}
