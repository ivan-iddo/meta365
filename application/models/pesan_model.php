<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pesan_model extends CI_model{
	public $table = 'chat';
    public $id1 = 'send_to';
	public $id = 'chat_id';
    public $order = 'DESC';



public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('chat')
				 ->order_by('id', 'DESC')
				 ->get();
		return $query->result();
	}

	function get_by($uid){
		$query =$this->db->query("SELECT * FROM chat,users where `status`='Belum' and chat.send_by = users.user_id and send_to='$uid' order by chat_id DESC limit 6");
    return $query->result();
    }
	
	function get_by_full($uid){
		$query =$this->db->query("SELECT * FROM chat,users where chat.send_by = users.user_id and send_to='$uid' order by chat_id DESC");
    return $query->result();
    }
	
	function get_by_pesan($uid){
		$query =$this->db->query("SELECT * FROM chat,users where chat.send_by = users.user_id and send_to='$uid' order by chat_id DESC");
    return $query->result();
    }
	
    function get_by_id($uid, $id) {
        $query =$this->db->query("SELECT * FROM chat,users where chat.send_by = users.user_id and send_to='$uid' and chat_id='$id'");
    return $query->result();
	}
	
	function status($id) {
        $query =$this->db->query("UPDATE chat SET status='Sudah' WHERE chat_id='$id'");
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
		 $query =$this->db->query("SELECT COUNT(`status`) as sum FROM chat WHERE `status`='Belum' and send_to='$uid'");
    $data = $query->row_array();
	$sum = $data['sum'];
    return $sum;
    }
}