<?php $this->load->view('include/header');?>
<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
		  <?= form_open('users/create_user');?>
            <h1>Register</h1>
			<?=$this->session->flashdata('notif')?>
            <p class="text-muted">Create your account</p>
			<?php echo form_error('username') ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="12" required>
              </div>
			  <?php echo form_error('email') ?>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
				* Password min 8 char 1 number 1 lower and 1 upper case
              </div>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-level-up"></i>
                  </span>
                </div>
                <input class="form-control" type="text" name="level" placeholder="Level" required>
              </div>
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit" value="Login" name="submit" id="submit_button">Register New</button>
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