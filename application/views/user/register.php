<?php $this->load->view('include/header');?>
<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
		        <?= form_open('users/create_user');?>
            <h1>Registrasi</h1>
			       <?=$this->session->flashdata('notif')?>
            <p class="text-muted">Buat akun baru</p>
			       <?php echo form_error('username') ?>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" type="text" id="username" name="username" placeholder="Nama Pengguna" maxlength="12" required>
              </div>
			  <?php echo form_error('email') ?>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
              </div>
              <small class="text-muted">* Sandi minimum 8 karakter, terdiri dari 1 nomor 1 huruf kecil dan 1 huruf besar</small>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" id="password" name="password" placeholder="Sandi Baru" required>
              </div>
<<<<<<< HEAD
			      <div class="input-group mb-4">
=======
              <div class="input-group mb-4">
>>>>>>> origin/BackEnd
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-reload"></i>
                  </span>
                </div>
                <input class="form-control" type="password" id="repassword" name="repassword" placeholder="Ketik Ulang Sandi" required>
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