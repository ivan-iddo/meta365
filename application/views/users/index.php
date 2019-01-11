<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card">
        <div class="card-body">
          <div class="row">
          <div class="col-sm-6 col-lg-10">
            <h3>User List</h3>
          </div>
          <div class="col-sm-6 col-lg-2">
            <a href="<?=base_url().'products/add';?>" class="btn btn-primary">Add User</a>
          </div>
        </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <table class="table table-striped table-bordered datatable">
            <thead>
              <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Last Login</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $key => $value):?>
                  <tr>
                    <td><a href="<?=base_url().'users/detail/'.$value['user_id'];?>"><?=$value['user_id'];?></a></td>
                    <td><a href="<?=base_url().'users/detail/'.$value['user_id'];?>"><?=$value['username'];?></a></td>
                    <td><?=$value['email'];?></td>
                    <td><?=$value['last_login'];?></td>
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