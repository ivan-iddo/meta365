<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_model{
	public $table = 'product';
    public $id = 'product_id';
    public $order = 'DESC';


	public function get_all()
	{
		$query = $this->db->query("SELECT * FROM product order by product_id DESC");
		return $query->result();
	}
	
	function get_by($id){
		$query =$this->db->query("SELECT * FROM product where product_id='$id'");
    return $query->result();
    }
	
	function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
	
	function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
	
	function jumlah() {
        $query =$this->db->get('product');
        return $query->num_rows();
    }
	
	function lihat($sampai,$dari,$pencarian){
		if ($pencarian){
			$this->db->like('product_name',$pencarian);
		}
		$query =$this->db->query("SELECT product,product_name,price_sell,product.product_id FROM product LEFT JOIN pricelist ON product.product_id=pricelist.product_id ORDER BY `product` DESC LIMIT $sampai OFFSET $dari");
		return $query->result();
    }
	
	function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}