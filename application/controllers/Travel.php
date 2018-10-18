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
			$data['module'] = "travel/kai";
			$data['module_name'] = "KAI";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function pesawat()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "travel/pesawat";
			$data['module_name'] = "Pesawat";
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function insert_kai()
	{
		$uid = $this->session->userdata('id');
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
			'transaction_id' => $this->kai_model->kdotomatis(),
            'uid' => $uid,
		);

		$this->kai_model->insert($data);
		$this->session->set_flashdata('message', 'Record Succes');
		redirect('travel/kai');

	}
	
	public function insert_pesawat()
	{
		$uid = $this->session->userdata('id');
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
