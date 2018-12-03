<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

    public function index(){
    	if( $this->require_role('admin') ){
    		$uid = $this->auth_data->user_id;
    		$sum= $this->pesan_model->sum($uid);
			$data = array(	'product' => array(),
							'module' => "products/index",
							'module_name' => "Products",
							'saldo' => "40000000",
							'sum' => $sum
						);
	    	$this->load->view('include/layout', $data);
	    }
    }
}