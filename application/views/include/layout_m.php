<?php $this->load->view('include/header');?>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
  <header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
      <img class="navbar-brand-full" src="<?=base_url();?>img/brand/logo.svg" width="89" height="25" alt="Meta365 Logo">
      <img class="navbar-brand-minimized" src="<?=base_url();?>img/brand/sygnet.svg" width="30" height="30" alt="Meta365 Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown d-md-down-none">
        <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="icon-envelope-letter"></i>
          <span class="badge badge-pill badge-info">4</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
          <div class="dropdown-header text-center">
            <strong>You have 4 messages</strong>
          </div>
          <a class="dropdown-item" href="#" title="Deposit dengan nominal Rp.xxxxx berhasil, silahkan cek saldo Anda">
            <div class="message">
              <div class="text-truncate font-weight-bold">Deposit Berhasil</div>
              <div class="small text-muted text-truncate">Deposit dengan nominal Rp.xxxxx berhasil, silahkan cek saldo Anda</div>
            </div>
          </a>
          <a class="dropdown-item" href="#" title="Transaksi dengan kode TRX091230123 berhasil">
            <div class="message">
              <div class="text-truncate font-weight-bold">Transaksi Berhasil</div>
              <div class="small text-muted text-truncate">Transaksi dengan kode TRX091230123 berhasil</div>
            </div>
          </a>
          <a class="dropdown-item" href="#" title="Transaksi dengan kode TRX5312230123 berhasil">
            <div class="message">
              <div class="text-truncate font-weight-bold">Transaksi Berhasil</div>
              <div class="small text-muted text-truncate">Transaksi dengan kode TRX5312230123 berhasil</div>
            </div>
          </a>
          <a class="dropdown-item" href="#" title="Transaksi dengan kode TRX95544230123 berhasil">
            <div class="message">
              <div class="text-truncate font-weight-bold">Transaksi Berhasil</div>
              <div class="small text-muted text-truncate">Transaksi dengan kode TRX95544230123 berhasil</div>
            </div>
          </a>
          <a class="dropdown-item text-center" href="#">
            <strong>View all messages</strong>
          </a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-circle"></i><span style="margin-right: 30px;">&nbsp;<?= $auth_username;?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Account</strong>
          </div>
          <a class="dropdown-item" href="#">
            <i class="fa fa-user"></i> Profile</a>
          <a class="dropdown-item" href="#">
            <i class="fa fa-usd"></i> Payments
            <span class="badge badge-dark">42</span>
          </a>
          <div class="divider"></div>
          <a class="dropdown-item" href="<?=base_url();?>logout">
            <i class="fa fa-lock"></i> Logout</a>
        </div>
      </li>
    </ul>
  </header>
  <div class="app-body">
    <?php $this->load->view('include/sidebar_m');?>
    <?php (is_file(APPPATH.'views/' . $module .'.php') ? $this->load->view($module): null);?>
  </div>
<?php $this->load->view('include/footer');?>
<?php $this->load->view('include/script');?>