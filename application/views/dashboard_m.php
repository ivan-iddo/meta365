<main class="main">
  <?php $this->load->view('include/breadcrumb_m');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-5">
              <h4 class="card-title mb-0">Transaction</h4>
              <div class="small text-muted">October 2018</div>
            </div>
            <!-- /.col-->
            <div class="col-sm-7 d-none d-md-block">
              <button class="btn btn-primary float-right" type="button">
                <i class="icon-cloud-download"></i>
              </button>
              <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
                <label class="btn btn-outline-secondary">
                  <input id="option1" type="radio" name="options" autocomplete="off"> Day
                </label>
                <label class="btn btn-outline-secondary active">
                  <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month
                </label>
                <label class="btn btn-outline-secondary">
                  <input id="option3" type="radio" name="options" autocomplete="off"> Year
                </label>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
		  <?php
			foreach($product as $data){
				$product[] = $data->product_id;
				$kredit[] = (float) $data->debit;
			}
		  ?>
          <div class="chart-wrapper" style="height:300px;margin-top:40px;">
            <canvas class="chart" id="main-chart" height="300"></canvas>
          </div>
        </div>
       <div class="card-footer">
          <div class="row text-center">
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Pulsa</div>
              <strong><?php echo number_format($pulsa , 0, ',', '.') ?> Transaction</strong>
              <div class="progress progress-xs mt-2">
			  <?php $bar=100/($total/$pulsa) ?>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $bar ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Ticket & Travel</div>
              <strong><?php echo number_format($tiket , 0, ',', '.') ?> Transaction</strong>
              <div class="progress progress-xs mt-2">
			  <?php $bar1=100/($total/$tiket) ?>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $bar1 ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">PPOB</div>
              <strong><?php echo number_format($ppob , 0, ',', '.')?> Transaction</strong>
              <div class="progress progress-xs mt-2">
			  <?php $bar2=100/($total/$ppob) ?>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $bar2 ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">Voucher Game</div>
              <strong><?php echo number_format($game, 0, ',', '.') ?> Transaction</strong>
              <div class="progress progress-xs mt-2">
			  <?php $bar3=100/($total/$game) ?>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $bar3 ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="col-sm-12 col-md mb-sm-2 mb-0">
              <div class="text-muted">e-Money</div>
              <strong><?php echo number_format($emoney, 0, ',', '.') ?> Transaction</strong>
              <div class="progress progress-xs mt-2">
			  <?php $bar4=100/($total/$emoney) ?>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $bar4 ?>%" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>