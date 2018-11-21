<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topup extends MY_Controller {
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
			'module' => "topup/topup",
			'module_name' => "Topup",
		);
			
		$this->load->view('include/layout', $data);
		}
	}
	public function konfirmasi()
	{
		if( $this->require_role('admin') )
		{
		$pencarian = $this->input->post('pencarian');
		$config['per_page'] = 5;
		$dari= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$status_payment=$this->payment_model->lihat($config['per_page'],$dari,$pencarian);
		$config['base_url'] = site_url('topup/konfirmasi'); //site url
        $config['total_rows'] = $this->payment_model->jumlah(); //total row
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$payment= $this->payment_model->get_by($uid);
		$payment_sudah= $this->payment_model->get_by_sudah($uid);
		$status= $this->payment_model->status($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->user->teman($uid);
		$admin = $this->user->admin();
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'payment' => $payment,
            'payment_sudah' => $payment_sudah,
            'sum_payment' => $sum_payment,
            'status_payment' => $status_payment,
			'status' => $status,
			'saldo' => $saldo,
			'module' => "topup/konfirmasi_topup",
			'module_name' => "Konfirmasi Topup",
		);
		$this->load->view('include/layout', $data);
		}
	}
		
	public function history()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$pencarian = $this->input->post('pencarian');
		$config['per_page'] = 5;
		$dari = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $topup = $this->topup_model->lihat($config['per_page'],$dari,$uid,$pencarian);
		$config['base_url'] = site_url('topup/history'); //site url
        $config['total_rows'] = $this->topup_model->jumlah($uid); //total row
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
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
            'topup' => $topup,
            'saldo' => $saldo,
			'module' => 'topup/history',
			'module_name' => 'History Topup',
        );
			
		$this->load->view('include/layout', $data);
		}
		
	}
	
	public function insert()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$transaction_id = $this->topup_model->kdotomatis();
		$data = array(
			'no_rek' 			=> $this->input->post("no_rek"),
			'nominal' 		=> $this->input->post("nominal"),
			'kode' 		=> $this->acak(3),
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->topup_model->insert($data);
		$id= $transaction_id;
		$row = $this->topup_model->get_by_id($id);
        if ($row) {
            $data = array(
                'no_rek' => $row->no_rek,
                'nominal' => $row->nominal,
                'kode' => $row->kode,
                'transaction_id' => $row->transaction_id,
            );
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['teman'] = $this->user->teman($uid);
			$data['admin'] = $this->user->admin();
			$data['pesan'] = $pesan;
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['date'] = date("F j, Y");
			$data['name'] = $this->auth_data->username;
			$data['module'] = "topup/topup_checkout";
			$data['module_name'] = "Topup";
			$data['action'] = "checkout";
        $this->load->view('include/layout', $data);

		}
		}
	}

	function acak($panjang)
	{
    $karakter= '123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
	$pos = rand(0, strlen($karakter)-1);
	$string .= $karakter{$pos};
    }
    return $string;
	}
	
	public function checkout($id)
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$row = $this->topup_model->get_by_id($id);
		if ($row) {
		$data = array(
		'date_transaction' => date("Y-m-d H:i:s"),
        'transaction_id' => $row->transaction_id,
		'product_id' => 'Topup',
		'kredit' => $row->nominal,
		'status'       => 'Pendding',
		'uid'       => $uid,
		);
		$this->transaction_model->insert($data);
		$this->session->set_flashdata('message', 'succes Record Success');
		redirect(site_url('topup'));
		}
	}
}
}
