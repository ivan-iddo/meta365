<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan extends MY_Controller {
		function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','transaction_model','payment_model'));
        $this->load->library('form_validation');
    }
	
	public function index()
	{
		if( $this->require_role('admin, user, root, businesspartner') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
			'module' => 'pesan/pesan',
			'module_name' => 'Messages',
        );
			$this->load->view('include/layout', $data);
		}
	}
	
	public function payment()
	{
		if( $this->require_role('root, user, businesspartner') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$payment= $this->payment_model->get_by($uid);
		$status= $this->payment_model->status($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'payment' => $payment,
            'sum_payment' => $sum_payment,
			'status' => $status,
			'module' => "pesan/payment",
			'module_name' => "Payments",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
	
	public function payment_admin()
	{
		if( $this->require_role('admin') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$payment= $this->payment_model->get_by($uid);
		$status= $this->payment_model->status($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'payment' => $payment,
            'sum_payment' => $sum_payment,
			'status' => $status,
			'module' => "pesan/payment",
			'module_name' => "Payments",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
	
	public function detail_pesan($id)
	{
		if( $this->require_role('businesspartner,user') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by_id($uid, $id);
		$status = $this->pesan_model->status($id);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'status' => $status,
			'module' => 'pesan/detail_pesan',
			'module_name' => 'Detail Pesan',
        );	
		 $this->load->view('include/layout', $data);
		}
	}
	
	public function dpesan($id)
	{
		if( $this->require_role('admin') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by_id($uid, $id);
		$status = $this->pesan_model->status($id);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'status' => $status,
			'module' => 'pesan/pesan_admin',
			'module_name' => 'Balas Pesan',
        );	
		 $this->load->view('include/layout', $data);
		}
	}
	
	public function insert()
	{
		if( $this->require_role('user, businesspartner') )
		{
		$uid = $this->auth_data->user_id;
		$data = array(
			'isi' 		=> $this->input->post("isi"),
			'date' => date("Y-m-d H:i:s"),
			'uid_pengirim' => $uid,
            'uid' => '3614488494',
            'status' => 'belum',
		);

		$this->pesan_model->insert($data);
		redirect(site_url('dashboard'));
		}
	}
	
	public function insert_admin()
	{
		if( $this->require_role('admin') )
		{
		$uid = $this->auth_data->user_id;
		$data = array(
			'isi' 		=> $this->input->post("isi"),
			'date' => date("Y-m-d H:i:s"),
			'uid_pengirim' => $uid,
            'uid' => $this->input->post("uid_pengirim"),
            'status' => 'belum',
		);

		$this->pesan_model->insert($data);
		redirect(site_url('admin'));
		}
	}
}