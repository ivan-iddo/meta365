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

    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

}