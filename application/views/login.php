<?php $this->load->view('include/header');?>

<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
            <h1>Login</h1>
            <p class="text-muted">Sign In to your account</p>

            <?php if(isset( $on_hold_message )) :?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> You have exceeded the maximum number of failed login.
                Your access to login and account recovery has been blocked for <?=( (int) config_item('seconds_on_hold') / 60 ) ;?> minutes.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <?php endif;?>

            <?php if(isset( $login_error_mesg )) :?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> <?=$login_error_mesg;?>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <?php endif;?>

            <?php if($this->input->get(AUTH_LOGOUT_PARAM)) :?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have successfully logged out.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <?php endif;?>

            <?= form_open( $login_url );?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" type="text" name="login_string" placeholder="Username">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" name="login_pass" placeholder="Password">
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit" value="Login" name="submit" id="submit_button" <?=(isset( $on_hold_message ) ? 'disabled' : '')?>>Login</button>
                </div>
                <div class="col-6 text-right">
                  <a href="<?php echo site_url('users/recover', (USE_SSL ? 'https' : NULL)); ?>" class="btn btn-link px-0" >Forgot password?</a>
                </div>
              </div>
            <?= form_close();?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('include/script');?>