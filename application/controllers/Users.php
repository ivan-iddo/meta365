<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
    }

    public function index(){

    	if( $this->require_role('admin') ){

    		$users = $this->Users_model->read();
    	
			$data = array(	'users' => $users,
							'module' => "users/index",
							'module_name' => "Users"
						);
	    	$this->load->view('include/layout', $data);
	    }
    }

    public function detail($id = null){

        if( $this->require_role('admin') ){

            $users = $this->Users_model->read(array('user_id'=>$id));
        
            $data = array(  'user'       => $users[0],
                            'module'        => "users/detail",
                            'module_name'   => "User"
                        );

            $this->load->view('include/layout', $data);
        }
    }

}