<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tv_model extends CI_model{
	public $table = 'tv';
    public $id1 = 'transaction_id';
	public $id = 'product_id';
    public $order = 'DESC';



public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('tv')
				 ->order_by('id', 'DESC')
				 ->get();
		return $query->result();
	}

	
    // get data by id
	function get_by($id) {
        $this->db->where($this->id1, $id);
        return $this->db->get($this->table)->row();
    }
	
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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
    function update($id1, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id1, $id);
        $this->db->delete($this->table);
    }
	
	function kdotomatis() {
        $jenis = 'TV'.date('ym');
        $query = $this->db->query("SELECT max(transaction_id) as maxID FROM tv WHERE transaction_id LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 6, 3);
        $noUrut++;
        $ID = $jenis . sprintf("%03s", $noUrut);
        return $ID;
    }
	
	function id($id){
    $query =$this->db->query("SELECT * FROM product WHERE product='tv' and product_type='$id' ORDER BY product_name ASC");
       if ($query->num_rows() > 0) { 
            foreach ($query->result() as $data) { 
                $hasil[] = $data; 
            } 
            return $hasil; 
        } 
    }
	
	function data(){
    $query =$this->db->query("SELECT DISTINCT product_type FROM product WHERE product='tv' ORDER BY `product_type` ASC");
       if ($query->num_rows() > 0) { 
            foreach ($query->result() as $data) { 
                $hasil[] = $data; 
            } 
            return $hasil; 
        } 
    }
	
}