 <div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'dashboard';?>">
          <i class="nav-icon icon-speedometer"></i> Dashboard
        </a>
      </li>
      <!-- contoh menu admin buat yadi -->
      <?php if($this->require_role('admin')):?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'users';?>">
          <i class="nav-icon icon-people"></i> User Management
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'payment';?>">
          <i class="nav-icon icon-list"></i> Payment
        </a>
      </li>
      <?php endif;?>
      <!-- end contoh buat yadi -->

      <!-- contoh menu manager buat yadi -->
      <?php if($this->require_role('manager')):?>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'Profit';?>">
          <i class="nav-icon icon-graph"></i> Profit
        </a>
      </li>
      <?php endif;?>
      <!-- end contoh buat yadi -->
      <li class="nav-title">Product</li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'pulsa';?>">
          <i class="nav-icon fa fa-mobile"></i> Pulsa</a>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-plane"></i> Travel & Ticketing</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'travel/kai';?>">
              <i class="nav-icon fa fa-train"></i> KAI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'travel/pesawat';?>">
              <i class="nav-icon fa fa-plane"></i> Pesawat</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-percent"></i> PPOB</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/pdam';?>">
              <i class="nav-icon fa fa-tint"></i> PDAM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/pln';?>">
              <i class="nav-icon fa fa-bolt"></i> PLN</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/multifinance';?>">
              <i class="nav-icon fa fa-credit-card"></i> Multifinance</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/telkom';?>">
              <i class="nav-icon fa fa-phone"></i> Telpon</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/tv';?>">
              <i class="nav-icon fa fa-tv"></i> TV</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'emoney';?>">
          <i class="nav-icon fa fa-credit-card-alt"></i> E-Money
          <span class="badge badge-info">NEW</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'gamevoucher';?>">
          <i class="nav-icon fa fa-gamepad"></i> Voucher Game</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'bpjs';?>">
          <i class="nav-icon fa fa-shield"></i> Asuransi BPJS</a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>