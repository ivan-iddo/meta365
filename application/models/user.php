<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_model{
	public $table = 'users';
    public $id = 'user_id';
    public $order = 'DESC';


	public function get_all()
	{
		$query = $this->db->query("SELECT * FROM users order by created_at DESC");
		return $query->result();
	}
	
	public function teman($uid)
	{
		$query=$this->db->where('user_id !=', $uid)->get($this->table);
		return $query;
	}	
	
	public function admin()
	{
		$query=$this->db->where($this->id, 3614488494)->get($this->table);
		return $query;
	}
	
	function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	function lihat($sampai,$dari,$pencarian){
		if ($pencarian){
			$this->db->like('username',$pencarian);
		}
		$query = $this->db->get('users',$sampai,$dari);
        return $query->result();
    }
	
	function jumlah() {
        $query =$this->db->get('users');
        return $query->num_rows();
    }
	
	function get_by(){
		$query =$this->db->query("SELECT * FROM users where `banned`='1' order by `user_id` DESC limit 5");
    return $query->result();
    }
	
	function get_by_id($id) {
        $query =$this->db->query("SELECT * FROM users where user_id='$id'");
    return $query->result();
	}
	
	function sum() {
		 $query =$this->db->query("SELECT COUNT(`banned`) as sum FROM users WHERE `banned`='1'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
	
	function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}