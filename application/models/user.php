<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_model{
	public $table = 'users';
    public $id = 'user_id';
    public $order = 'DESC';


	public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('users')
				 ->get();
		return $query->result();
	}
	
	function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	function get_by(){
		$query =$this->db->query("SELECT * FROM users where `banned`='1' order by `user_id` DESC limit 5");
    return $query->result();
    }
	
	function get_by_id($id) {
        $query =$this->db->query("SELECT * FROM users where `banned`='1' and user_id='$id'");
    return $query->result();
	}
	
	function sum() {
		 $query =$this->db->query("SELECT COUNT(`banned`) as sum FROM users WHERE `banned`='1'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
}