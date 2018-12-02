 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-mobile"></i> Product
            </div>
            <div class="card-body">
			<?php
				if(!empty($product)){
                foreach ($product as $product){
              ?>
              <?= form_open('product/update/'.$product->product_id);?>
                <fieldset class="form-group">
                  <label>Product ID</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="product_id" id="product_id" type="text" value="<?php echo $product->product_id ?>" maxlength="12" disabled>
                  </div>
                </fieldset> 
				<fieldset class="form-group">
                  <label>Product</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="product_" id="product_" type="text" value="<?php echo $product->product ?>" maxlength="12" required>
                  </div>
                </fieldset>
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
                  <label>Product Type</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="product_type" id="product_type" type="text" value="<?php echo $product->product_type ?>" maxlength="12" required>
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