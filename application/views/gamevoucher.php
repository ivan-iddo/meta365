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
            <?php echo form_open('Gamevoucher/insert') ?>
            <div class="card-body">
                <fieldset class="form-group">
                  <label>Voucher Type</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-id-card"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" name="product_name" id="product_name" onchange="name(this.value)" required>
                      <option>--Pilih--</option>
					  <?php 
						foreach($product as $row):
						?>
						<option value="<?php echo $row->product_name;?>"><?php echo $row->product_name;?></option>
						<?php
						endforeach;
					 ?>
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
                    <select class="form-control select2-single" name="product_id" id="product_id" required>
                      <option>--Pilih--</option>
                    </select>
                  </div>
                </fieldset>
				 <fieldset class="form-group">
                  <label>No. HandPhone</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-phone"></i>
                      </span>
                    </span>
                    <input class="form-control" name="phone" id="phone" type="phone" placeholder="0812XXXXXXXXXXXX" maxlength="12" required>
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
		<script>
			function name(id)
			{
				if(id != null) {
                $.ajax({
                    type : "GET",
                    url  : "<?php echo base_url('gamevoucher/get')?>",
                    dataType : "JSON",
                    data : {id: id},
                    cache:false,
                    success: function(data){
                        $("#product_id").empty();
					         $(data).each(function()
							 {
							     var option = $('<option />');
							     option.attr('value', this.product_id).text(this.product_type);

							     $('#product_id').append(option);
							 });
                        
                    }
                });
			}
			}
		</script>