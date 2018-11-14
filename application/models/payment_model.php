<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment_model extends CI_model{

	function get_by($uid){
		$query =$this->db->query("SELECT * FROM payment,users where uid='$uid' and `status`='belum' and payment.uid_pengirim = users.user_id order by id DESC limit 3");
    return $query->result();
    }
	
	function get_by_sudah($uid){
		$query =$this->db->query("SELECT * FROM payment,users where uid='$uid' and `status`='sudah' and payment.uid_pengirim= users.user_id order by id DESC");
    return $query->result();
    }
	
	function status_payment($sampai,$dari,$pencarian){
		if ($pencarian){
			$this->db->like('username',$pencarian);
		}
		$this->db->select("*");
		$this->db->from('transaction,users,product');
		$this->db->where("status NOT LIKE 'Success' and transaction_id NOT LIKE 'UP%' and transaction.`product_id` = product.`product_id` and transaction.uid = users.user_id");
		$this->db->order_by('date_transaction', 'DESC');
		return $this->db->limit($sampai,$dari)->get()->result();
    }

	
	function status_payment_uid($sampai,$dari,$uid,$pencarian){
		if ($pencarian){
			$this->db->like('username',$pencarian);
		}
		$this->db->select("*");
		$this->db->from('transaction,users,product');
		$this->db->where("status NOT LIKE 'Success' and transaction_id NOT LIKE 'UP%' and transaction.`product_id` = product.`product_id` and transaction.uid = users.user_id and uid='$uid'");
		$this->db->order_by('date_transaction', 'DESC');
		return $this->db->limit($sampai,$dari)->get()->result();
    }

	
	function jumlah_status(){
        $query =$this->db->query("SELECT count(*) as sum FROM transaction,users,product WHERE status NOT LIKE 'Success' and transaction_id NOT LIKE 'UP%' and  transaction.`product_id` = product.`product_id` and transaction.uid = users.user_id");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function jumlah_status_uid($uid){
        $query =$this->db->query("SELECT count(*) as sum FROM transaction,users,product WHERE status NOT LIKE 'Success' and transaction_id NOT LIKE 'UP%' and  transaction.`product_id` = product.`product_id` and transaction.uid = users.user_id and uid='$uid'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	
	function lihat($sampai,$dari,$pencarian) {
		if ($pencarian){
			$this->db->like('username',$pencarian);
		}
		$this->db->select("*");
		$this->db->from('transaction,topup,users');
		$this->db->where('status="Pendding" and topup.transaction_id = transaction.transaction_id and transaction.uid = users.user_id');
		$this->db->order_by('date_transaction', 'DESC');
		return $this->db->limit($sampai,$dari)->get()->result();
    }
	
	function payment(){
    $query =$this->db->query("SELECT * FROM transaction,topup,users WHERE status='Pendding' and topup.transaction_id = transaction.transaction_id and transaction.uid = users.user_id order by date_transaction DESC");
      return $query->result();
    }
	
	function jumlah(){
        $query =$this->db->query("SELECT count(*) as sum FROM transaction,topup,users WHERE status='Pendding' and topup.transaction_id = transaction.transaction_id and transaction.uid = users.user_id");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }

	function status() {
        $query =$this->db->query("UPDATE payment SET status='sudah'");
    return $query;
	}
	
	function sum($uid) {
		 $query =$this->db->query("SELECT COUNT(`status`) as sum FROM payment WHERE `status`='belum' and uid='$uid'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
}