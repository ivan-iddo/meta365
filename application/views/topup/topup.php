 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-mobile"></i> Topup
            </div>
            <div class="card-body">
              <?= form_open('pulsa/insert');?>
                <fieldset class="form-group">
                  <label>Rekening Tujuan</label>
                  <div class="input-group">
                   <select class="form-control select2-single" name="product_id" id="product_id" required>
				   <option value=''>-Pilih Rekening Tujuan-</option>
				   <option value=''>Rekening Bank A</option>
				   <option value=''>Rekening Bank B</option>
				   <option value=''>Rekening Bank c</option>
                    </select>
                  </div>
                </fieldset>
                <fieldset class="form-group">
                  <label>Nominal Topup</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        Rp.
                      </span>
                    </span>
                    <input class="form-control" name="nominal" id="nominal" type="phone" placeholder="500.000" required>
                  </div>
                </fieldset>
            </div>
			<input name="product" id="product" class="form-control" type="hidden">
            <div class="card-footer">
              <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
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