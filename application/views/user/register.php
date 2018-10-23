<?php $this->load->view('include/header');?>

<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
            <h1>Register</h1>
            <p class="text-muted">Create your account</p>

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

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('include/script');?>