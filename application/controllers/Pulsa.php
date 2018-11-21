<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pulsa extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->user->teman($uid);
		$admin = $this->user->admin();
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "pulsa",
			'module_name' => "Pulsa",
		);
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function insert()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
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
			$data['teman'] = $this->user->teman($uid);
			$data['admin'] = $this->user->admin();
			$data['pesan'] = $this->pesan_model->get_by($uid);
			$data['sum']= $this->pesan_model->sum($uid);
			$data['sum_payment']= $this->payment_model->sum($uid);
			$data['saldo']= $this->transaction_model->up_saldo($uid);
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
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
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
    }

	
	public function checkout_pulsa($id) {
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
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
		$uid = $this->auth_data->user_id;
		$id = $row->transaction_id;
		if(!empty($Rb)){
		$debit       =$Rb ->SALDO_TERPOTONG;
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
		else{
		$this->load->view('errors/html/error');
		}
		}
		}
	}
		
	public function cek_harga($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
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
