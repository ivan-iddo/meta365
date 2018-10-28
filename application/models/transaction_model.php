<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class transaction_model extends CI_Model {

    public $table = 'transaction';
    public $id = 'transaction_id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
		
    }

    
	public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('transaction')
				 ->get();
		return $query->result();
	}
	
	function get_transaction($uid){
		$query =$this->db->query("SELECT * FROM transaction WHERE uid='$uid' and transaction_id NOT LIKE 'UP%'");
    return $query->result();
    }
	
	function get($uid){
    $query =$this->db->query("SELECT * FROM transaction WHERE uid='$uid'");
      return $query->result();
    }
	
	function id($uid){
    $query =$this->db->query("SELECT * FROM transaction WHERE uid='$uid' and transaction_id LIKE 'UP%'");
      return $query->result();
    }
	
    function get_rows() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table, array('uid' => $this->session->userdata('user_id')))->num_rows();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
	
	 function get_by($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

	function insert($data){
	$this->db->insert($this->table, $data);
	}
	
    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

	function tgl() {
        $tgl = date('Y-d-m');
        return $tgl;
    }
	
	function saldo($debit) {
        $id = $this->db->query("SELECT max(transaction_id) as id FROM transaction WHERE transaction_id");
        $query = $this->db->query("SELECT saldo as saldo FROM transaction WHERE transaction_id='$id'");
        $data = $query->row_array();
        $sisa = $data['saldo'];
		$saldo= $sisa-$debit;
        return $saldo;
    }
	
	function get_pulsa() {
		 $query =$this->db->query("SELECT * FROM pulsa,transaction,users,product where pulsa.transaction_id = transaction.transaction_id and pulsa.uid = users.user_id and pulsa.product_id = product.product_id");
    return $query->result();
    }
	
	function sum_pulsa() {
		 $query =$this->db->query("SELECT COUNT(transaction_id)as sum FROM transaction WHERE transaction_id LIKE 'PL%'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function get_pln() {
		 $query =$this->db->query("SELECT * FROM pln,transaction,users where pln.transaction_id = transaction.transaction_id and pln.uid = users.user_id");
    return $query->result();
    }
	
	function get_pdam() {
		 $query =$this->db->query("SELECT * FROM pdam,transaction,users where pdam.transaction_id = transaction.transaction_id and pdam.uid = users.user_id");
    return $query->result();
    }
	
	function sum_ppob() {
		 $query =$this->db->query("SELECT COUNT(transaction_id) as sum FROM transaction WHERE transaction_id LIKE 'PAM%' or 'PLN%'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function get_topup() {
		 $query =$this->db->query("SELECT * FROM topup,transaction,users where topup.transaction_id = transaction.transaction_id and topup.uid = users.user_id");
    return $query->result();
    }
	
	function sum_topup() {
		 $query =$this->db->query("SELECT COUNT(transaction_id) as sum FROM transaction WHERE transaction_id LIKE 'UP%'");
	$data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function get_game() {
		 $query =$this->db->query("SELECT * FROM game,transaction,users where game.transaction_id = transaction.transaction_id and game.uid = users.user_id");
    return $query->result();
    }
	function sum_game() {
		 $query =$this->db->query("SELECT COUNT(transaction_id) as sum FROM transaction WHERE transaction_id LIKE 'GM%'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function get_pesawat() {
		 $query =$this->db->query("SELECT * FROM pesawat,transaction,users where pesawat.transaction_id = transaction.transaction_id and pesawat.uid = users.user_id");
    return $query->result();
    }
	
	function get_kai() {
		 $query =$this->db->query("SELECT * FROM kai,transaction,users where kai.transaction_id = transaction.transaction_id and kai.uid = users.user_id");
    return $query->result();
    }
	function sum_tiket() {
		 $query =$this->db->query("SELECT COUNT(transaction_id) as sum FROM transaction WHERE transaction_id LIKE 'KAI%' or 'PES%'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function get_emoney() {
		 $query =$this->db->query("SELECT * FROM transaction p JOIN uang pk ON p.transaction_id = pk.transaction_id");
    return $query->result();
    }
	function sum_emoney() {
		 $query =$this->db->query("SELECT COUNT(transaction_id) as sum FROM transaction WHERE transaction_id LIKE 'UP%'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	function total() {
		 $query =$this->db->query("SELECT COUNT(transaction_id) as sum FROM transaction");
	$data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
}