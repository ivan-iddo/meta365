<?php $this->load->view('include/header');?>
<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
		  <?php
			foreach ($activ as $active) {
			?>
		  <?= form_open('users/update');?>
            <h1>Active Akun</h1>
            <p class="text-muted">Create your account</p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" type="text" id="username" name="username" value="<?php echo $active->username ?>" maxlength="12" disabled>
              </div>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" id="email" name="email" value="<?php echo $active->email ?>" disabled>
              </div>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fa fa-level-up"></i>
                  </span>
                </div>
				<select class="form-control select2-single" name="level" id="level" required>
					<option value="8">Menager</option>
					<option value="4">Business Partner</option>
					<option value="1">User</option>
				</select>
              </div>
			  <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $active->user_id ?>">
              <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit" value="Login" name="submit" id="submit_button">Active Akun</button>
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
<?php $this->load->view('include/script');?>