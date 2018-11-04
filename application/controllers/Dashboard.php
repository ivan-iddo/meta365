<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model(array('transaction_model','pesan_model','payment_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if($this->require_role('admin, user, businesspartner'))
		{	
		$uid = $this->auth_data->user_id;
		$history = $this->transaction_model->get_transaction($uid);
		$product = $this->transaction_model->get_all();
		$pulsa = $this->transaction_model->sum_pulsa_id($uid);
		$emoney= $this->transaction_model->sum_emoney_id($uid);
		$ppob = $this->transaction_model->sum_ppob_id($uid);
		$tiket = $this->transaction_model->sum_tiket_id($uid);
		$game = $this->transaction_model->sum_game_id($uid);
		$total = $this->transaction_model->total();

        $pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
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
			$this->load->view('include/layout_dashbord', $data);

		}
	}
}