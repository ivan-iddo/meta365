<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "topup/topup",
			'module_name' => "Topup",
		);
			
		$this->load->view('include/layout', $data);
		}
	}
	public function konfirmasi()
	{
		if( $this->require_role('admin') )
		{
		$jumlah = $this->payment_model->jumlah();
		$config=array();
		$config['total_rows']=$jumlah;
		$config['base_url']=base_url().'payment/index/';
		$config['per_page']=10;
		$config['num_links']=$jumlah;
		$config['next_link']='Next';
		$config['prev_link']='Previous';
		$this->pagination->initialize($config);
		$dari=$this->uri->segment(3);
		$status_payment=$this->payment_model->lihat($config['per_page'],$dari);
		$uid = $this->auth_data->user_id;
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
			'module' => "topup/konfirmasi_topup",
			'module_name' => "Konfirmasi Topup",
		);
		$this->load->view('include/layout', $data);
		}
	}
		
	public function history()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$jumlah = $this->topup_model->jumlah($uid);
		$config=array();
		$config['total_rows']=$jumlah;
		$config['base_url']=base_url().'topup/history/';
		$config['per_page']=10;
		$config['num_links']=$jumlah;
		$config['next_link']='Next';
		$config['prev_link']='Previous';
		$this->pagination->initialize($config);
		$dari=$this->uri->segment(3);
		$topup=$this->topup_model->lihat($config['per_page'],$dari,$uid);
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'topup' => $topup,
            'saldo' => $saldo,
			'module' => 'topup/history',
			'module_name' => 'History Topup',
        );
			
		$this->load->view('include/layout', $data);
		}
		
	}
	
	public function insert()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$transaction_id = $this->topup_model->kdotomatis();
		$data = array(
			'no_rek' 			=> $this->input->post("no_rek"),
			'nominal' 		=> $this->input->post("nominal"),
			'kode' 		=> $this->acak(3),
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->topup_model->insert($data);
		$id= $transaction_id;
		$row = $this->topup_model->get_by_id($id);
        if ($row) {
            $data = array(
                'no_rek' => $row->no_rek,
                'nominal' => $row->nominal,
                'kode' => $row->kode,
                'transaction_id' => $row->transaction_id,
            );
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['pesan'] = $pesan;
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['date'] = date("F j, Y");
			$data['name'] = $this->auth_data->username;
			$data['module'] = "topup/topup_checkout";
			$data['module_name'] = "Topup";
			$data['action'] = "checkout";
        $this->load->view('include/layout', $data);

		}
		}
	}

	function acak($panjang)
	{
    $karakter= '123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
	$pos = rand(0, strlen($karakter)-1);
	$string .= $karakter{$pos};
    }
    return $string;
	}
	
	public function checkout($id)
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$row = $this->topup_model->get_by_id($id);
		if ($row) {
		$data = array(
		'date_transaction' => date("Y-m-d H:i:s"),
        'transaction_id' => $row->transaction_id,
		'product_id' => 'Topup',
		'kredit' => $row->nominal,
		'status'       => 'Pendding',
		'uid'       => $uid,
		);
		$this->transaction_model->insert($data);
		$this->session->set_flashdata('message', 'succes Record Success');
		redirect(site_url('topup'));
		}
	}
}
}
