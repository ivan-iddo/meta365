<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions_model extends CI_Model

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

    $this->db->order_by('updated_at', 'DESC');
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);

    $query = $this->db->get("transactions");

    return $query->result_array();
  }

  // --------------------------------------------------------------

  /**
   * Get an unused ID for user creation
   *
   * @return  int between 50 and 500
   */
  public function get_unused_code()
  {
      // Create a random user id between 50 and 500
      $random_unique_int = mt_rand( 50, 500 );

      // Make sure the random user_id isn't already in use
      $this->db->where( 'amount', $random_unique_int );
      $this->db->where( 'type', 'COD' );
      $this->db->where( 'status', '!=SUCCESS' );
      $query = $this->db->get('transactions');

      if( $query->num_rows() > 0 )
      {
          $query->free_result();

          // If the random user_id is already in use, try again
          return $this->get_unused_code();
      }

      return $random_unique_int;
  }


  public function insert($data){

    if($this->db->insert('transactions',$data)){    
      return 'Data is inserted successfully';
    }else{
      return "Error has occured";
    }
  }

  public function insert_batch($data){

    if($this->db->insert_batch('transactions',$data)){    
      return 'Data is inserted successfully';
    }else{
      return "Error has occured";
    }
  }

  public function update($data){
    $this->db->where('id', $data['id']);
    if($this->db->update('transactions', $data)){    
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function update_batch($data){
    $this->db->where('trx_id', $data['trx_id']);
    if($this->db->update_batch('transactions', $data)){    
      return TRUE;
    }else{
      return FALSE;
    }
  }
}