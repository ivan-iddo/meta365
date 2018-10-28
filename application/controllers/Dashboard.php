<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model(array('transaction_model','pesan_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if($this->require_role('admin, user'))
		{
			
		$uid = $this->auth_data->user_id;
		$history = $this->transaction_model->get_transaction($uid);
		$product = $this->transaction_model->get_all();
		$pulsa = $this->transaction_model->sum_pulsa();
		$emoney= $this->transaction_model->sum_emoney();
		$ppob = $this->transaction_model->sum_ppob();
		$tiket = $this->transaction_model->sum_tiket();
		$game = $this->transaction_model->sum_game();
		$total = $this->transaction_model->total();

        $pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
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
			$this->load->view('include/layout', $data);

		}
	}
}