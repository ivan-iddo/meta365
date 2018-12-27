<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Data_products');
    }

    public function index(){
    	if( $this->require_role('admin') ){
    		$uid = $this->auth_data->user_id;
    		$sum= $this->pesan_model->sum($uid);

    		$products = $this->Data_products->select();
    	
			$data = array(	'products' => $products,
							'module' => "products/index",
							'module_name' => "Products",
							'saldo' => "40000000",
							'sum' => $sum
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function detail($id = null){
    	if( $this->require_role('admin') ){
    		$uid = $this->auth_data->user_id;
    		$sum= $this->pesan_model->sum($uid);

    		$product = $this->Data_products->select(array('id'=>$id));
    	
			$data = array(	'product' => $product,
							'module' => "products/detail",
							'module_name' => "Products",
							'saldo' => "40000000",
							'sum' => $sum
						);

	    	$this->load->view('include/layout', $data);
	    }
    }
}