 <div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'dashboard';?>">
          <i class="nav-icon icon-speedometer"></i> Dashboard
        </a>
      </li>
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
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'emoney';?>">
          <i class="nav-icon fa fa-credit-card"></i> E-Money
          <span class="badge badge-info">NEW</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'gamevoucher';?>">
          <i class="nav-icon fa fa-gamepad"></i> Voucher Game</a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>