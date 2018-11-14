<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppob extends MY_Controller {
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
			
			$data['module'] = "ppob";
			
			$this->load->view('include/layout', $data);
		}
	}

	public function pdam()
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
           'module' => "ppob/pdam",
           'module_name' => "PDAM",
		   'product' => $this->pdam_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}

	public function pln()
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
           'module' => "ppob/pln",
           'module_name' => "PLN",
		   'product' => $this->pln_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function multifinance()
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
           'module' => "ppob/multifinance",
           'module_name' => "Multifinance",
		   'product' => $this->multifinance_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function telkom()
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
           'module' => "ppob/telkom",
           'module_name' => "Telpon",
		   'product' => $this->telkom_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	public function tv()
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
           'module' => "ppob/tv",
           'module_name' => "TV",
		   'product' => $this->tv_model->data(),
		);
			$this->load->view('include/layout', $data);
		}
	}
	
	
	public function get_tv()
	{
		$id = $this->input->post("id");
		$data = $this->tv_model->id($id);
		echo json_encode($data);
	}
	
	public function get_telkom()
	{
		$id = $this->input->post("id");
		$data = $this->telkom_model->id($id);
		echo json_encode($data);
	}
	
	public function insert_pdam()
	{
		if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$product 		= $this->input->post("product_id");
		$idpel 		= $this->input->post("pelanggan");
		if($product=='WABGK' | $product=='WATAPIN' | $product=='WAMJK'){
			$IDPEL1 ='';
			$IDPEL2 =$idpel;
		}
		else{
			$IDPEL1 =$idpel;
			$IDPEL2 ='';
		}
		$transaction_id = $this->pdam_model->kdotomatis();
		$data = array(
			'idpel1' 		=> $IDPEL1,
			'idpel2' 		=> $IDPEL2,
			'product_id' 	=> $this->input->post("product_id"),
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);

		$this->pdam_model->insert($data);
		$id= $transaction_id;
		$row = $this->pdam_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'idpel1'       =>'idpel1',
			'idpel2'       =>'idpel2',
			'idpel3'       =>'',
			'kode_produk' => $row->product_id,
			'ref1' => '',
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
		'uid'          =>$uid,
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
			$this->pdam_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_pdam";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);

		}

		}
	}
	
	public function delete_pdam($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $row = $this->pdam_model->get_by($id);

        if ($row) {
            $this->pdam_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pdam'));
        }
        }
    }
	
	function checkout_pdam($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->pdam_model->get_by($id);
        if ($row) {
        $data_reques = array(
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       =>'idpel1',
				'idpel2'       =>'idpel2',
				'idpel3'       =>'idpel',
				'kode_produk' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->ref2,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/pdam'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pdam'));
        }
        }
    }
	
	public function insert_pln()
	{
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$idpel 		= $this->input->post("pelanggan");
		$product_id = $this->input->post("product_id");
		$transaction_id = $this->pln_model->kdotomatis();
		if($product_id=='PLNPASCH'){
			$IDPEL1 =$idpel;
			$IDPEL2 ='';
			$data = array(
			'idpel1' 		=> $IDPEL1,
			'idpel2' 		=> $IDPEL2,
			'product_id' 	=> $product_id,
			'nominal' 	=> '',
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);
		$this->pln_model->insert($data);
		}else{
		$pa=strlen($idpel);
		if($pa==12){
			$IDPEL1 ='';
			$IDPEL2 =$idpel;
		}
		else{
			$IDPEL1 =$idpel;
			$IDPEL2 ='';
		}
		$data = array(
			'idpel1' 		=> $IDPEL1,
			'idpel2' 		=> $IDPEL2,
			'product_id' 	=> $product_id,
			'nominal' 	=> $this->input->post("nominal"),
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);
		$this->pln_model->insert($data);
		}
		$id= $transaction_id;
		$row = $this->pln_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'idpel1'       => $row->idpel1,
			'idpel2'       => $row->idpel2,
			'idpel3'       =>'',
			'kode_produk' => $row->product_id,
			'ref1' => '',
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
			$this->pln_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_pln";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);

		}
		$this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('ppob/pln'));
		}

	}
	
	
	public function delete_pln($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $row = $this->pln_model->get_by($id);

        if ($row) {
            $this->pln_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/pln'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pln'));
        }
        }
    }
	
	
	function checkout_pln($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->pln_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       => $row->idpel1,
				'idpel2'       => $row->idpel2,
				'idpel3'       =>'idpel',
				'kode_produk' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->ref2,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/pln'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/pln'));
        }
        }
    }
	
	public function insert_telkom()
	{
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$product_id = $this->input->post("product_id");
		$idpel1 = $this->input->post("no_phone");
		$idpel2 = substr($idpel1, 0,4);
		$transaction_id = $this->telkom_model->kdotomatis();
		$data = array(
			'idpel1' 		=> $idpel1,
			'idpel2' 		=> $idpel2,
			'product_id' 	=> $product_id,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);
		$this->telkom_model->insert($data);
		
		$id= $transaction_id;
		$row = $this->telkom_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'idpel1'       => $row->idpel1,
			'idpel2'       => $row->idpel2,
			'idpel3'       =>'',
			'kode_produk' => $row->product_id,
			'ref1' => '',
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
			$this->telkom_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_telkom";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);
		}
		$this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('ppob/telkom'));
		}

	}
	
	
	public function delete_telkom($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $row = $this->telkom_model->get_by($id);

        if ($row) {
            $this->telkom_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/telkom'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/telkom'));
        }
        }
    }
	
	
	function checkout_telkom($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->telkom_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       => $row->idpel1,
				'idpel2'       => $row->idpel2,
				'idpel3'       =>'idpel',
				'kode_produk' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->ref2,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/telkom'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/telkom'));
        }
        }
    }
	
	public function insert_multifinance()
	{
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$idpel 		= $this->input->post("pelanggan");
		$product_id = $this->input->post("product_id");
		$transaction_id = $this->multifinance->kdotomatis();
		$data = array(
			'idpel1' 	=> $idpel,
			'product_id' 	=> $product_id,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);
		$this->multifinance_model->insert($data);
		
		$id= $transaction_id;
		$row = $this->multifinance_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'idpel1'       => $row->idpel1,
			'idpel2'       => '',
			'idpel3'       =>'',
			'kode_produk' => $row->product_id,
			'ref1' => '',
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
			$this->multifinance_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
			$data['pesan'] = $pesan;
			$data['saldo'] = $this->transaction_model->up_saldo($uid);
			$data['sum'] = $sum;
			$data['sum_payment'] = $sum_payment;
			$data['module'] = "ppob/checkout";
			$data['module_name'] = "Checkout";
			$data['action'] = "checkout_multifinance";
			$data['product'] = $this->db->get_where('product', array('product_id' => $row->product_id))->row_array();
        $this->load->view('include/layout', $data);
		}
		$this->session->set_flashdata('message', 'Record Not Found');
        redirect(site_url('ppob/multifinance'));
		}

	}
	
	
	public function delete_multifinance($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $row = $this->multifinance_model->get_by($id);

        if ($row) {
            $this->multifinance_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/multifinance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/multifinance'));
        }
        }
    }
	
	
	function checkout_multifinance($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->multifinance_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       => $row->idpel1,
				'idpel2'       => $row->idpel2,
				'idpel3'       =>'idpel',
				'kode_produk' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->ref2,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/multifinance'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/multifinance'));
        }
        }
    }
	
	public function insert_tv()
	{
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$uid = $this->auth_data->user_id;
		$idpel 		= $this->input->post("pelanggan");
		$product_id = $this->input->post("product_id");
		$transaction_id = $this->tv_model->kdotomatis();
		$data = array(
			'idpel1' 		=> $idpel,
			'product_id' 	=> $product_id,
			'transaction_id' => $transaction_id,
            'uid' => $uid,
		);
		$this->tv_model->insert($data);
		
		$id= $transaction_id;
		$row = $this->tv_model->get_by($id);
		if ($row) {
		$request_data = array(
			'method'    =>'rajabiller.ing',
			'uid'       =>'123',
			'pin'       =>'230',
			'idpel1'       => $row->idpel1,
			'idpel2'       => '',
			'idpel3'       =>'',
			'kode_produk' => $row->product_id,
			'ref1' => '',
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
			$this->tv_model->update($id, $data);
			$pesan = $this->pesan_model->get_by($uid);
			$sum= $this->pesan_model->sum($uid);
			$sum_payment= $this->payment_model->sum($uid);
			$data['teman'] = $this->db->where('user_id !=', $this->auth_data->user_id)->get('users');
			$data['admin'] = $this->db->where('user_id =', 3614488494)->get('users');
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
        redirect(site_url('ppob/tv'));
		}

	}
	

	public function delete_tv($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
        $row = $this->tv_model->get_by($id);

        if ($row) {
            $this->tv_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ppob/tv'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/tv'));
        }
        }
    }
	
	
	function checkout_tv($id) {
	if( $this->require_role('admin, user, businesspartner, menager') )
		{
		$row = $this->tv_model->get_by($id);
        if ($row) {
        $data_reques = array(
			
				'method'    =>'rajabiller.paydetail',
				'uid'       =>'123',
				'pin'       =>'230',
				'idpel1'       => $row->idpel1,
				'idpel2'       => $row->idpel2,
				'idpel3'       =>'idpel',
				'kode_produk' => $row->product_id,
                'ref1' => '',
				'ref2' => $row->ref2,
				'nominal' => $row->nominal,
				'ref3' => '',
            );
            $data 		= $this->send($data);
			$this->session->set_flashdata('message', 'Record succes');
			redirect(site_url('ppob/tv'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ppob/tv'));
        }
        }
    }
	
	
	public function get()
	{
		$id = $this->input->post("id");
		$data = $this->pln_model->id($id);
		echo json_encode($data);
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
