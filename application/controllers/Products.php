<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Products_model');
    }

    public function index(){

    	if( $this->require_role('admin') ){

    		$products = $this->Products_model->read();
    	
			$data = array(	'products' => $products,
							'module' => "products/index",
							'module_name' => "Products"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function detail($id = null){

    	if( $this->require_role('admin') ){

    		$product = $this->Products_model->read(array('code'=>$id));
    	
			$data = array(	'product' 		=> $product[0],
							'module' 		=> "products/detail",
							'module_name' 	=> "Products"
						);

	    	$this->load->view('include/layout', $data);
	    }
    }

    public function add(){
    	
    	if( $this->require_role('admin') ){

    		$data = array(	'product' 		=> array(),
							'module' 		=> "products/add",
							'module_name' 	=> "Products"
						);

	    	$this->load->view('include/layout', $data);	
	    }
    }

    public function update($code = null){
    	
    	if( $this->require_role('admin') ){
    		$now = date('Y-m-d H:i:s');

    		$product = $this->Products_model->read(array('code'=>($code ? $code : $this->input->post('code'))));

    		if($product){
    			//Update Data
	    		$json = array(
				    'method'    	=> PROVIDER.'.info_produk',
				    'uid'       	=> UID,
				    'pin'       	=> PIN,
				    'kode_produk' 	=> ($code ? $code : $this->input->post('code'))
				);

	    		$response = (Array)json_decode($this->send_json($json));
	    		
	    		if($response['STATUS'] == '00'){
	    			$data = array(
	    				'code' 			=> $code,
	    				'name' 			=> $this->input->post('name'),
    					'type' 			=> $this->input->post('type'),
	    				'hpp' 			=> ($response['HARGA'] ? $this->get_hpp($response['HARGA']) : 0),
	    				'fee' 			=> $response['KOMISI'],
	    				'admin' 		=> $response['ADMIN'],
	    				'status' 		=> $response['STATUS_PRODUK'],
	    				'updated_at' 	=> $now,
	    				'updated_by' 	=> $this->auth_user_id
	    			);

    				$query = $this->Products_model->update($data);
	    			
	    		}
	    	}else{
	    		//Insert Data
	    		$data = array(
    				'code' 			=> $this->input->post('code'),
    				'name' 			=> $this->input->post('name'),
    				'type' 			=> $this->input->post('type'),
    				'hpp' 			=> $this->input->post('price'),
    				'fee' 			=> $this->input->post('fee'),
    				'admin' 		=> $this->input->post('admin'),
    				'created_at' 	=> $now,
    				'created_by' 	=> $this->auth_user_id
    			);

				$query = $this->Products_model->insert($data);
	    	}

	    	if($query){
				redirect('products');
			 }
	    }
    }

    public function get_detail($code = null){
    	header('Content-Type: application/json');

    	$json = array(
		    'method'    	=> PROVIDER.'.info_produk',
		    'uid'       	=> UID,
		    'pin'       	=> PIN,
		    'kode_produk' 	=> $code
		);

		$response = (Array)json_decode($this->send_json($json));
		
		if($response['STATUS'] == '00'){
			$data = array(
				'code' 		=> $code,
				'hpp' 		=> ($response['HARGA'] ? $this->get_hpp($response['HARGA']) : 0),
				'fee' 		=> $response['KOMISI'],
				'admin' 	=> $response['ADMIN'],
				'status' 	=> $response['STATUS_PRODUK']
			);	

			echo json_encode($data);
		}
    }
}