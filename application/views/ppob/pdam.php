 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-tint"></i>PDAM
            </div>
            <div class="card-body">
			<?= form_open('ppob/insert_pdam');?>
				<fieldset class="form-group">
                  <label>Wilayah</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-arrow-down"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" name="product_id" id="select2-1" required>
					<?php 
					foreach($product as $row):
						?>
						<optgroup label="<?php echo $row->product_type;?>">
						<option value="<?php echo $row->product_id;?>"><?php echo $row->product_name;?></option>
						<?php
						endforeach;
					 ?>
					 </optgroup>
                    </select>
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