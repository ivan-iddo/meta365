<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan extends MY_Controller {
		function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		if( $this->require_role('admin, user, root, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$get_by_pesan = $this->pesan_model->get_by_pesan($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'get_by_pesan' => $get_by_pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => 'pesan/pesan',
			'module_name' => 'Messages',
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
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
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
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
            'status' => $status,
			'module' => 'pesan/pesan_admin',
			'module_name' => 'Balas Pesan',
        );	
		 $this->load->view('include/layout', $data);
		}
	}
	
	public function insert($id)
	{
		if( $this->require_role('user, businesspartner') )
		{
		$uid = $this->auth_data->user_id;
		$get = $this->pesan_model->status($id);
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