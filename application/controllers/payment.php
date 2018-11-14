<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin, root, user, businesspartner, menager') )
		{
		$pencarian = $this->input->post('pencarian');
		$config['per_page'] = 5;
		$uid = $this->auth_data->user_id;
		$dari = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if($this->auth_role=='admin'){
		$status_payment=$this->payment_model->status_payment($config['per_page'],$dari,$pencarian);
		$jumlah = $this->payment_model->jumlah_status();
		}
		if($this->auth_role=='user'|$this->auth_role=='businesspartner'|$this->auth_role=='menager'){
		$status_payment=$this->payment_model->status_payment_uid($config['per_page'],$dari,$uid,$pencarian);
		$jumlah = $this->payment_model->jumlah_status_uid($uid);
		}
		$config['base_url'] = site_url('payment/index'); //site url
        $config['total_rows'] = $this->user->jumlah(); //total row
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
		$payment= $this->payment_model->get_by($uid);
		$payment_sudah= $this->payment_model->get_by_sudah($uid);
		$status= $this->payment_model->status($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
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
			'module' => "payment/payment",
			'module_name' => "Payments",
		);
		
			$this->load->view('include/layout', $data);
		}
	}
	
	public function process($id, $uid)
	{
		if( $this->require_role('admin') )
		{
		$kredit = $this->transaction_model->kredit($id);
		$saldo = $this->transaction_model->up_saldo($uid);
		$upsaldo=$saldo+$kredit;
            $data = array(
                'status' => 'Success',
                'saldo' => $upsaldo,
            );
		$this->transaction_model->update($id, $data);
		redirect(site_url('payment'));
		}
	}
}
