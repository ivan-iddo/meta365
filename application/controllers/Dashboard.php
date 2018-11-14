<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if($this->require_role('admin, user, businesspartner, menager'))
		{	
		$uid = $this->auth_data->user_id;
		$pencarian = $this->input->post('pencarian');
		$config['per_page'] = 5;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $history = $this->transaction_model->lihat($config['per_page'],$page,$uid,$pencarian);
		$config['base_url'] = site_url('dashboard/index'); //site url
        $config['total_rows'] = $this->transaction_model->jumlah($uid); //total row
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
		$product = $this->transaction_model->get_all();
		$data = $this->transaction_model->get_tahun_uid($uid);
		$data_menager = $this->transaction_model->get_tahun();
		$pulsa = $this->transaction_model->sum_pulsa_id($uid);
		$emoney= $this->transaction_model->sum_emoney_id($uid);
		$ppob = $this->transaction_model->sum_ppob_id($uid);
		$tiket = $this->transaction_model->sum_tiket_id($uid);
		$game = $this->transaction_model->sum_game_id($uid);
		$total = $this->transaction_model->total();
        $pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$payment= $this->payment_model->payment();
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'payment' => $payment,
			'history' => $history,
            'product' => $product,
            'pulsa' => $pulsa,
			'data' => $data,
			'data_menager' => $data_menager,
            'emoney' => $emoney,
            'ppob' => $ppob,
            'tiket' => $tiket,
            'game' => $game,
            'total' => $total,
            'saldo' => $saldo,
            'module' => "dashboard",
            'module_name' => "Dashboard",
        );
			$this->load->view('include/layout_dashbord', $data);

		}
	}
	
		public function get()
	{
		if($this->require_role('admin, user, businesspartner, menager'))
		{	
		$uid = $this->auth_data->user_id;
		$id = $this->input->post("id");
		$data = $this->transaction_model->get_tahun();
		echo json_encode($data);
		}
	}
	
	public function get1()
	{
		if($this->require_role('admin, user, businesspartner, menager'))
		{	
		$uid = $this->auth_data->user_id;
		$id = $this->input->post("id");
		$data = $this->transaction_model->get_tahun_uid($uid);
		echo json_encode($data);
		}
	}
}