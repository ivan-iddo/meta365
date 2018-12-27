
<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-body">
          <div class="row">
          <div class="col-sm-6 col-lg-10">
            <h3>Products List</h3>
          </div>
          <div class="col-sm-6 col-lg-2">
            <a href="#" class="btn btn-primary">Add Product</a>
          </div>
        </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-striped table-bordered datatable">
            <thead>
              <tr>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Type</th>
                <th>HPP</th>
                <th>Admin</th>
                <th>Fee</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $key => $value):?>
                <tr>
                  <td><?=$value['code'];?></td>
                  <td><?=$value['name'];?></td>
                  <td><?=$value['type'];?></td>
                  <td><?=$value['hpp'];?></td>
                  <td><?=$value['admin'];?></td>
                  <td><?=$value['fee'];?></td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
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