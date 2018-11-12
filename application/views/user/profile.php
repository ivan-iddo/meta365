<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
	<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
          <div class="card-body">
		  <?php
			foreach ($profil as $profil) {
			?>
            <center><h1>Profile</h1></center>
            <p class="text-muted">account <?php echo $profil->username ?></p>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="icon-user"></i>
                  </span>
                </div>
                <input class="form-control" value="<?php echo $profil->username ?>" maxlength="12" disabled>
              </div>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input class="form-control" value="<?php echo $profil->email ?>" disabled>
              </div>
			  <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">
					<i class="fa fa-calendar"></i>
					</span>
                </div>
                <input class="form-control" value="<?php echo $profil->last_login ?>" disabled>
              </div>
		 <?php
			}
		 ?>
          </div>
        </div>
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>