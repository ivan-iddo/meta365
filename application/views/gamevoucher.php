 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-gamepad"></i>Game Voucher
            </div>
            <div class="card-body">
              <form>
                <fieldset class="form-group">
                  <label>Voucher Type</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-id-card"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" id="select2-1">
                      <option>Google Play</option>
                      <option>Garena</option>
                      <option>Steam</option>
                    </select>
                  </div>
                </fieldset>
                <fieldset class="form-group">
                  <label>Denominasi</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-tag"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" id="select2-1">
                      <option>25 K</option>
                      <option>50 K</option>
                      <option>100 K</option>
                    </select>
                  </div>
                </fieldset>
              </form>
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