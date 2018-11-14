<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class travel extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
			$data['module'] = "Travel";
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function daftar_kai($id)
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
			
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "travel/daftar",
			'module_name' => "Daftar",
			'action' => 'travel/update_kai/$id',
		);
			
			$this->load->view('include/layout', $data);
		}
	}
	
	public function daftar_pesawat($id)
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
			
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "travel/daftar",
			'module_name' => "Daftar",
			'action' => 'travel/update_pesawat/$id',
		);
			
			$this->load->view('include/layout', $data);
		}
	}

	public function kai()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
           'module' => "travel/kai",
           'module_name' => "KAI",
		   'product' => $this->kai_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function pesawat()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
           'module' => "travel/Pesawat",
           'module_name' => "Pesawat",
		   'product' => $this->pesawat_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}	
	
	public function hotel()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
           'module' => "travel/hotel",
           'module_name' => "Hotel",
		   'product' => $this->hotel_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}	
	
	public function cek_kai()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
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
		$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
        $data['pesan'] = $pesan;
        $data['saldo'] = $this->transaction_model->up_saldo($uid);
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
		if( $this->require_role('admin, user, businesspartner, menager') )
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
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['harga'] = $harga;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_kai";
			$this->load->view('include/layout', $data);
		}
		}
	}
	
	public function update_pesawat($id)
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
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
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum_payment'] = $sum_payment;
			$data['sum'] = $sum;
			$data['harga'] = $harga;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_pesawat";
			$this->load->view('include/layout', $data);
		}
		}
	}
	
	
	public function update_hotel($id)
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->hotel_model->get_by($id);
        if ($row) {
			$transaction_id= $row->transaction_id;
			$harga= $row->harga;
            $data = array(
                'full_name' => $this->input->post("full_name"),
                'gender' => $this->input->post("gender"),
                'phone' => $this->input->post("phone"),
                'transaction_id' => $transaction_id,
            );
			$this->hotel_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->pesan_model->sum($uid);
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['harga'] = $harga;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_hotel";
			$this->load->view('include/layout', $data);
		}
		}
	}
	
	public function cek_pesawat()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
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
		$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
        $data['pesan'] = $pesan;
        $data['saldo'] = $this->transaction_model->up_saldo($uid);
        $data['sum'] = $sum;
        $data['sum_payment'] = $sum_payment;
		$data['module'] = "travel/cek_pesawat";
		$data['module_name'] = "Harga Pesawat";
		$this->load->view('include/layout', $data);
		}
		}
	}
	
	
	public function cek_hotel()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$date = $this->input->post("daterange");
		$transaction_id = $this->hotel_model->kdotomatis();
		$checkin = substr($date, 0,10);
		$checkout = substr($date, -10);
		$data = array(
			'hotel_id' 	=> $this->input->post("hotel_id"),
			'checkin' 	=> $checkin,
			'checkout' 	=> $checkout,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->hotel_model->insert($data);
		$id= $transaction_id;
		$row = $this->hotel_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'date_in'       =>'checkin',
			'date_out'       =>'checkout',
			'kode_produk' => 'hotel_id',
			'ref1' => '',
		);
		$respon = $this->send($request_data);
		$Rb 		= json_decode($respon);
		$data = array(
		'uid' => $this->auth_data->user_id,
		'transaction_id' => $id,
		'harga'     =>$Rb ->harga,
		'hotel'  =>$Rb ->hotel,
		'ref2'      =>$Rb ->REF2,
		);
		$this->hotel_model->update($id, $data);
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
        $data['pesan'] = $pesan;
        $data['saldo'] = $this->transaction_model->up_saldo($uid);
        $data['sum'] = $sum;
        $data['sum_payment'] = $sum_payment;
		$data['module'] = "travel/cek_hotel";
		$data['module_name'] = "Harga Hotel";
		$this->load->view('include/layout', $data);
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