
<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-body">
          <div class="row">
          <div class="col-sm-6 col-lg-10">
            <h3>Topup History</h3>
          </div>
        </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-striped table-bordered datatable">
            <thead>
              <tr>
                <th>Trx ID</th>
                <th>Info</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Code</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transactions as $key => $value):?>
                  <tr>
                    <td><a href="<?=base_url().'transactions/detail/'.$value['trx_id'];?>"><?=$value['trx_id'];?></a></td>
                    <td><?=$value['info'];?></td>
                    <td><?=$value['created_at'];?></td>
                    <td style="text-align:right;"><?=number_format($value['amount'], 2, ',', '.');?></td>
                    <td style="text-align:right;"><?=number_format($value['code'], 2, ',', '.');?></td>
                    <td style="text-align:right;"><?=number_format($value['total'], 2, ',', '.');?></td>
                    <td><?=$value['status'];?></td>
                  </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('include/script');?>
<!-- Plugins and scripts required by this view-->
<script src="<?=base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url();?>assets/js/datatables.js"></script>