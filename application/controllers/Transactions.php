<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Topup_point_model');
        $this->load->model('Transactions_model');
    }

    public function index(){

    	if( $this->is_logged_in() ){

    		$points = $this->Topup_point_model->read();
    	
			$data = array(	'points' => $points,
							'module' => "topup/index",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function add(){
    	
    	if( $this->is_logged_in() ){

    		$now = date('Y-m-d H:i:s');

    		//Insert Data
    		$data = array(
				'code' 			=> $this->Transactions_model->get_unused_code(),
				'trx_id' 		=> $this->get_trx_id(),
				'type' 			=> 'CRE',
				'amount' 		=> $this->input->post('amount'),
				'created_at' 	=> $now,
				'user_id' 		=> $this->auth_user_id,
				'info'			=> 'TOPUP '.number_format($this->input->post('amount'), 2, ',', '.').' ke '.$this->input->post('account'),
				'status'		=> 'PENDING'
			);

			$query = $this->Transactions_model->insert($data);

	    	if($query){
				redirect('topup/detail/'.$data['trx_id']);
			}
	    }
    }

    public function detail($trx_id = null){

    	if( $this->is_logged_in() ){

    		$transactions = $this->Transactions_model->read(array('trx_id' => $trx_id));
    	
    		$total_transactions = 0;

    		foreach ($transactions as $key => $value) {
    			$total_transactions = $total_transactions + intval($value['amount']);
    		}
    		
			$data = array(	'trx_id' => $trx_id,
							'date' => $transactions[0]['created_at'],
							'status' => $transactions[0]['status'],
							'transactions' => $transactions,
							'total_transactions' => $total_transactions,
							'module' => "transactions/detail",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function history(){

    	if( $this->is_logged_in() ){
    		if( $this->require_role('admin') ){
    			$transactions = $this->Transactions_model->read();
    		}else{
    			$transactions = $this->Transactions_model->read(array('user_id' => $this->auth_user_id));
    		}
    	
			$data = array(	'transactions' => $transactions,
							'module' => "transactions/history",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function update($trx_id = null){

    	if( $this->require_role('admin') ){

    		$transactions = $this->Transactions_model->read(array('trx_id'=>$trx_id));
    		
			$data = array(	'transactions' => $transactions,
							'module' => "topup/confirm",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }
}