 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
		  <?php
		   if(!empty($product)){
           foreach ($product as $product){
           ?>
          <div class="card">
            <div class="card-header">
              <i class="fa fa-mobile"></i> Harga Product <?php echo $product->product ?> (<?php echo $product->product_id ?>)
            </div>
            <div class="card-body">
              <?= form_open('product/insert_harga/'.$product->product_id);?>
                <fieldset class="form-group">
                  <label>Product Name</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="product_name" id="product_name" type="text" value="<?php echo $product->product_name ?>" maxlength="12" required>
                  </div>
                </fieldset>
				<fieldset class="form-group">
                  <label>Prices Buy</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="price_buy" id="price_buy" type="text" maxlength="12" required>
                  </div>
                </fieldset>
				<fieldset class="form-group">
                  <label>Prices Sell</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="price_sell" id="price_sell" type="text" maxlength="12" required>
                  </div>
                </fieldset>
			<?php
				}}
               ?>
            </div>
			<input name="product" id="product" class="form-control" type="hidden">
            <div class="card-footer">
              <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>