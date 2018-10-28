<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsa extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','pulsa_model','transaction_model'));
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
			'module' => "pulsa",
			'module_name' => "Pulsa",
		);
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function insert()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$transaction_id = $this->pulsa_model->kdotomatis();
		$data = array(

			'phone' 			=> $this->input->post("phone"),
			'product_id' 		=> $this->input->post("product_id"),
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->pulsa_model->insert($data);
		$id= $transaction_id;
		$row = $this->pulsa_model->get_by($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['date'] = date("F j, Y");
			$data['module'] = "checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_pulsa";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['sell'] = $this->db->get_where('pricelist', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);

		}
		}
	}

	function get(){
		$kode=$this->input->post('product');
		$data=$this->pulsa_model->bykode($kode);
		echo json_encode($data);
	}
	
    public function delete($id) {
        $row = $this->pulsa_model->get_by($id);

        if ($row) {
            $this->pulsa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pulsa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pulsa'));
        }
    }


	public function view($id) {
        $row = $this->pulsa_model->get_by($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['transaction'] = $this->db->get_where('transaction', array('transaction_id' => $row->transaction_id))->row_array();
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
            $this->template->display('pulsa/pulsa_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pulsa'));
        }
    }
	
	public function checkout_pulsa($id) {
	$row = $this->pulsa_model->get_by($id);
	if ($row) {
    $request_data = array(
		'method'    =>'rajabiller.pulsa',
		'uid'       =>'123',
		'pin'       =>'230',
		'no_hp' => $row->phone,
		'kode_produk' => $row->product_id,
		'ref1' => '',
	);
	$respon = $this->send($request_data);
	$Rb 		= json_decode($respon);
	$id = $row->transaction_id;
	$debit       =$Rb ->SALDO_TERPOTONG;
	$uid = $this->auth_data->user_id;
	$data = array(
	'product_id'       =>$Rb ->KODE_PRODUK,
	'transaction_id'       =>$id,
	'date_transaction'       =>$Rb ->WAKTU,
	'debit'       =>$debit,
	'saldo'       =>$this->transaction_model->saldo($debit),
	'status'       =>$Rb ->STATUS,
	'uid'       => $uid,
	);
	$this->transaction_model->insert($data);
	$this->session->set_flashdata('message', 'succes Record Success');
    redirect(site_url('pulsa'));
    }
	}
	
	public function cek_harga($id) {
	$row = $this->pulsa_model->get_by($id);
	if ($row) {
		$request_data = array(
		'produk' => $row->product_id,
		);
		$product = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
		$request_data = array(
			'method'    =>'rajabiller.harga',
			'uid'       =>'123',
			'pin'       =>'230',
			'produk' => $product['product_type'],
		);
		$Rb 		= $this->send($request_data);
		$data = array(
		'status'       =>$Rb ->STATUS,
		'ket'       =>$Rb ->KET,
		);
		$this->template->display('harga_pulsa', $data);
    }
	}
	
	public function pulsa_m()
	{
		if($this->require_role('root'))
		{
			
		$topup = $this->transaction_model->get_pulsa();
		$data = array(
            'topup' => $topup,
			'module' => 'topup/history_m',
			'module_name' => 'History Pulsa',
        );
			$this->load->view('include/layout_m', $data);

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
