<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gamevoucher extends MY_Controller {

	function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','game_model','transaction_model','payment_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
           'module' => "gamevoucher",
           'module_name' => "Voucher Game",
		   'product' => $this->game_model->data(),
		);			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function get()
	{
		$id = $this->input->post("id");
		$data = $this->game_model->id($id);
		echo json_encode($data);
	}

	public function insert()
	{
		
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$transaction_id = $this->game_model->kdotomatis();
		$data = array(

			'phone' 			=> $this->input->post("phone"),
			'product_id' 		=> $this->input->post("product_id"),
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->game_model->insert($data);
		$id= $transaction_id;
		$row = $this->game_model->get_by($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'phone' => $row->phone,
                'transaction_id' => $row->transaction_id,
            );
			$data['date'] = date("F j, Y");
			$data['module'] = "checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_game";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
			$data['sell'] = $this->db->get_where('pricelist', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);
		}
		}
	}


	public function view($id) {
        $row = $this->game_model->get_by($id);
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
            redirect(site_url('gamevoucher'));
        }
    }

    public function delete($id) {
        $row = $this->game_model->get_by($id);

        if ($row) {
            $this->game_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('gamevoucher'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('gamevoucher'));
        }
    }
	
    public function checkout_game() {
	$id=$this->input->post("id");
	$row = $this->game_model->get_by($id);
	if ($row) {
    $request_data = array(
		'method'    =>'rajabiller.game',
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
	$debit       =$Rb ->SALDO_TERPOTONG;
	$data = array(
	'product_id'       =>$Rb ->KODE_PRODUK,
	'transaction_id'       =>$id,
	'date_transaction'       =>$Rb ->WAKTU,
	'debit'       =>$debit,
	'saldo'       =>$this->transaction_model->saldo($debit),
	'status'       =>$Rb ->STATUS,
	'uid'       =>$uid,
	);
	$this->transaction_model->insert($data);
	$this->session->set_flashdata('message', 'succes Record Success');
    redirect(site_url('gamevoucher'));
    }
	}
	
	public function gamevoucher_m()
	{
		if($this->require_role('root'))
		{
			
		$topup = $this->transaction_model->get_game();
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'topup' => $topup,
			'module' => 'topup/history_m',
			'module_name' => 'History Game',
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
