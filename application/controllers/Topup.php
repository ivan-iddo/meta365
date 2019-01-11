<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends MY_Controller {
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
    		$trx_id = $this->get_trx_id();
    		$user_id = $this->auth_user_id;
    		$topup_point = $this->Topup_point_model->read(array('id' => $this->input->post('account')));

    		//Insert Data
    		$data[0] = array(
				'trx_id' 		=> $trx_id,
				'type' 			=> 'TOP',
				'amount' 		=> $this->input->post('amount'),
				'created_at' 	=> $now,
				'user_id' 		=> $user_id,
				'info'			=> 'TOPUP Rp.'.number_format($this->input->post('amount'), 2, ',', '.').' ke '.$topup_point[0]['name'].' - '.$topup_point[0]['account'],
				'status'		=> 'PENDING'
			);

			$data[1] = array(
				'trx_id' 		=> $trx_id,
				'type' 			=> 'COD',
				'amount' 		=> $this->Transactions_model->get_unused_code(),
				'created_at' 	=> $now,
				'user_id' 		=> $user_id,
				'info'			=> 'Code Confirmation for Trx ID '.$trx_id,
				'status'		=> 'PENDING'
			);

			$query = $this->Transactions_model->insert_batch($data);

	    	if($query){
				redirect('topup/detail/'.$trx_id);
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
							'module' => "topup/detail",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function history(){

    	if( $this->is_logged_in() ){

    		if( $this->require_role('admin') ){
    			$transactions = $this->Transactions_model->read(array('user_id' => $this->auth_user_id, 'type' => 'TOP'));
    		}else{
    			$transactions = $this->Transactions_model->read(array('type' => 'TOP'));
    		}

    		foreach ($transactions as $key => $value) {
    			$transaction_code = $this->Transactions_model->read(array('trx_id' => $value['trx_id'], 'type'=>'COD'));
    			$transactions[$key]['code'] = $transaction_code[0]['amount'];
    			$transactions[$key]['total'] =  $transaction_code[0]['amount'] + $value['amount'];
     		}

			$data = array(	'transactions' => $transactions,
							'module' => "topup/history",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function confirm(){

    	if( $this->require_role('admin') ){

    		$transactions = $this->Transactions_model->read(array('type'=>'TOP','status!='=>'SUCCESS'));
    		
			$data = array(	'transactions' => $transactions,
							'module' => "topup/confirm",
							'module_name' => "Topup"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function update($trx_id = null){
    	
    	$now = date('Y-m-d H:i:s');

    	if( $this->require_role('admin') ){

    		$transactions = $this->Transactions_model->read(array('trx_id'=>$trx_id));

    		$saldo = $this->get_saldo($transactions[0]['user_id']);

    		foreach ($transactions as $key => $value) {
    			$saldo = $saldo + $value['amount'];
    			$update = $this->Transactions_model->update(array('id'=>$value['id'], 'balance'=>$saldo, 'updated_at'=>$now, 'status'=>'SUCCESS'));
    		}

			if($update){
				redirect('topup/confirm');
			}
	    }
    }
}