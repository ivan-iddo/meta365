<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
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
                  <input id="option1" name="option1" type="radio" name="options" autocomplete="off"> Day
                </label>
                <label class="btn btn-outline-secondary">
                  <input id="option2" name="option2" type="radio" name="options" autocomplete="off"> Month
                </label>
                <label class="btn btn-outline-secondary active">
                  <input id="option3" name="option3" type="radio" name="options" autocomplete="off"> Year
                </label>
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
		  <?php
          foreach ($data as $data) {
          $product_tahun[]=$data->product;
          $tahun=$data->tahun;
          $jumlah[]=$data->jumlah;
          }
          ?>
          <div class="chart-wrapper" style="height:300px;margin-top:40px;">
            <canvas class="chart" id="chart" height="300"></canvas>
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
      
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">History</div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">
                      No.
                    </th>
                    <th>TRX ID</th>
                    <th>Info</th>
                    <th>Date</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
				<?php
                 $no = 0;
                 foreach ($history as $history) {
                 ?>
                 <tr>
                   <td><?php echo ++$no ?></td>
                   <td><?php echo $history->transaction_id ?></td>
                   <td><?php echo $history->product_id ?> Saldo IDR Rp.
				   <?php echo number_format($history->debit, 0, ',', '.')?>
				   </td>
                   <td><?php echo $history->date_transaction ?></td>
                   <td><?php echo $history->status ?></td>
                 </tr>
                 <?php
                 }
                 ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/@coreui/coreui-pro/js/coreui.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/vendors/chart.js/js/Chart.min.js"></script>
<script>
var mainChart = new Chart($('#chart'), {
  type: 'line',
  data: {
    labels: <?php echo json_encode($product_tahun);?>,
	datasets: [{
	label: <?php echo $tahun;?>,
      backgroundColor: hexToRgba(getStyle('--info'), 5),
      borderColor: getStyle('--info'),
      pointHoverBackgroundColor: '#fff',
      borderWidth: 2,
      data: <?php echo json_encode($jumlah);?>
    },
	]
  },
  options: {
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          drawOnChartArea: false
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
          maxTicksLimit: 5,
          stepSize: Math.ceil(250 / 5),
          max: 250
        }
      }]
    },
    elements: {
      point: {
        radius: 0,
        hitRadius: 10,
        hoverRadius: 4,
        hoverBorderWidth: 3
      }
    }
  }
});
</script>