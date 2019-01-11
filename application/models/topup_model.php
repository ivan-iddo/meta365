<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Topup_model extends CI_Model

{

  public function read($params_array = array(), $or_params_array = array()){

    $this->db->select("*");

    if (is_array($params_array) && !empty($params_array)){
      foreach ($params_array as $key => $value) {
         if (is_array($value)) {
            $this->db->where_in($key , $value);
         }
         else{
          $this->db->where($key , $value);
         }
      }
    }

    if (is_array($or_params_array) && !empty($or_params_array)){
      foreach ($or_params_array as $key => $value) {
         if (is_array($value)) {
            $this->db->or_where_in($key , $value);
         }
         else{
          $this->db->or_where($key , $value);
         }
      }
    }

    $query = $this->db->get("transactions");

    return $query->result_array();
  }

  public function last($params_array = array()){

    $this->db->select("*");

    if (is_array($params_array) && !empty($params_array)){
      foreach ($params_array as $key => $value) {
         if (is_array($value)) {
            $this->db->where_in($key , $value);
         }
         else{
          $this->db->where($key , $value);
         }
      }
    }

    $this->db->order_by('created_at', 'DESC');
    $this->db->limit(1);

    $query = $this->db->get("transactions");

    return $query->result_array();
  }

  public function insert($data){

    if($this->db->insert('transaction',$data)){    
      return 'Data is inserted successfully';
    }else{
      return "Error has occured";
    }
  }

  public function update($data){
    $this->db->where('trx_id', $data['trx_id']);
    if($this->db->update('transactions', $data)){    
      return TRUE;
    }else{
      return FALSE;
    }
  }
}