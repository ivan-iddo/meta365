<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">History Topup</div>
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
				if(!empty($topup)){
                 if($this->uri->segment(3)){
					$no = $this->uri->segment(3);
					}else{
					$no = 0;
					}
                 foreach ($topup as $topup) {
                 ?>
                 <tr>
                   <td><?php echo ++$no ?></td>
                   <td><?php echo $topup->transaction_id ?></td>
                   <td><?php echo $topup->product_id ?> Saldo IDR Rp. <?php echo number_format($topup->kredit, 0, ',', '.')?></td>
                   <td><?php echo $topup->date_transaction ?></td>
                   <td><?php echo $topup->status ?></td>
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
      <!-- /.row-->
    </div>
  </div>
</main>