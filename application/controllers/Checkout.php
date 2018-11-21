<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MY_Controller {
	function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		if( $this->require_role('admin, user, businesspartner') )
		{
		$this->load->view('errors/html/error');
		}
	}
}