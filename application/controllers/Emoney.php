<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emoney extends MY_Controller {

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
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
           'module' => "emoney",
           'module_name' => "e-Money",
		   'product' => $this->emoney_model->data(),
		);

			$this->load->view('include/layout', $data);
		}
	}
	
	public function get()
	{
		$id = $this->input->post("id");
		$data = $this->emoney_model->id($id);
		echo json_encode($data);
	}

}
