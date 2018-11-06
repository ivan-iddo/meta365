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
			$showform = 1;

			if( isset( $validation_errors ) )
			{
				echo '
					<div style="border:1px solid red;">
						<p>
							The following error occurred while changing your password:
						</p>
						<ul>
							' . $validation_errors . '
						</ul>
						<p>
							PASSWORD NOT UPDATED
						</p>
					</div>
				';
			}
			else
			{
				$display_instructions = 1;
			}

			if( isset( $validation_passed ) )
			{
				echo '
					<div style="border:1px solid green;">
						<p>
							You have successfully changed your password.
						</p>
						<p>
							You can now <a href="/meta365/">login</a>
						</p>
					</div>
				';

				$showform = 0;
			}
			if( isset( $recovery_error ) )
			{
				echo '
					<div style="border:1px solid red;">
						<p>
							No usable data for account recovery.
						</p>
						<p>
							Account recovery links expire after 
							' . ( (int) config_item('recovery_code_expiration') / ( 60 * 60 ) ) . ' 
							hours.<br />You will need to use the 
							<a href="/meta365/users/recover">Account Recovery</a> form 
							to send yourself a new link.
						</p>
					</div>
				';

				$showform = 0;
			}
			if( isset( $disabled ) )
			{
				echo '
					<div style="border:1px solid red;">
						<p>
							Account recovery is disabled.
						</p>
						<p>
							You have exceeded the maximum login attempts or exceeded the 
							allowed number of password recovery attempts. 
							Please wait ' . ( (int) config_item('seconds_on_hold') / 60 ) . ' 
							minutes, or contact us if you require assistance gaining access to your account.
						</p>
					</div>
				';

				$showform = 0;
			}
			if( $showform == 1 )
			{
				if( isset( $recovery_code, $user_id ) )
				{
					if( isset( $display_instructions ) )
					{
						if( isset( $username ) )
						{
							echo '<p>
								Your login user name is <i>' . $username . '</i><br />
								Please write this down, and change your password now:
							</p>';
						}
						else
						{
							echo '<p>Please change your password now:</p>';
						}
					}
				}	
				?>
				<?php echo form_open(); ?>
				<h3>Forgot Password</h3>
				  <div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
						<i class="icon-lock"></i>
						</span>
					</div>
					<input class="form-control" type="password" id="passwd" name="passwd" placeholder="Password" required>
				  </div>
				  <div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text">
						<i class="icon-lock"></i>
						</span>
					</div>
					<input class="form-control" type="password" id="passwd_confirm" name="passwd_confirm" placeholder="Password confirm" required>
				  </div>
				<?php
				echo form_hidden('recovery_code',$recovery_code);
				echo form_hidden('user_identification',$user_id);
				?>
				  <div class="row">
					<div class="col-6">
					  <button class="btn btn-primary px-4" type="submit" value="Change Password" name="form_submit" id="submit_button">Kirim</button>
					</div>
				  </div>
					<?php
				}
				?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>