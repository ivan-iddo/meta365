<?php $this->load->view('include/header');?>
<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
		    <?= form_open('users/create_user');?>
            <h3>Forgot Password</h3>
			  <?=$this->session->flashdata('notif')?>
			  <?php echo form_error('email') ?>
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
<?php $this->load->view('include/script');?>
