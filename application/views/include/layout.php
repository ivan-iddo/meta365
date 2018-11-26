<?php $this->load->view('include/header');?>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img class="navbar-brand-full" src="<?=base_url();?>img/brand/logo.svg" width="89" height="25" alt="GtPay.id Logo">
      <img class="navbar-brand-minimized" src="<?=base_url();?>img/brand/sygnet.svg" width="30" height="30" alt="GtPay.id Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
   <ul class="nav navbar-nav ml-auto">
	 <?php if($auth_role=='admin'):?>
      <li class="nav-item dropdown d-md-down-none">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="icon-envelope-letter"></i>
          <span class="badge badge-pill badge-info"><?php echo $sum ?></span>
        </a>
		    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
            <div class="dropdown-header text-center">
              <strong>You have <?php echo $sum ?> messages</strong>
            </div>
			<div data-spy="scroll" data-offset="0" style="height: 300px; overflow: auto">
			<?php foreach ($pesan as $pesan) { ?>
            <a class="dropdown-item" href="javascript:;" data-friend="<?= $pesan->user_id ?>">
              <div class="message">
                <div class="py-1 mr-1 float-left">
                  <div class="avatar">
                    <img class="img-avatar" src="<?= base_url('assets/icon/avatar.png') ?>">
                    <span class="avatar-status badge-success"></span>
                  </div>
                </div>
                <div>
                  <small class="text-muted float-right mt-1"><?php echo $pesan->time ?></small>
                </div>
                <div class="text-truncate font-weight-bold"><?php echo $pesan->username ?></div>
                <div class="small text-muted text-truncate"><?php echo $pesan->message ?></div>
              </div>
            </a>
			<?php
			}
			?>
			</div>
            <a class="dropdown-item text-center" href="<?=base_url().'pesan';?>">
              <strong>View all messages</strong>
            </a>
          </div>
      </li>
	<?php endif;?>
	<?php if($auth_role=='menager'|$auth_role=='user'|$auth_role=='businesspartner'):?>
      <li class="nav-item dropdown d-md-down-none">
	   <?php foreach ($admin->result() as $item) { ?>
        <a class="nav-link" data-toggle="dropdown"  href="javascript:;" data-friend="<?= $item->user_id ?>" role="button" aria-haspopup="true" aria-expanded="false">
		  <i class="icon-envelope-letter"></i>
          <span class="badge badge-pill badge-info"><?php echo $sum ?></span>
        </a>
      <?php } ?>
      </li>
	<?php endif;?>
      <li class="nav-item dropdown">
        <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle"></i><span style="margin-right: 30px;">&nbsp;<?= $auth_username;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="<?=base_url().'users/profile';?>">
            <i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="<?=base_url().'payment';?>">
            <i class="fa fa-usd"></i> Payments
            <span class="badge badge-dark"><?php echo $sum_payment ?></span>
          </a>
          <div class="divider"></div>
          <a class="dropdown-item" href="<?=base_url();?>logout">
            <i class="fa fa-lock"></i> Logout</a>
        </div>
      </li>
    </ul>
  </header>
  <div class="app-body">
    <?php $this->load->view('include/sidebar');?>
    <?php (is_file(APPPATH.'views/' . $module .'.php') ? $this->load->view($module): null);?>
  </div>
<?php $this->load->view('include/footer');?>
<?php $this->load->view('include/script');?>
<?php $this->load->view('include/chat');?>