
<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <form action="<?=base_url().'products/update/'.$product['code'];?>" method="POST">
    <div class="container-fluid">
      <div class="animated fadeIn">
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="col-sm-6 col-lg-10">
              <h3>Product Detail</h3>
            </div>
            <div class="col-sm-6 col-lg-2">
              <button class="btn btn-primary" type="submit">Update</button>
            </div>
          </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
            <div class="form-group">
              <label for="company">Product Code</label>
              <input class="form-control" name="code" id="code" type="text" placeholder="Enter product code" value="<?=$product['code'];?>" disabled>
            </div>
            <div class="form-group">
              <label for="company">Type</label>
              <input class="form-control" name="type" id="type" type="text" placeholder="Enter product type" value="<?=$product['type'];?>">
            </div>
            <div class="form-group">
              <label for="company">Name</label>
              <input class="form-control" name="name" id="name" type="text" placeholder="Enter product name" value="<?=$product['name'];?>">
            </div>
            <div class="form-group">
              <label for="company">Hpp</label>
              <input class="form-control" name="hpp" id="hpp" type="text" placeholder="Enter product hpp" value="<?=$product['hpp'];?>" disabled>
            </div>
            <div class="form-group">
              <label for="company">Admin</label>
              <input class="form-control" name="admin" id="admin" type="text" placeholder="Enter product admin" value="<?=$product['admin'];?>">
            </div>
            <div class="form-group">
              <label for="company">Fee</label>
              <input class="form-control" name="fee" id="fee" type="text" placeholder="Enter product fee" value="<?=$product['fee'];?>">
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