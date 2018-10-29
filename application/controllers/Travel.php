<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class travel extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','kai_model','pesawat_model','transaction_model','payment_model'));
        $this->load->library('form_validation');
    }

	public function index()
	{
		if( $this->require_role('admin, user') )
		{
			
			$data['module'] = "Travel";
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function daftar_kai($id)
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
			'module' => "travel/daftar",
			'module_name' => "Daftar",
			'action' => 'travel/update_kai/$id',
		);
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function daftar_pesawat($id)
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
			'module' => "travel/daftar",
			'module_name' => "Daftar",
			'action' => 'travel/update_pesawat/$id',
		);
			
			$this->load->view('include/layout', $data);
		}
	}

	public function kai()
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
           'module' => "travel/kai",
           'module_name' => "KAI",
		   'product' => $this->kai_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}

	public function pesawat()
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
           'module' => "travel/Pesawat",
           'module_name' => "Pesawat",
		   'product' => $this->pesawat_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function cek_kai()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$date = $this->input->post("daterange");
		$transaction_id = $this->kai_model->kdotomatis();
		$PP = $this->input->post("PP");
		if($PP=='on'){
			$date_go = substr($date, 0,10);
			$date_back = substr($date, -10);
		}else{
			$date_go = substr($date, 0,10);
			$date_back = '';
		}
		$data = array(
			'from' 	=> $this->input->post("from"),
			'to' 	=> $this->input->post("to"),
			'date_go' 	=> $date_go,
			'date_back' 	=> $date_back,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->kai_model->insert($data);
		$id= $transaction_id;
		$row = $this->kai_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'from'       =>'from',
			'to'       =>'to',
			'date_go'       =>'date_go',
			'date_back'       =>'date_back',
			'kode_produk' => 'kai',
			'ref1' => '',
		);
		$respon = $this->send($request_data);
		$Rb 		= json_decode($respon);
		$data = array(
		'uid' => $this->auth_data->user_id,
		'transaction_id' => $id,
		'from'    =>$Rb ->from,
		'to'      =>$Rb ->to,
		'date_go'    =>$Rb ->date_go,
		'date_back'  =>$Rb ->date_back,
		'from'       =>$Rb ->from,
		'harga'     =>$Rb ->harga,
		'kereta'  =>$Rb ->kereta,
		'ref2'      =>$Rb ->REF2,
		);
		$this->kai_model->update($id, $data);
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
        $data['pesan'] = $pesan;
        $data['sum'] = $sum;
        $data['sum_payment'] = $sum_payment;
		$data['module'] = "travel/cek_kai";
		$data['module_name'] = "Harga KAI";
		$this->load->view('include/layout', $data);
		}
		}
	}
	
	public function update_kai($id)
	{
		$row = $this->kai_model->get_by($id);
        if ($row) {
			$transaction_id= $row->transaction_id;
			$harga= $row->harga;
            $data = array(
                'full_name' => $this->input->post("full_name"),
                'gender' => $this->input->post("gender"),
                'phone' => $this->input->post("phone"),
                'transaction_id' => $transaction_id,
            );
			$this->kai_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->pesan_model->sum($uid);
			$data['pesan'] = $pesan;
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['harga'] = $harga;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_kai";
			$this->load->view('include/layout', $data);
		}
	}
	
	public function update_pesawat($id)
	{
		$row = $this->pesawat_model->get_by($id);
        if ($row) {
			$transaction_id= $row->transaction_id;
			$harga= $row->harga;
            $data = array(
                'full_name' => $this->input->post("full_name"),
                'gender' => $this->input->post("gender"),
                'phone' => $this->input->post("phone"),
                'transaction_id' => $transaction_id,
            );
			$this->pesawat_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->pesan_model->sum($uid);
			$data['pesan'] = $pesan;
			$data['sum_payment'] = $sum_payment;
			$data['sum'] = $sum;
			$data['harga'] = $harga;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_pesawat";
			$this->load->view('include/layout', $data);
		}
	}
	
	public function cek_pesawat()
	{
		if( $this->require_role('admin, user') )
		{
		$uid = $this->auth_data->user_id;
		$date = $this->input->post("daterange");
		$transaction_id = $this->pesawat_model->kdotomatis();
		$PP = $this->input->post("PP");
		if($PP=='on'){
			$date_go = substr($date, 0,10);
			$date_back = substr($date, -10);
		}else{
			$date_go = substr($date, 0,10);
			$date_back = '';
		}
		$data = array(
			'from' 	=> $this->input->post("from"),
			'to' 	=> $this->input->post("to"),
			'date_go' 	=> $date_go,
			'date_back' 	=> $date_back,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->pesawat_model->insert($data);
		$id= $transaction_id;
		$row = $this->pesawat_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'from'       =>'from',
			'to'       =>'to',
			'date_go'       =>'date_go',
			'date_back'       =>'date_back',
			'kode_produk' => 'Pesawat',
			'ref1' => '',
		);
		$respon = $this->send($request_data);
		$Rb 		= json_decode($respon);
		$data = array(
		'uid' => $this->auth_data->user_id,
		'transaction_id' => $id,
		'from'    =>$Rb ->from,
		'to'      =>$Rb ->to,
		'date_go'    =>$Rb ->date_go,
		'date_back'  =>$Rb ->date_back,
		'from'       =>$Rb ->from,
		'harga'     =>$Rb ->harga,
		'maskapai'  =>$Rb ->maskapai,
		'ref2'      =>$Rb ->REF2,
		);
		$this->pesawat_model->update($id, $data);
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
        $data['pesan'] = $pesan;
        $data['sum'] = $sum;
        $data['sum_payment'] = $sum_payment;
		$data['module'] = "travel/cek_pesawat";
		$data['module_name'] = "Harga Pesawat";
		$this->load->view('include/layout', $data);
		}
		}
	}
	
	public function kai_m()
	{
		if($this->require_role('root'))
		{
			
		$topup = $this->transaction_model->get_kai();
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
			'module_name' => 'History KAI',
        );
		
			$this->load->view('include/layout_m', $data);

		}
	}
	
	public function pesawat_m()
	{
		if($this->require_role('root'))
		{
			
		$topup = $this->transaction_model->get_pesawat();
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
			'module_name' => 'History Pesawat',
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