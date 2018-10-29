<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class payment_model extends CI_model{

	function get_by($uid){
		$query =$this->db->query("SELECT * FROM payment,users where uid='$uid' and `status`='belum' and payment.uid = users.user_id order by id DESC limit 3");
    return $query->result();
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