
<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-body">
          <div class="row">
          <div class="col-sm-6 col-lg-10">
            <h3>Products Detail</h3>
          </div>
          <div class="col-sm-6 col-lg-2">
            <a href="#" class="btn btn-danger">Delete</a>
            <a href="#" class="btn btn-primary">Save</a>
          </div>
        </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="form-group">
            <label for="company">Product Code</label>
            <input class="form-control" name="code" id="code" type="text" placeholder="Enter product code" value="<?=$product['code']?>">
          </div>
          <div class="form-group">
            <label for="vat">VAT</label>
            <input class="form-control" id="vat" type="text" placeholder="PL1234567890">
          </div>
          <div class="form-group">
            <label for="street">Street</label>
            <input class="form-control" id="street" type="text" placeholder="Enter street name">
          </div>
          <div class="row">
            <div class="form-group col-sm-8">
              <label for="city">City</label>
              <input class="form-control" id="city" type="text" placeholder="Enter your city">
            </div>
            <div class="form-group col-sm-4">
              <label for="postal-code">Postal Code</label>
              <input class="form-control" id="postal-code" type="text" placeholder="Postal Code">
            </div>
          </div>
          <!-- /.row-->
          <div class="form-group">
            <label for="country">Country</label>
            <input class="form-control" id="country" type="text" placeholder="Country name">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php $this->load->view('include/script');?>
<!-- Plugins and scripts required by this view-->
<script src="<?=base_url();?>assets/vendors/datatables.net/js/jquery.dataTables.js"></script>
<script src="<?=base_url();?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="<?=base_url();?>assets/js/datatables.js"></script>