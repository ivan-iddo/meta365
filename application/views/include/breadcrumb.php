<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">GtPay.id</li>
  <li class="breadcrumb-item active"><?=$module_name;?></li>
  <!-- Breadcrumb Menu-->
  <li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
      <a class="btn" href="<?=base_url().'dashboard';?>">
        <i class="icon-graph"></i>  Dashboard</a>
	  <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
	  <?php
		  if($saldo==null){
			$up_saldo=0;
		  }else{
			$up_saldo=number_format($saldo , 0, ',', '.');
		  }
          ?>
	   <a class="btn" class="nav-link nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Saldo : <span>IDR <?php echo $up_saldo ?></span></a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Saldo</strong>
          </div>
          <a class="dropdown-item" href="<?=base_url().'topup';?>">
            <i class="fa fa-money"></i> Topup Saldo</a>
          <a class="dropdown-item" href="<?=base_url().'topup/history';?>">
            <i class="fa fa-usd"></i> History
          </a>
        </div>
      </li>
    </ul>
    </div>
  </li>
</ol>