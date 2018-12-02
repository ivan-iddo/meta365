<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class price_model extends CI_model{
	public $table = 'pricelist';
    public $id = 'pricelist_id';
    public $order = 'DESC';

	
	function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
	
	function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}