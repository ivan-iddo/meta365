 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-bolt"></i>PLN
            </div>
            <div class="card-body">
			<?= form_open('ppob/insert_pln');?>
               <fieldset class="form-group">
                  <label>Product</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-bolt"></i>
                      </span>
                    </span>
                    <select class="form-control select2-single" name="product_id" id="product_id" required>
					  <?php 
						foreach($product as $row):
						?>
						<option value="<?php echo $row->product_id;?>"><?php echo $row->product_name;?></option>
						<?php
						endforeach;
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
				<fieldset class="form-group">
                  <label>Denominasi</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                         <i class="fa fa-money"></i>
                      </span>
                    </span>
                    <select class="nominal form-control select2-single" id="nominal" name="nominal">
                    </select>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#product_id').change(function(){
			var id=$(this).val();
			$.ajax({
				url : "<?php echo base_url();?>ppob/get",
				method : "POST",
				data : {id: id},
				async : false,
		        dataType : 'json',
				success: function(data){
					var html = '';
		            var i;
		            for(i=0; i<data.length; i++){
		                html += '<option value='+data[i].nominal+'>'+data[i].products_type+'</option>';
		            }
		            $('.nominal').html(html);
					
				}
			});
		});
	});
</script>