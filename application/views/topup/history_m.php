<main class="main">
  <?php $this->load->view('include/breadcrumb_m');?>
  <div class="container-fluid">
    <div class="animated fadeIn">  
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
                    <th>User</th>
                  </tr>
                </thead>
                <tbody>
				<?php
                 $no = 0;
                 foreach ($topup as $topup) {
                 ?>
                 <tr>
                   <td><?php echo ++$no ?></td>
                   <td><?php echo $topup->transaction_id ?></td>
                   <td><?php echo $topup->product_id ?> Saldo IDR Rp. <?php echo number_format($topup->debit, 0, ',', '.')?></td>
                   <td><?php echo $topup->date_transaction ?></td>
                   <td><?php echo $topup->status ?></td>
                   <td><?php echo $topup->username ?></td>
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