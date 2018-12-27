<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_products extends CI_model{
	private $table = 'products';

	public function select($params = array()){
		
		$this->db->select('*');
	 	$this->db->from($this->table);
	 	$this->db->where($params);
    	$result = $this->db->get()->result_array();
		return $result;

	}
}