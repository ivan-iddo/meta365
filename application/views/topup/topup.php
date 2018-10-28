 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-money"></i> Topup
            </div>
            <div class="card-body">
              <?= form_open('topup/insert');?>
                <fieldset class="form-group">
                  <label>Rekening Tujuan</label>
                  <div class="input-group">
                   <select class="form-control select2-single" name="no_rek" id="no_rek" required>
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
                    <input class="form-control" name="nominal" id="nominal" type="text" placeholder="500000" required>
                  </div>
                </fieldset>
            </div>
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