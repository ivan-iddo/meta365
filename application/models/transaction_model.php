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

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get_where($this->table, array('uid' => $this->session->userdata('user_id')))->result();
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
}