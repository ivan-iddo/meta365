<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">Invoice
        <strong>#<?=$trx_id;?></strong>
      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-4">
            <table>
              <tbody>
                <tr>
                  <td>Date</td>
                  <td>:</td>
                  <td><?=$date; ?></td>
                </tr>
                <tr>
                  <td>Transaction Code</td>
                  <td>:</td>
                  <td><strong>#<?=$trx_id;?></strong></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td>:</td>
                  <td><strong><?=$status;?></strong></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
        <div class="table-responsive-sm">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="center">#</th>
                <th>Description</th>
                <th>Qty</th>
                <th class="right">Unit Cost</th>
                <th class="right">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($transactions as $key => $value):?>
                <tr>
                  <td class="center"><?=$key+1;?></td>
                  <td class="left"><?=$value['info'];?></td>
                  <td class="left">1</td>
                  <td style="text-align:right;">Rp. <?=number_format($value['amount'], 2, ',', '.');?></td>
                  <td style="text-align:right;">Rp. <?=number_format($value['amount'], 2, ',', '.');?></td>
                </tr>
              <?php endforeach;?>
              <tr style="background: #fff;">
                <td colspan="3"></td>
                <td class="left">
                  <strong>Total</strong>
                </td>
                <td style="text-align:right;">
                  <strong>Rp. <?=number_format($total_transactions, 0, ',', '.') ?></strong>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <?php if($this->auth_role == 'admin' && $status != 'SUCCESS'):?>
          <div>
            <a href="<?=base_url().'topup/update/'.$transaction['trx_id'];?>" class="btn btn-primary">Confirm</a>
          </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('include/script');?>