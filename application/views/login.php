<?php $this->load->view('include/header');?>

<body class="app flex-row align-items-center">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card-group">
        <div class="card p-4">
          <div class="card-body">
            <h1>Masuk</h1>
            <p class="text-muted">Masuk kedalam akun anda</p>

            <?php if(isset( $on_hold_message )) :?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Peringatan!</strong> Anda telah melebihi batas maksimal kegagalan.
                Akses anda akan di blokir selama <?=( (int) config_item('seconds_on_hold') / 60 ) ;?> menit.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <?php endif;?>

            <?php if(isset( $login_error_mesg )) :?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Peringatan!</strong> <?=$login_error_mesg;?>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <?php endif;?>

            <?php if($this->input->get(AUTH_LOGOUT_PARAM)) :?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Suksess!</strong> Anda telah berhasil keluar.
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
                <input class="form-control" type="text" name="login_string" placeholder="Nama Pengguna">
              </div>
              <div class="input-group mb-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-lock"></i>
                  </span>
                </div>
                <input class="form-control" type="password" name="login_pass" placeholder="Sandi Anda">
              </div>
             <div class="row">
                <div class="col-6">
                  <button class="btn btn-primary px-4" type="submit" value="Login" name="submit" id="submit_button" <?=(isset( $on_hold_message ) ? 'disabled' : '')?>>Masuk</button>
                </div>
                <div class="col-6 text-right">
                  <a href="<?php echo site_url('users/recover', (USE_SSL ? 'https' : NULL)); ?>" class="btn btn-link px-0" >Lupa Sandi Anda?</a>
                </div>
				<div class="col-12 text-right">
                  <a href="<?php echo site_url('users/register'); ?>" class="btn btn-link px-0" >Buat Akun Baru</a>
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