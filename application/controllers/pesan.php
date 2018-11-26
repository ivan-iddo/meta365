<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan extends MY_Controller {
		function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		if( $this->require_role('admin') )
		{
		$uid = $this->auth_data->user_id;
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$pesan = $this->pesan_model->get_by($uid);
		$teman = $this->user->teman($uid);
		$admin = $this->user->admin();
		$data = array(
			'pesan' => $pesan,
			'teman' => $teman,
			'admin' => $admin,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => 'pesan/pesan',
			'module_name' => 'Pesan',
        );	
		 $this->load->view('include/layout', $data);
		}
	}
}