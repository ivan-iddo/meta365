 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-mobile"></i> Pulsa
            </div>
            <?php echo form_open('pulsa/insert') ?>
            <div class="card-body">
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
                <fieldset class="form-group">
                  <label>Denominasi</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-tag"></i>
                      </span>
                    </span>
                   <select class="form-control select2-single" name="product_id" id="product_id" required>
				   <option value=''>-PILIH-</option>
                    </select>
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
			<script type="text/javascript">
			  $('#phone').keypress(function() {
				var phone = this.value;
				var telkomsel=["0812","0813","0821","0822","0852","0853","0823","0851"];
				var indosat=["0814","0815","0816","0855","0856","0857","0858"];
				var three=["0895","0896","0897","0898","0899"];
				var smartfren=["0881","0882","0883","0884","0885","0886","0887","0888","0889"];
				var xl=["0817","0818","0819","0859","0877","0878"];
				var axis=["0838","0831","0832","0833"];
				var t;
				t=phone.substring(0,4);
				var a= telkomsel.length;
				var b=0;
				while(b<a){
					if(telkomsel[b]==t){
						var product='AS';
						 $('[name="product"]').val(product);
						}++b;
				}
				var a= indosat.length;
				var b=0;
				while(b<a){
					if(indosat[b]==t){
						var product='Indosat';
						$('[name="product"]').val(product);
						}++b;
				}
				var a= three.length;
				var b=0;
				while(b<a){
					if(three[b]==t){
						var product='Three';
						$('[name="product"]').val(product);
						}++b;
				}
				var a= smartfren.length;
				var b=0;
				while(b<a){
					if(smartfren[b]==t){
						var product='Smartfren';
						$('[name="product"]').val(product);
						}++b;
				}
				var a= xl.length;
				var b=0;
				while(b<a){
					if(xl[b]==t){
						var product='XL';
						$('[name="product"]').val(product);
						}++b;
				}
				var a= axis.length;
				var b=0;
				while(b<a){
					if(axis[b]==t){
						var product='Axis';
						$('[name="product"]').val(product);
						}++b;
				}
			  });
			</script>
	<script type="text/javascript">
		$(document).ready(function(){
			 $('#phone').on('input',function(){
                var product=$("#product").val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('pulsa/get')?>",
                    dataType : "JSON",
                    data : {product: product},
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
                return false;
           });

		});
	</script>