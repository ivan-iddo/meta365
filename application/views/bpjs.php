 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-shield"></i>Asuransi BPJS
            </div>
            <div class="card-body">
			<?= form_open('bpjs/insert_bpjs');?>
				<fieldset class="form-group">
                  <label>Periode</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calculator"></i>
                      </span>
                    </span>
                    <input class="form-control" id="periode" name="periode" type="text" maxlength="12" placeholder="Periode >2 yaitu 12,1" required>
                  </div>
                </fieldset>
                <fieldset class="form-group">
                  <label>ID Pelanggan</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-id-card"></i>
                      </span>
                    </span>
                    <input class="form-control" id="pelanggan" name="pelanggan" type="text" maxlength="12" required>
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
                    <input class="form-control" id="phone" name="phone" type="text" maxlength="12" placeholder="081210090111" required>
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