<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
	function __construct() {
        parent::__construct();
		$this->load->model(array('pesan_model','user','payment_model'));
        $this->load->library('form_validation');
    }

	// -----------------------------------------------------------------------

	/**
	 * Demonstrate being redirected to login.
	 * If you are logged in and request this method,
	 * you'll see the message, otherwise you will be
	 * shown the login form. Once login is achieved,
	 * you will be redirected back to this method.
	 */
	public function index()
	{
		if( $this->require_role('admin') )
		{

			echo '<p>You are logged in!</p>';

		}
	}

	public function profile()
	{
		if( $this->require_role('admin, user, businesspartner') )
		{
		$uid = $this->auth_data->user_id;
		$prof = $this->user->get_by_id($uid);
		$uid = $this->auth_data->user_id;
		$pesan = $this->pesan_model->get_by($uid);
		$sum= $this->pesan_model->sum($uid);
		$sum_payment= $this->payment_model->sum($uid);
		if ($prof) {
		$data = array(
            'pesan' => $pesan,
            'sum' => $sum,
            'sum_payment' => $sum_payment,
           'username' => $prof->username,
           'email' => $prof->email,
           'last_login' => $prof->last_login,
           'module' => "user/profile",
           'module_name' => "Profile",
		);
		$this->load->view('include/layout', $data);
		}
		}
	}
	
	public function register()
	{
		$this->load->view('user/register','',FALSE);
	}

	/**
	 * This login method only serves to redirect a user to a 
	 * location once they have successfully logged in. It does
	 * not attempt to confirm that the user has permission to 
	 * be on the page they are being redirected to.
	 */
	public function login()
	{
		// Method should not be directly accessible
		if( $this->uri->uri_string() == 'users/login')
			show_404();

		if( strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post' )
			$this->require_min_level(1);

		$this->setup_login_form();

		$this->load->view('login','',FALSE);
	}

	// --------------------------------------------------------------

	/**
	 * Log out
	 */
	public function logout()
	{
		$this->authentication->logout();

		// Set redirect protocol
		$redirect_protocol = USE_SSL ? 'https' : NULL;

		redirect( site_url( LOGIN_PAGE . '?' . AUTH_LOGOUT_PARAM . '=1', $redirect_protocol ) );
	}

	public function create_user()
	{
		// Customize this array for your user
		$user_data = [
			'username'   => $this->input->post("username"),
			'passwd'     => $this->input->post("password"),
			'repassword' => $this->input->post("repassword"),
			'email'      => $this->input->post("email"),
			'auth_level' => '1', // 1,6,9 if you want to login @ examples/index.
		];

		$this->is_logged_in();
		
		// Load resources
		$this->load->helper('auth');
		$this->load->model('examples/examples_model');
		$this->load->model('examples/validation_callables');
		$this->load->library('form_validation');

		$this->form_validation->set_data($user_data);

		$validation_rules = [
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'Username already in use.'
				]
			],
			[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'matches[repassword]',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field' => 'repassword',
				'label' => 'repassword',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'integer|in_list[1]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );

		if( $this->form_validation->run() )
		{
			$data['username']   = $this->input->post("username");
			$data['email']     = $this->input->post("email");
			$data['auth_level'] = '1';
			$data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			$data['user_id']    = $this->examples_model->get_unused_id();
			$data['created_at'] = date('Y-m-d H:i:s');

			$this->db->set($data)
				->insert(db_table('user_table'));
				$this->session->set_flashdata('notif', 
			  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have successfully register.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>');
		}
		else
		{
			validation_errors();
			$this->session->set_flashdata('notif', 
			  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> You have gagal register.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>');
		}
		echo $this->load->view('user/register', '', TRUE);
	}
	
	public function create()
	{
		// Customize this array for your user
		$user_data = [
			'username'   => $this->input->post("username"),
			'passwd'     => $this->input->post("password"),
			'repassword'     => $this->input->post("repassword"),
			'email'      => $this->input->post("email"),
			'auth_level' => $this->input->post("level"), // 1,6,9 if you want to login @ examples/index.
		];

		$this->is_logged_in();
		
		// Load resources
		$this->load->helper('auth');
		$this->load->model('examples/examples_model');
		$this->load->model('examples/validation_callables');
		$this->load->library('form_validation');

		$this->form_validation->set_data($user_data);

		$validation_rules = [
			[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'is_unique[' . db_table('user_table') . '.username]',
				'errors' => [
					'is_unique' => 'Username already in use.'
				]
			],
				[
				'field' => 'passwd',
				'label' => 'passwd',
				'rules' => [
					'trim',
					'matches[repassword]',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field' => 'repassword',
				'label' => 'repassword',
				'rules' => [
					'trim',
					'required',
					[ 
						'_check_password_strength', 
						[ $this->validation_callables, '_check_password_strength' ] 
					]
				],
				'errors' => [
					'required' => 'The password field is required.'
				]
			],
			[
				'field'  => 'email',
				'label'  => 'email',
				'rules'  => 'trim|valid_email|is_unique[' . db_table('user_table') . '.email]',
				'errors' => [
					'is_unique' => 'Email address already in use.'
				]
			],
			[
				'field' => 'auth_level',
				'label' => 'auth_level',
				'rules' => 'integer|in_list[1,4,6,8,9]'
			]
		];

		$this->form_validation->set_rules( $validation_rules );

		if( $this->form_validation->run() )
		{
			$data['username']   = $this->input->post("username");
			$data['email']     = $this->input->post("email");
			$data['auth_level'] = $this->input->post("level");
			$data['passwd']     = $this->authentication->hash_passwd($user_data['passwd']);
			$data['user_id']    = $this->examples_model->get_unused_id();
			$data['created_at'] = date('Y-m-d H:i:s');

			$this->db->set($data)
				->insert(db_table('user_table'));
				$this->session->set_flashdata('notif', 
			  '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have successfully register.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>');
			  

		}
		else
		{
			validation_errors();
			$this->session->set_flashdata('notif', 
			  '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> You have gagal register.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>');
		}
		echo $this->load->view('user/register', '', TRUE);
	}

	// --------------------------------------------------------------

	/**
	 * User recovery form
	 */
	public function recover()
	{
		// Load resources
		$this->load->model('examples/examples_model');

		/// If IP or posted email is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{
			// If the form post looks good
			if( $this->tokens->match && $this->input->post('email') )
			{
				if( $user_data = $this->examples_model->get_recovery_data( $this->input->post('email') ) )
				{
					// Check if user is banned
					if( $user_data->banned == '1' )
					{
						// Log an error if banned
						$this->authentication->log_error( $this->input->post('email', TRUE ) );

						// Show special message for banned user
						$view_data['banned'] = 1;
					}
					else
					{
						/**
						 * Use the authentication libraries salt generator for a random string
						 * that will be hashed and stored as the password recovery key.
						 * Method is called 4 times for a 88 character string, and then
						 * trimmed to 72 characters
						 */
						$recovery_code = substr( $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt() 
							. $this->authentication->random_salt(), 0, 72 );

						// Update user record with recovery code and time
						$this->examples_model->update_user_raw_data(
							$user_data->user_id,
							[
								'passwd_recovery_code' => $this->authentication->hash_passwd($recovery_code),
								'passwd_recovery_date' => date('Y-m-d H:i:s')
							]
						);

						// Set the link protocol
						$link_protocol = USE_SSL ? 'https' : NULL;

						// Set URI of link
						$link_uri = 'examples/recovery_verification/' . $user_data->user_id . '/' . $recovery_code;

						$view_data['special_link'] = anchor( 
							site_url( $link_uri, $link_protocol ), 
							site_url( $link_uri, $link_protocol ), 
							'target ="_blank"' 
						);

						$view_data['confirmation'] = 1;
					}
				}

				// There was no match, log an error, and display a message
				else
				{
					// Log the error
					$this->authentication->log_error( $this->input->post('email', TRUE ) );

					$view_data['no_match'] = 1;
				}
			}
		}

		echo $this->load->view('examples/page_header', '', TRUE);

		echo $this->load->view('examples/recover_form', ( isset( $view_data ) ) ? $view_data : '', TRUE );

		echo $this->load->view('examples/page_footer', '', TRUE);
	}

	// --------------------------------------------------------------

	/**
	 * Verification of a user by email for recovery
	 * 
	 * @param  int     the user ID
	 * @param  string  the passwd recovery code
	 */
	public function recovery_verification( $user_id = '', $recovery_code = '' )
	{
		/// If IP is on hold, display message
		if( $on_hold = $this->authentication->current_hold_status( TRUE ) )
		{
			$view_data['disabled'] = 1;
		}
		else
		{
			// Load resources
			$this->load->model('examples/examples_model');

			if( 
				/**
				 * Make sure that $user_id is a number and less 
				 * than or equal to 10 characters long
				 */
				is_numeric( $user_id ) && strlen( $user_id ) <= 10 &&

				/**
				 * Make sure that $recovery code is exactly 72 characters long
				 */
				strlen( $recovery_code ) == 72 &&

				/**
				 * Try to get a hashed password recovery 
				 * code and user salt for the user.
				 */
				$recovery_data = $this->examples_model->get_recovery_verification_data( $user_id ) )
			{
				/**
				 * Check that the recovery code from the 
				 * email matches the hashed recovery code.
				 */
				if( $recovery_data->passwd_recovery_code == $this->authentication->check_passwd( $recovery_data->passwd_recovery_code, $recovery_code ) )
				{
					$view_data['user_id']       = $user_id;
					$view_data['username']     = $recovery_data->username;
					$view_data['recovery_code'] = $recovery_data->passwd_recovery_code;
				}

				// Link is bad so show message
				else
				{
					$view_data['recovery_error'] = 1;

					// Log an error
					$this->authentication->log_error('');
				}
			}

			// Link is bad so show message
			else
			{
				$view_data['recovery_error'] = 1;

				// Log an error
				$this->authentication->log_error('');
			}

			/**
			 * If form submission is attempting to change password 
			 */
			if( $this->tokens->match )
			{
				$this->examples_model->recovery_password_change();
			}
		}

		echo $this->load->view('examples/page_header', '', TRUE);

		echo $this->load->view( 'examples/choose_password_form', $view_data, TRUE );

		echo $this->load->view('examples/page_footer', '', TRUE);
	}

	// -----------------------------------------------------------------------

	/**
	 * If you are using some other way to authenticate a created user, 
	 * such as Facebook, Twitter, etc., you will simply call the user's 
	 * record from the database, and pass it to the maintain_state method.
	 *
	 * So, you must know either the user's username or email address to 
	 * log them in.
	 *
	 * How you would safely implement this in your application is your choice.
	 * Please keep in mind that such functionality bypasses all of the 
	 * checks that Community Auth does during a normal login.
	 */
	public function social_login()
	{
		// Add the username or email address of the user you want logged in:
		$username_or_email_address = '';

		if( ! empty( $username_or_email_address ) )
		{
			$auth_model = $this->authentication->auth_model;

			// Get normal authentication data using username or email address
			if( $auth_data = $this->{$auth_model}->get_auth_data( $username_or_email_address ) )
			{
				/**
				 * If redirect param exists, user redirected there.
				 * This is entirely optional, and can be removed if 
				 * no redirect is desired.
				 */
				$this->authentication->redirect_after_login();

				// Set auth related session / cookies
				$this->authentication->maintain_state( $auth_data );
			}
		}
		else
		{
			echo 'Example requires that you set a username or email address.';
		}
	}
}
