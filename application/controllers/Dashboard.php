<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
<<<<<<< HEAD

=======
	
>>>>>>> origin/BackEnd
	public function index()
	{
		if( $this->require_role('admin') )
		{
<<<<<<< HEAD

=======
>>>>>>> origin/BackEnd
			$data['module'] = "dashboard";
			$data['module_name'] = "Dashboard";
		
			$this->load->view('include/layout', $data);
<<<<<<< HEAD

=======
>>>>>>> origin/BackEnd
		}
	}
}