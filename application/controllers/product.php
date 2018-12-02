<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

	// -----------------------------------------------------------------------

	/**
	 * Demonstrate being redirected to login.
	 * If you are logged in and request this method,
	 * you'll see the message, otherwise you will be
	 * shown the login form. Once login is achieved,
	 * you will be redirected back to this method.
	 */
	
	public function index()
	{
		if( $this->require_role('admin') )
		{
		$pencarian = $this->input->post('pencarian');
		$config['per_page'] = 100;
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $product = $this->product_model->lihat($config['per_page'], $page, $pencarian);
		$config['base_url'] = site_url('product/index'); //site url
        $config['total_rows'] = $this->product_model->jumlah(); //total row
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
            'product' => $product,
			'module' => "product",
			'module_name' => "Product",
        );
		$this->load->view('include/layout', $data);
		}
	}
	
	public function add()
	{
		if( $this->require_role('admin') )
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
			'module' => "product/add_product",
			'module_name' => "ADD Product",
        );
		$this->load->view('include/layout', $data);
		}
	}
	
	public function insert(){
        $data = array(
                'product_id' => $this->input->post("product_id"),
                'product' => $this->input->post("product_"),
                'product_name' => $this->input->post("product_name"),
                'product_type' => $this->input->post("product_type"),
        );
        $this->product_model->insert($data);
        redirect(site_url('product'));
    }
	
	public function edit($id)
	{
		if( $this->require_role('admin') )
		{       
        $uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$product = $this->product_model->get_by($id);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'product' => $product,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "product/edit_product",
			'module_name' => "Edit Product",
        );
		$this->load->view('include/layout', $data);
		}
	}
	
	public function update($id){
        $data = array(
                'product' => $this->input->post("product_"),
                'product_name' => $this->input->post("product_name"),
                'product_type' => $this->input->post("product_type"),
        );
        $this->product_model->update($id, $data);
        redirect(site_url('product'));
    }
	
	public function insert_harga($id){
        $data = array(
                'product_id' => $id,
                'price_buy' => $this->input->post("price_buy"),
                'price_sell' => $this->input->post("price_sell"),
        );
        $this->price_model->insert($data);
        redirect(site_url('product'));
    }
	
	public function harga($id)
	{
		if( $this->require_role('admin') )
		{       
        $uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$product = $this->product_model->get_by($id);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		$saldo = $this->transaction_model->up_saldo($uid);
		$teman = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
		$admin = $this->db->where('user_id =', 3614488494)->get('users');
		$data = array(
			'teman' => $teman,
			'admin' => $admin,
            'pesan' => $pesan,
            'product' => $product,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
            'saldo' => $saldo,
			'module' => "product/harga",
			'module_name' => "Edit Harga Product",
        );
		$this->load->view('include/layout', $data);
		}
	}
	
	public function delete($id) {
		if( $this->require_role('admin') )
		{
        $row = $this->product_model->get_by($id);
        if ($row) {
            $this->product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
             redirect(site_url('product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
             redirect(site_url('product'));
        }
        }
    }
}
