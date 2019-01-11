<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - MY Controller
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */

require_once APPPATH . 'third_party/community_auth/core/Auth_Controller.php';

class MY_Controller extends Auth_Controller
{
	/**
	 * The logged-in user's user saldo
	 *
	 * @var string
	 * @access public
	 */
	public $gtpay_user_saldo;

	/**
	 * The logged-in user's user name
	 *
	 * @var string
	 * @access public
	 */
	public $gtpay_user_name;

	/**
	 * The logged-in user's user role
	 *
	 * @var string
	 * @access public
	 */
	public $gtpay_user_role;

	/**
	 * The logged-in user's user ID
	 *
	 * @var string
	 * @access public
	 */
	public $gtpay_user_id;

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		parent::__construct();
		$this->_set_gtpay_variables();
	}

	protected function _set_gtpay_variables(){
			$this->is_logged_in();

			// Set user specific variables to be available in all views
			$data = [
				'gtpay_user_id' => $this->auth_user_id,
				'gtpay_user_name' => $this->auth_username,
				'gtpay_user_role' => $this->auth_role,
				'gtpay_user_saldo'  => $this->get_saldo($this->auth_user_id)
			];

	    	$this->load->vars($data);

	}

	protected function get_saldo($user_id){
		$this->load->model('Transactions_model');
		$last_trx = $this->Transactions_model->last(array("user_id"=>$user_id, "status"=>"SUCCESS"));
    	return ($last_trx?intval($last_trx[0]['balance']):0);
	}

	protected function get_hpp($price){
    	return intval($price) + 100;
	}

	protected function get_trx_id(){
		$now = date('Y-m-d H:i:s');
		$trx_id = 'TRX'.$this->auth_user_id.strtotime($now);
		return $trx_id;
	}

	protected function send_json($data){
	    $api_url = API_URL;
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $api_url);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 0);
	    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 500);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	    $result = curl_exec($ch); 
	    return $result;
	}
}

/* End of file MY_Controller.php */
/* Location: /community_auth/core/MY_Controller.php */