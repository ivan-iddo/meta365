<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model('pesan_model');
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		if( $this->require_role('admin') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
			'module' => "checkout",
			'module_name' => "Checkout",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
}