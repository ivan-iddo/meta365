<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Product</div>
            <div class="card-body"> 
			<div class="input-group">
				<a class="btn btn-primary" type="submit" href="<?=base_url().'product/add'?>">
                  <i class="fa fa-dot-circle-o"></i> Tambah
                </a>
			 </div>
			 <br>
              <form action="<?php echo site_url('product');?>" method='post' class="col-md-5">
			   <div class="form-group">
                    <div class="controls">
                        <div class="input-group">
                           <input class="form-control"  name="pencarian"  id="pencarian" type="text" placeholder="Enter Search Product Name">
                            <span class="input-group-append">
                              <button class="btn btn-secondary" type="submit">Search</button>
                            </span>
                        </div>
                    </div>
				</div>
				</form>
			  <table class="table table-responsive-sm table-hover table-outline mb-0">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center">
                      No.
                    </th>
                    <th>Product</th>
                    <th>Product Name</th>
                    <th>Harga</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				if(!empty($product)){
				if($this->uri->segment(3)){
					$no = $this->uri->segment(3);
					}else{
					$no = 0;
					}
                 foreach ($product as $product){
                 ?>
                 <tr>
                   <td><?php echo ++$no ?>.</td>
                   <td><?php echo $product->product ?></td>
                   <td><?php echo $product->product_name ?></td>
                   <td>Rp. <?php echo number_format($product->price_sell , 0, ',', '.')?></td>
				   <td>
                     <a class="btn btn-danger" title="Click Untuk Menghapus Akun" href="<?=base_url().'product/delete/'.$product->product_id;?>" onclick="return confirm('Apakah Anda yakin akan menghapus ? <?php echo $product->product_name;?>')">
                       <i class="fa fa-trash-o"></i>
                     </a>
					 <a class="btn btn-success" title="Click Untuk Edit Akun" href="<?=base_url().'product/edit/'.$product->product_id;?>">
                       <i class="fa fa-pencil-square-o"></i>
                     </a>
					 <a class="btn btn-info" title="Click Untuk Edit Harga" href="<?=base_url().'product/harga/'.$product->product_id;?>">
                       <i class="fa fa-pencil"></i>
                     </a>
                   </td>
                 </tr>
                 <?php
                 }}else{
					echo "<tr><td class='text-center' colspan='4'>Data tidak ada</td></tr>";
					}
                 ?>
                </tbody>
              </table>
			  <br>
			     <div class="row">
					<div class="col">
						<!--Tampilkan pagination-->
						<?php echo $this->pagination->create_links(); ?>
					</div>
				</div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- /.row-->
    </div>
  </div>
</main>