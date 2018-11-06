<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends MY_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model(array('transaction_model','pesan_model','payment_model','user'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if($this->require_role('admin'))
		{
		$uid = $this->auth_data->user_id;
		$history = $this->transaction_model->get_transaction($uid);
		$product = $this->transaction_model->get_all();
		$pesan = $this->pesan_model->get_by($uid);
		$active = $this->user->get_by();
		$pulsa = $this->transaction_model->sum_pulsa();
		$emoney= $this->transaction_model->sum_emoney();
		$ppob = $this->transaction_model->sum_ppob();
		$tiket = $this->transaction_model->sum_tiket();
		$game = $this->transaction_model->sum_game();
		$total = $this->transaction_model->total();
		$sum_active= $this->user->sum();
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'active' => $active,
            'sum_active' => $sum_active,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
			'history' => $history,
            'product' => $product,
            'pulsa' => $pulsa,
            'emoney' => $emoney,
            'ppob' => $ppob,
            'tiket' => $tiket,
            'game' => $game,
            'total' => $total,
            'module' => "dashboard",
            'module_name' => "Dashboard",
		);
		
		$this->load->view('include/admin/layout', $data);

		}
	}
}