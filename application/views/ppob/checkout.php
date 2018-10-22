<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">Invoice
        <strong>#<?php echo $transaction_id; ?></strong>
        <a class="btn btn-sm btn-info float-right" href="#" onclick="javascript:window.print();">
          <i class="fa fa-print"></i> Print</a>
        <a class="btn btn-sm btn-info float-right" href="#">
          <i class="fa fa-save"></i> Save</a>
      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-4">
            <div>Invoice
              <strong>#<?php echo $transaction_id; ?></strong>
            </div>
            <div><?php echo $pelanggan; ?></div>
            <div><?php echo $date_transaction; ?></div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row-->
        <div class="table-responsive-sm">
          <table class="table table-striped">
            <thead>
              <tr>
                <th class="center">#</th>
                <th>Item</th>
                <th>Description</th>
                <th class="center">Quantity</th>
                <th class="right">Unit Cost</th>
                <th class="right">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="center">1</td>
                <td class="left"><?php echo $product['product']; ?></td>
                <td class="left"><?php echo $product['product_name']; ?></td>
                <td class="center">1</td>
                <td class="right">Rp. <?php echo number_format($nominal, 0, ',', '.')?></td>
				<?php $total=$pr*1?>
				<td class="right">Rp. <?php echo number_format($total, 0, ',', '.') ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-5">Note :</div>
          <div class="col-lg-4 col-sm-5 ml-auto">
            <table class="table table-clear">
              <tbody>
                <tr>
                  <td class="left">
                    <strong>Total</strong>
                  </td>
                  <td class="right">
                    <strong>Rp. <?php echo number_format($total, 0, ',', '.') ?></strong>
                  </td>
                </tr>
              </tbody>
            </table>
			<input type="hidden" name="id" id="id" value="<?php echo $transaction_id; ?>" /> 
            <a class="btn btn-success" href="<?php echo $action; ?>">Checkout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>