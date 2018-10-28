<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menager extends MY_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model(array('transaction_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if($this->require_role('root'))
		{
		$product = $this->transaction_model->get_all();
		$pulsa = $this->transaction_model->sum_pulsa();
		$emoney= $this->transaction_model->sum_emoney();
		$ppob = $this->transaction_model->sum_ppob();
		$tiket = $this->transaction_model->sum_tiket();
		$game = $this->transaction_model->sum_game();
		$total = $this->transaction_model->total();
		$data = array(
            'pesan' => $pesan,
            'product' => $product,
            'pulsa' => $pulsa,
            'emoney' => $emoney,
            'ppob' => $ppob,
            'tiket' => $tiket,
            'game' => $game,
            'total' => $total,
            'module' => "dashboard_m",
            'module_name' => "Dashboard",
        );
		
		$this->load->view('include/layout_m', $data);

		}
	}
}