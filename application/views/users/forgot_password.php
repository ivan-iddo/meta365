<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Recover Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?>
<?php $this->load->view('include/header');?>
	<body class="app flex-row align-items-center">
	<div class="container">
	  <div class="row justify-content-center">
		<div class="col-md-6">
		  <div class="card-group">
			<div class="card p-4">
			  <div class="card-body">
			  <?php
				if( isset( $disabled ) )
				{
					echo '
						<div style="border:1px solid red;">
							<p>
								Account Recovery is Disabled.
							</p>
							<p>
								If you have exceeded the maximum login attempts, or exceeded
								the allowed number of password recovery attempts, account recovery 
								will be disabled for a short period of time. 
								Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
								minutes, or contact us if you require assistance gaining access to your account.
							</p>
						</div>
					';
				}
				else if( isset( $banned ) )
				{
					echo '
						<div style="border:1px solid red;">
							<p>
								Account Locked.
							</p>
							<p>
								You have attempted to use the password recovery system using 
								an email address that belongs to an account that has been 
								purposely denied access to the authenticated areas of this website. 
								If you feel this is an error, you may contact us  
								to make an inquiry regarding the status of the account.
							</p>
						</div>
					';
				}
				else if( isset( $confirmation ) )
				{
					echo '
							<p>
								Congratulations, you have created an account recovery link.
							</p>
							<p>
								"We have sent you an email with instructions on how 
								to recover your account."
							</p>
							<p>
								This is the account recovery link:
							</p>
							<p>' . $special_link . '</p>
					';
				}
				else if( isset( $no_match ) )
				{
					echo '
						<div  style="border:1px solid red;">
							<p class="feedback_header">
								Supplied email did not match any record.
							</p>
						</div>
					';

					$show_form = 1;
				}
				else
				{
					echo '
						<p>
							If you\'ve forgotten your password and/or username, 
							enter the email address used for your account, 
							and we will send you an e-mail 
							with instructions on how to access your account.
						</p>
					';

					$show_form = 1;
				}
				if( isset( $show_form ) )
				{
					?>
				<?php echo form_open(); ?>
				<h3>Forgot Password</h3>
				  <div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">@</span>
					</div>
					<input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
				  </div>
				  <div class="row">
					<div class="col-6">
					  <button class="btn btn-primary px-4" type="submit" value="Login" name="submit" id="submit_button">Kirim</button>
					</div>
				  </div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>

	<?php
}
/* End of file recover_form.php */
/* Location: /community_auth/views/examples/recover_form.php */