<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin, root, user, businesspartner, menager') )
		{
		$config['per_page']=10;
		$uid = $this->auth_data->user_id;
		$dari=$this->uri->segment(3);
		if($this->auth_role=='admin'){
		$status_payment=$this->payment_model->status_payment($config['per_page'],$dari);
		$jumlah = $this->payment_model->jumlah_status();
		}
		if($this->auth_role=='user'|$this->auth_role=='businesspartner'|$this->auth_role=='menager'){
		$status_payment=$this->payment_model->status_payment_uid($config['per_page'],$dari,$uid);
		$jumlah = $this->payment_model->jumlah_status_uid($uid);
		}
		$config=array();
		$config['total_rows']=$jumlah;
		$config['base_url']=base_url().'payment/index/';
		$config['num_links']=$jumlah;
		$config['next_link']='Next';
		$config['prev_link']='Previous';
		$this->pagination->initialize($config);
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$payment= $this->payment_model->get_by($uid);
		$payment_sudah= $this->payment_model->get_by_sudah($uid);
		$status= $this->payment_model->status($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'payment' => $payment,
            'payment_sudah' => $payment_sudah,
            'sum_payment' => $sum_payment,
            'status_payment' => $status_payment,
			'status' => $status,
			'saldo' => $saldo,
			'module' => "payment/payment",
			'module_name' => "Payments",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
	
	public function process($id, $uid)
	{
		if( $this->require_role('admin') )
		{
		$kredit = $this->transaction_model->kredit($id);
		$saldo = $this->transaction_model->up_saldo($uid);
		$upsaldo=$saldo+$kredit;
            $data = array(
                'status' => 'Success',
                'saldo' => $upsaldo,
            );
		$this->transaction_model->update($id, $data);
		redirect(site_url('payment'));
		}
	}
}
