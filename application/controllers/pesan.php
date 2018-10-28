<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan extends MY_Controller {
		function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','transaction_model'));
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
			'module' => 'pesan/pesan',
			'module_name' => 'Messages',
        );
			$this->load->view('include/layout', $data);
		}
	}
	
	public function payment()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
			'module' => "pesan/payment",
			'module_name' => "Payments",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
	
	public function detail_pesan()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
			'module' => 'pesan/detail_pesan',
			'module_name' => 'Detail Pesan',
        );	
		 $this->load->view('include/layout', $data);
		}
	}
	
	public function insert()
	{
		if( $this->require_role('admin, root') )
		{
		$uid = $this->auth_data->user_id;
		$data = array(
			'isi' 		=> $this->input->post("isi"),
			'date' => date("Y-m-d H:i:s"),
            'uid' => $uid,
		);

		$this->pesan_model->insert($data);
		redirect(site_url('pesan'));
		}
	}
}