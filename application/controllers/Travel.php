<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends MY_Controller {
	
	function __construct() {
        parent::__construct();
		$this->load->model(array('pesawat_model','kai_model','transaction_model'));
        $this->load->library('form_validation');
    }


	public function kai()
	{
		if( $this->require_role('admin') )
		{
		$data = array(
           'module' => "travel/kai",
           'module_name' => "KAI",
		   'product' => $this->kai_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}

	public function pesawat()
	{
		if( $this->require_role('admin') )
		{
		$data = array(
           'module' => "travel/pesawat",
           'module_name' => "Pesawat",
		   'product' => $this->pesawat_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function insert_kai()
	{
		$uid = $this->auth_data->user_id;
		$date = $this->input->post("daterange");
		$PP = $this->input->post("PP");
		if($PP=='on'){
			$date_go = substr($date, 0,10);
			$date_back = substr($date, -10);
		}else{
			$date_go = substr($date, 0,10);
			$date_back = '';
		}
		$transaction_id=$this->kai_model->kdotomatis();
		$data = array(
			'from' 	=> $this->input->post("from"),
			'to' 	=> $this->input->post("to"),
			'date_go' 	=> $date_go,
			'date_back' 	=> $date_back,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->kai_model->insert($data);
		$id= $transaction_id;
		$row = $this->kai_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'idpel1'       =>'idpel1',
			'idpel2'       =>'idpel2',
			'idpel3'       =>'',
			'product_id' => $row->product_id,
			'ref1' => '',
		);
		$respon = $this->send($request_data);
		$Rb 		= json_decode($respon);
		$user = $this->session->userdata('id');
		$id = $row->transaction_id;
		$debit       =$Rb ->SALDO_TERPOTONG;
		$data = array(
		'product_id'       =>$Rb ->KODE_PRODUK,
		'transaction_id'       =>$id,
		'date_transaction'       =>$Rb ->WAKTU,
		'debit'       =>$debit,
		'saldo'       =>$this->transaction_model->saldo($debit),
		'status'       =>$Rb ->STATUS,
		);
		$this->transaction_model->insert($data);
		}
		$row = $this->transaction_model->get_by($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['date'] = date("F j, Y");
			$data['module'] = "checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_pln";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['sell'] = $this->db->get_where('pricelist', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);

		}
	}
	
	public function insert_pesawat()
	{
		$uid = $this->auth_data->user_id;
		$date = $this->input->post("daterange");
		$PP = $this->input->post("PP");
		if($PP=='on'){
			$date_go = substr($date, 0,10);
			$date_back = substr($date, -10);
		}else{
			$date_go = substr($date, 0,10);
			$date_back = '';
		}
		$data = array(
			'from' 	=> $this->input->post("from"),
			'to' 	=> $this->input->post("to"),
			'date_go' 	=> $date_go,
			'date_back' 	=> $date_back,
			'transaction_id' => $this->pesawat_model->kdotomatis(),
            'uid' => $uid,
		);

		$this->pesawat_model->insert($data);
		$this->session->set_flashdata('message', 'Record Succes');
		redirect('travel/pesawat');

	}
}
