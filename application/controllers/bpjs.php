<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpjs extends MY_Controller {
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
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "bpjs",
			'module_name' => "BPJS"
		);
		
			$this->load->view('include/layout', $data);
		}
	}
	
		public function insert_bpjs()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$idpel 		= $this->input->post("pelanggan");
		$periode= $this->input->post("periode");
		$phone = $this->input->post("phone");
		$transaction_id = $this->bpjs_model->kdotomatis();
		$data = array(
			'idpel1' 		=> $idpel,
			'periode' 	=> $periode,
			'transaction_id' => $transaction_id,
			'phone' => $phone,
            'uid' => $uid,
		);
		$this->bpjs_model->insert($data);
		
		$id= $transaction_id;
		$row = $this->bpjs_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.bpjsinq',
			'uid'       =>'123',
			'pin'       =>'230',
			'kode_produk'       => 'ASRBPJSKS',
			'periode'       => $row->periode,
			'ref1' => '',
			'idpel1'       =>$row->idpel1,
		);
		$respon = $this->send($request_data);
		$Rb 		= json_decode($respon);
		$uid = $this->auth_data->user_id;
		$id = $row->transaction_id;
		$debit       =$Rb ->SALDO_TERPOTONG;
		$pelanggan       =$Rb ->NAMA_PELANGGAN;
		$nominal       =$Rb ->NOMINAL;
		$struk       =$Rb ->URL_STRUK;
		$ref2       =$Rb ->REF2;
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
		}
		$row = $this->transaction_model->get_by($id);
        if ($row) {
            $data = array(
                'product_id' => $row->product_id,
                'pelanggan' => $pelanggan,
                'nominal' => $nominal,
                'struk' => $struk,
                'transaction_id' => $row->transaction_id,
                'date_transaction' => $row->date_transaction,
				'ref2' => $ref2,
            );
			$this->bpjs_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_tv";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);
		}
		$this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('bpjs'));
		}

	}
	
	public function delete_bpjs($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $row = $this->bpjs_model->get_by($id);

        if ($row) {
            $this->bpjs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('bpjs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bpjs'));
        }
        }
    }
	function checkout_bpjs($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->bpjs_model->get_by($id);
        if ($row) {
        $data_reques = array(
				'method'    =>'rajabiller.bpjspay',
				'uid'       =>'123',
				'pin'       =>'230',
				'periode'       =>$row->periode,
				'ref1' => '',
				'ref2' => $row->ref2,
				'nominal' => $row->nominal,
				'no_hp' => $row->phone,
				'idpel1' => $row->idpel1,
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('bpjs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bpjs'));
        }
        }
    }
	
	public function bpjs_m()
	{
		if($this->require_role('menager, businesspartner'))
		{
			
		$topup = $this->transaction_model->get_bpjs();
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
			'module_name' => 'History BPJS',
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