<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class emoney extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(array('emoney_model','pesan_model'));
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
	
	public function emoney_m()
	{
		if($this->require_role('root'))
		{
			
		$topup = $this->transaction_model->get_emoney();
		$data = array(
            'topup' => $topup,
			'module' => 'topup/history_m',
			'module_name' => 'History E- Money',
        );
		
			$this->load->view('include/layout_m', $data);

		}
	}
}
