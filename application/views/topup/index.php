 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <form action="<?=base_url().'topup/add';?>" method="POST" class="needs-validation" novalidate>
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-money"></i> Topup
              </div>
              <div class="card-body">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <fieldset class="form-group">
                  <label>Rekening Tujuan</label>
                  <div class="input-group">
                   <select class="form-control select2-single" name="account" id="account" required>
            			   <option disabled selected>-Pilih Rekening Tujuan-</option>
                     <?php foreach ($points as $key => $value):?>
            			     <option value="<?=$value['id'];?>"><?=$value['name'].' - '.$value['account'];?></option>
                     <?php endforeach;?>
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
                    <input class="form-control" name="amount" id="amount" type="text" placeholder="Enter topup amount" required>
                  </div>
                </fieldset>
              </div>
              <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-dot-circle-o"></i> Submit</button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row-->
      </div>
    </div>
  </form>
</main>
<?php $this->load->view('include/script');?>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>