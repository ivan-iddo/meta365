 <div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'menager';?>">
          <i class="nav-icon icon-speedometer"></i> Dashboard
        </a>
      </li>
      <li class="nav-title">Product</li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'pulsa/pulsa_m';?>">
          <i class="nav-icon fa fa-mobile"></i> View Pulsa</a>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-plane"></i> View Ticketing</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'travel/kai_m';?>">
              <i class="nav-icon fa fa-train"></i> View KAI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'travel/pesawat_m';?>">
              <i class="nav-icon fa fa-plane"></i> View Pesawat</a>
          </li>
        </ul>
      </li>
      <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#">
          <i class="nav-icon fa fa-percent"></i> View PPOB</a>
        <ul class="nav-dropdown-items">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/pdam_m';?>">
              <i class="nav-icon fa fa-tint"></i> View PDAM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/pln_m';?>">
              <i class="nav-icon fa fa-bolt"></i> View PLN</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/multifinance_m';?>">
              <i class="nav-icon fa fa-bolt"></i> View Multifinance</a>
          </li>
		   <li class="nav-item">
            <a class="nav-link" href="<?=base_url().'ppob/telkom_m';?>">
              <i class="nav-icon fa fa-bolt"></i> View Telkom</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'emoney/emoney_m';?>">
          <i class="nav-icon fa fa-credit-card"></i> View E-Money
          <span class="badge badge-info">NEW</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'gamevoucher/gamevoucher_m';?>">
          <i class="nav-icon fa fa-gamepad"></i> View Voucher Game</a>
      </li>
    </ul>
  </nav>
  <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>