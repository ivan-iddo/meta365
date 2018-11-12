<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if($this->require_role('admin, user, businesspartner, menager'))
		{	
		$uid = $this->auth_data->user_id;
		$jumlah = $this->transaction_model->jumlah($uid);
		$config=array();
		$config['total_rows']=$jumlah;
		$config['base_url']=base_url().'dashboard/index/';
		$config['per_page']=5;
		$config['num_links']=$jumlah;
		$config['next_link']='Next';
		$config['prev_link']='Previous';
		$this->pagination->initialize($config);
		$dari=$this->uri->segment(3);
		$history=$this->transaction_model->lihat($config['per_page'],$dari,$uid);
		$product = $this->transaction_model->get_all();
		$data = $this->transaction_model->get_tahun_uid($uid);
		$data_menager = $this->transaction_model->get_tahun();
		$pulsa = $this->transaction_model->sum_pulsa_id($uid);
		$emoney= $this->transaction_model->sum_emoney_id($uid);
		$ppob = $this->transaction_model->sum_ppob_id($uid);
		$tiket = $this->transaction_model->sum_tiket_id($uid);
		$game = $this->transaction_model->sum_game_id($uid);
		$total = $this->transaction_model->total();
        $pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$payment= $this->payment_model->payment();
		$saldo = $this->transaction_model->up_saldo($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'payment' => $payment,
			'history' => $history,
            'product' => $product,
            'pulsa' => $pulsa,
			'data' => $data,
			'data_menager' => $data_menager,
            'emoney' => $emoney,
            'ppob' => $ppob,
            'tiket' => $tiket,
            'game' => $game,
            'total' => $total,
            'saldo' => $saldo,
            'module' => "dashboard",
            'module_name' => "Dashboard",
        );
			$this->load->view('include/layout_dashbord', $data);

		}
	}
	
		public function get()
	{
		if($this->require_role('admin, user, businesspartner, menager'))
		{	
		$uid = $this->auth_data->user_id;
		$id = $this->input->post("id");
		$data = $this->transaction_model->get_tahun();
		echo json_encode($data);
		}
	}
	
	public function get1()
	{
		if($this->require_role('admin, user, businesspartner, menager'))
		{	
		$uid = $this->auth_data->user_id;
		$id = $this->input->post("id");
		$data = $this->transaction_model->get_tahun_uid($uid);
		echo json_encode($data);
		}
	}
}