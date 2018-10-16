 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-plane"></i> Travel & Ticketing - Pesawat
            </div>
            <div class="card-body">
              <form>
                <fieldset class="form-group">
                  <label>From</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-arrow-up"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" id="select2-1">
                      <option selected>BDG - Bandung</option>
                      <option>JKT - Jakarta</option>
                      <option>DPS - Denpasar</option>
                    </select>
                  </div>
                </fieldset>
                <fieldset class="form-group">
                  <label>To</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-arrow-down"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" id="select2-1">
                      <option>BDG - Bandung</option>
                      <option selected>JKT - Jakarta</option>
                      <option>DPS - Denpasar</option>
                    </select>
                  </div>
                </fieldset>
                <fieldset class="form-group">
                  <label>Date</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                    <input class="form-control" name="daterange" type="text">
                  </div>
                </fieldset>
                <fieldset class="form-group">
                  <label>Pulang Pergi</label>
                  <div class="input-group">
                    <label class="switch switch-label switch-pill switch-primary">
                      <input class="switch-input" type="checkbox" checked="">
                      <span class="switch-slider" data-checked="&#x2713" data-unchecked="&#x2715"></span>
                    </label>
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