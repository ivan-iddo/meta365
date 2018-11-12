 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
    <div class="container-fluid">
            <div class="email-app mb-4">
              <main class="inbox">
                <ul class="messages">
				 <?php if($auth_role=='admin'):
				?>
				  <div class="row">
					<div class="col-md-12">
					  <div class="card">
						<div class="card-header">Konfirmasi Topup</div>
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
								<th>Kredit Verifikasi</th>
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
							   <?php $verifikasi=$payment->kredit+$payment->kode ?>
							   <td>Rp. <?php echo number_format($verifikasi , 0, ',', '.') ?></td>
								  <td>
									<a class="btn btn-info" title="Process Verifikasi Topup" href="<?=base_url().'payment/process/'.$payment->transaction_id;?>/<?php echo $payment->uid;?>" onclick="return confirm('Apakah Anda yakin telah menerima kiriman dari user ? <?php echo $payment->username;?> dengan nominal Rp. <?php echo number_format($verifikasi , 0, ',', '.');?> ke Rek <?php echo $payment->no_rek ?>')">
									  Process
									</a>
								  </td>
							 </tr>
							 <?php
							}}else{
							echo "<tr><td class='text-center' colspan='5'>Data tidak ada</td></tr>";
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
				   <?php
				  endif;?>
                </ul>
            </main>
        </div>
    </div>
</main>