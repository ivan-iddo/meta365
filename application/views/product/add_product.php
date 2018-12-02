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
              <?= form_open('product/insert');?>
                <fieldset class="form-group">
                  <label>Product ID</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="product_id" id="product_id" type="text" maxlength="12" required>
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
                    <input class="form-control" name="product_" id="product_" type="text" maxlength="12" required>
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
                    <input class="form-control" name="product_name" id="product_name" type="text" maxlength="12" required>
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
                    <input class="form-control" name="product_type" id="product_type" type="text" maxlength="12" required>
                  </div>
                </fieldset>
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