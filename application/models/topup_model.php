<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class topup_model extends CI_model{
	public $table = 'topup';
    public $id = 'transaction_id';
    public $order = 'DESC';


	public function get_all()
	{
		$query = $this->db->select("*")
				 ->from('topup')
				 ->get();
		return $query->result();
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
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
	
	function kode(){
		$query = $this->db->query("SELECT * FROM product WHERE product='PULSA' and product_type='$kode' ORDER BY product_name ASC");

		 if ($query->num_rows() > 0) { 
            foreach ($query->result() as $data) { 
                $hasil[] = $data; 
            } 
            return $hasil; 
        } 
	}
	
	function kdotomatis() {
        $jenis = 'UP'.date('ym');
        $query = $this->db->query("SELECT max(transaction_id) as maxID FROM topup WHERE transaction_id LIKE '$jenis%'");
        $data = $query->row_array();
        $idMax = $data['maxID'];
        $noUrut = (int) substr($idMax, 6, 3);
        $noUrut++;
        $newID = $jenis . sprintf("%03s", $noUrut);
        return $newID;
    }

	function id($id){
    $query =$this->db->query("SELECT * FROM topup WHERE uid='$id'");
    return $query->result();
    }

}