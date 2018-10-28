 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-user"></i>Profile
            </div>
            <div class="card-body">
              <i class="fa fa-user-circle"></i><b> Username :  <?php echo $username ?></b>
              <br>@</i><b>  Email : <?php echo $email ?></b> 
              <br><i class="fa fa-calendar-check-o"></i><b> last login : <?php echo $last_login ?></b> 
            </div>
          </div>
        </div>
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>