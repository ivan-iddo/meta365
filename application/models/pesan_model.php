<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan_model extends CI_model{
	public $table = 'pesan';
    public $id1 = 'uid';
	public $id = 'id';
    public $order = 'DESC';



public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('pesan')
				 ->order_by('id', 'DESC')
				 ->get();
		return $query->result();
	}

	function get_by($uid){
		$query =$this->db->query("SELECT * FROM pesan,users where `status`='belum' and pesan.uid_pengirim = users.user_id and uid='$uid' order by id DESC limit 3");
    return $query->result();
    }
	
    function get_by_id($uid, $id) {
        $query =$this->db->query("SELECT * FROM pesan,users where pesan.uid_pengirim = users.user_id and uid='$uid' and id='$id'");
    return $query->result();
	}
	
	function status($id) {
        $query =$this->db->query("UPDATE pesan SET status='sudah' WHERE id='$id'");
    return $query;
	}

    function insert($data) {
      
	  $query = $this->db->insert($this->table, $data);
		
		if($query){
			return true;
		}else{
			return false;
		}
    }
	
	function tgl() {
        $tgl = date('Y-d-m');
        return $tgl;
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
	
	function sum($uid) {
		 $query =$this->db->query("SELECT COUNT(`status`) as sum FROM pesan WHERE `status`='belum' and uid='$uid'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
}