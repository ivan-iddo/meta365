 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
    <div class="container-fluid">
            <div class="email-app mb-4">
              <main class="inbox">
                <ul class="messages">
				  <div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header">Payment</div>
						<div class="card-body"> 
						  <table class="table table-responsive-sm table-hover table-outline mb-0">
							<thead class="thead-light">
							  <tr>
								<th class="text-center">
								  No.
								</th>
								<th>TRX ID</th>
								<th>Date</th>
								<th>Username</th>
								<th>Debit</th>
								<th>Status</th>
								<th>Actions</th>
							  </tr>
							</thead>
							<tbody>
							<?php
							if(!empty($status_payment)){
							if($this->uri->segment(3)){
								$no = $this->uri->segment(3);
								}else{
									$no = 0;
							}
							 foreach ($status_payment as $payment) {
							 ?>
							 <tr>
							   <td><?php echo ++$no ?>.</td>
							   <td><?php echo $payment->transaction_id ?></td>
							   <td><?php echo $payment->date_transaction ?></td>
							   <td><?php echo $payment->username ?></td>
							   <td>Rp. <?php echo number_format($payment->debit , 0, ',', '.') ?></td>
							   <td><?php echo $payment->status ?></td>
							   <td><?php echo $payment->status ?></td>
							 </tr>
							 <?php
							}}else{
							echo "<tr><td class='text-center' colspan='7'>Data tidak ada</td></tr>";
							}
							 ?>
							</tbody>
						  </table>
						  <br>
						<div id="pagination">
						 <nav aria-label="Page navigation example">
						  <ul class="pagination justify-content-center">
							 <?php
							echo $this->pagination->create_links();
							?>
						  </ul>
						</nav>
						</div>
						</div>
					  </div>
					</div>
					<!-- /.col-->
				  </div>
                </ul>
            </main>
        </div>
    </div>
</main>