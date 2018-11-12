<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {
	function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		if( $this->require_role('admin, user, businesspartner') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
			'module' => "checkout",
			'module_name' => "Checkout",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
}