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
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle"></i>&nbsp;<?= $gtpay_user_name;?>
        <?php if (ENVIRONMENT === 'development'):?>
          <span class="badge badge-pill badge-danger"><?='Dev_'.CI_VERSION;?></span>
        <?php endif;?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-header text-center">
          <strong>Account</strong>
        </div>
        <a class="dropdown-item" href="<?=base_url().'users/profile';?>">
          <i class="fa fa-user"></i> Profile</a>
        <a class="dropdown-item" href="<?=base_url().'payment';?>">
          <i class="fa fa-usd"></i> Payments
          <span class="badge badge-dark">0</span>
        </a>
        <div class="divider"></div>
        <a class="dropdown-item" href="<?=base_url();?>logout">
          <i class="fa fa-lock"></i> Logout</a>
      </div>
    </li>
  </ul>
  <button class="navbar-toggler aside-menu-toggler d-md-down-none " type="button" data-toggle="aside-menu-lg-show">
    &nbsp;
  </button>
</header>