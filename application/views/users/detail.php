
<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <form action="<?=base_url().'users/update/'.$user['user_id'];?>" method="POST">
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="col-sm-6 col-lg-10">
              <h3>User Detail</h3>
            </div>
            <!--<div class="col-sm-6 col-lg-2">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>-->
          </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <div class="form-group">
              <label for="company">User ID</label>
              <input class="form-control" name="user_id" id="user_id" type="text" placeholder="Enter user name" value="<?=$user['user_id'];?>" disabled>
            </div>
            <div class="form-group">
              <label for="company">Name</label>
              <input class="form-control" name="name" id="name" type="text" placeholder="Enter user name" value="<?=$user['username'];?>">
            </div>
            <div class="form-group">
              <label for="company">Email</label>
              <input class="form-control" name="email" id="email" type="text" placeholder="Enter user email" value="<?=$user['email'];?>" disabled>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <div class="form-group">
              <label for="company">Password</label>
              <input class="form-control" name="password" id="password" type="password" placeholder="Enter password">
            </div>
            <div class="form-group">
              <label for="company">Confirmation</label>
              <input class="form-control" name="con_password" id="con_password" type="password" placeholder="Enter password again">
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>
<?php $this->load->view('include/script');?>

<script fee="text/javascript">
  $('#code').keypress(function(e){
    if (e.keyCode == 13) {
      console.log("cari yukk!");
    }
  });
</script>