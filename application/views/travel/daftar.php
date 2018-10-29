 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-plane"></i> Biodata
            </div>
            <div class="card-body">
              <?= form_open('$action');?>
			   <fieldset class="form-group">
                  <label>Full name</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
					  <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" id="full_name" name="full_name" type="text" maxlength="60" required>
                  </div>
                </fieldset>
				<fieldset class="form-group">
                  <label>Gender</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                         <i class="fa fa-money"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" name="gender" id="gender" required>
                    <option value="L">L</option>
                    <option value="P">P</option>
					</select>
                  </div>
                </fieldset>
				<fieldset class="form-group">
                  <label>Phone</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
					  <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" id="phone" name="phone" type="text" maxlength="12" required>
                  </div>
                </fieldset>
            </div>
			<div class="card-footer">
              <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Checkout</button>
              <button class="btn btn-sm btn-danger" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>