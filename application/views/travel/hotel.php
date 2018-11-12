 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-hotel"></i> Travel & Ticketing - Pesawat
            </div>
            <div class="card-body">
              <?= form_open('travel/cek_hotel');?>
				 <fieldset class="form-group">
                  <label>From</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-arrow-up"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" id="select2-2" name="from" required>
					<?php 
					$propinsi=null;
					foreach($product as $row){
					if($propinsi != $row->product_type){
						 if ($propinsi !== null) {
						echo '</optgroup>';
						}
						echo '<optgroup label="'.$row->product_type.'">';
						}
						echo '<option value="'.$row->product_id.'">'.$row->product_id.' - '.$row->product_name.'</option>';
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
                  <label>Date Checkin Checkout</label>
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
                  <label>Pesan</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-user"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" id="pesan" name="pesan" required>
                      <option value='1'>1</option>
                      <option value='2'>2</option>
                      <option value='3'>3</option>
                    </select>
                  </div>
                </fieldset>
            </div>
            <div class="card-footer">
              <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Cari Hotel</button>
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