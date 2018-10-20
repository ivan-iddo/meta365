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
                        <i class="fa fa-map-marker"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" name="product_id" id="select2-1" required>
					<?php 
					$propinsi=null;
					foreach($product as $row){
					if($propinsi != $row->product_type){
						 if ($propinsi !== null) {
						echo '</optgroup>';
						}
						echo '<optgroup label="'.$row->product_type.'">';
						}
						echo '<option value="'.$row->product_id.'">'.$row->product_name.'</option>';
						$propinsi = $row->product_type;
					}
					if ($propinsi !== null) {
						echo '</optgroup>';
					}
					 ?>
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