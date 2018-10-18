<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppob extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array('pdam_model','pln_model','transaction_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if( $this->require_role('admin') )
		{
			$data['module'] = "ppob";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function pdam()
	{
		if( $this->require_role('admin') )
		{
		$data = array(
           'module' => "ppob/pdam",
           'module_name' => "PDAM",
		   'product' => $this->pdam_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}

	public function pln()
	{
		if( $this->require_role('admin') )
		{
		$data = array(
           'module' => "ppob/pln",
           'module_name' => "PLN",
		   'product' => $this->pln_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function insert_pdam()
	{
		$uid = $this->session->userdata('id');
		$product 		= $this->input->post("product_id");
		$idpel 		= $this->input->post("pelanggan");
		if($product=='WABGK' | $product=='WATAPIN' | $product=='WAMJK'){
			$IDPEL1 ='';
			$IDPEL2 =$idpel;
		}
		else{
			$IDPEL1 =$idpel;
			$IDPEL2 ='';
		}
		$data = array(
			'idpel1' 		=> $IDPEL1,
			'idpel2' 		=> $IDPEL2,
			'product_id' 	=> $this->input->post("product_id"),
			'transaction_id' => $this->pdam_model->kdotomatis(),
            'uid' => $uid,
		);

		$this->pdam_model->insert($data);
		$this->session->set_flashdata('message', 'Record Succes');
		redirect('ppob/pdam');

	}
	
	public function view_pdam($id) {
        $row = $this->pdam_model->get_by($id);
        if ($row) {
            $data = array(
                'idpel1' => $row->idpel1,
                'idpel2' => $row->idpel2,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('ppob/pln_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pdam'));
        }
    }
	
	public function delete_pdam($id) {
        $row = $this->pdam_model->get_by($id);

        if ($row) {
            $this->pdam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pdam'));
        }
    }
	
	 public function ing_pdam($id) {
	$row = $this->pdam_model->get_by($id);
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
	$this->session->set_flashdata('message', 'succes Record Success');
    redirect(site_url('ppob/pdam'));
    }
	}
	
	function checkout_pdam($id) {
		$row = $this->pdam_model->get_by($id);
        if ($row) {
        $data_reques = array(
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->kode,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pdam'));
        }
    }
	
	public function insert_pln()
	{
		$uid = $this->session->userdata('id');
		$idpel 		= $this->input->post("pelanggan");
		$pa=$idpel.length;
		if($pa==12){
			$IDPEL1 ='';
			$IDPEL2 =$idpel;
		}
		else{
			$IDPEL1 =$idpel;
			$IDPEL2 ='';
		}
		$data = array(
			'idpel1' 		=> $IDPEL1,
			'idpel2' 		=> $IDPEL2,
			'product_id' 	=> $this->input->post("product_id"),
			'nominal' 	=> $this->input->post("nominal"),
			'transaction_id' => $this->pln_model->kdotomatis(),
            'uid' => $uid,
		);

		$this->pln_model->insert($data);
		$this->session->set_flashdata('message', 'Record Succes');
		redirect('ppob/pln');

	}
	
	public function view_pln($id) {
        $row = $this->pln_model->get_by($id);
        if ($row) {
            $data = array(
                'idpel1' => $row->idpel1,
                'idpel2' => $row->idpel2,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('ppob/pln_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pln'));
        }
    }
	
	public function delete_pln($id) {
        $row = $this->pln_model->get_by($id);

        if ($row) {
            $this->pln_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/pln'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pln'));
        }
    }
	
	 public function ing_pln($id) {
	$row = $this->pln_model->get_by($id);
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
	$this->session->set_flashdata('message', 'succes Record Success');
    redirect(site_url('ppob/pln'));
    }
	}
	
	function checkout_pln($id) {
		$row = $this->pln_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'product_id' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->kode,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/pln'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pln'));
        }
    }
	
	function send($data){
    $api_url = "https://202.43.173.234/transaksi/json.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 500);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $result = curl_exec($ch);
    return $result;
	}
}
