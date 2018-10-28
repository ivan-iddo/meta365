<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','topup_model','transaction_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
			'module' = "topup/topup",
			'module_name' = "Topup",
		);
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function history()
	{
		if($this->require_role('admin, user'))
		{
		$uid = $this->auth_data->user_id;
		$topup = $this->transaction_model->get($uid);
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
            'topup' => $topup,
			'module' => 'topup/history',
			'module_name' => 'History Topup',
        );
			
		$this->load->view('include/layout', $data);
		}
		
	}
	
	public function history_m()
	{
		if($this->require_role('root'))
		{
		$topup = $this->transaction_model->get_topup();
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$data = array(
            'pesan' => $pesan,
            'topup' => $topup,
			'module' => 'topup/history_top',
			'module_name' => 'History Topup',
        );
			
		$this->load->view('include/layout_m', $data);
		}
	}
	
	public function insert()
	{
		if( $this->require_role('admin') )
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
		if( $this->require_role('admin') )
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
