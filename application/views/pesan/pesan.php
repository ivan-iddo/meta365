 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
    <div class="container-fluid">
            <div class="email-app mb-4">
              <main class="inbox">
                <ul class="messages">
				 <?php if($auth_role=='admin'):
				?>
				  <div class="email-app">
				  <main class="message">
					<div class="details">
					<?php
					if(!empty($pesan)){
						 foreach ($pesan as $pesan) {
						 ?>
						<div class="header">
							<span class="fa fa-user-circle"> <?php echo $pesan->username ?></span>
							<span class="date">
							 <span class="fa fa-paper-clip"></span> <?php echo $pesan->date ?></span>
						</div>
						<div class="description"><?php echo $pesan->isi ?></div>
						 <?php $id=$pesan->uid_pengirim ?>
						 <?php
					}}else{
						echo "<div class='text-center'>Data tidak ada</div>";
					}
						 ?>
					</div>
					<form method="post" action="<?=base_url().'pesan/insert_admin';?>">
						<div class="form-group">
						 <textarea class="form-control" id="isi" name="isi" name="body" rows="3" placeholder="Click here to reply"></textarea>
						</div>
						<input name="uid_pengirim" id="uid_pengirim" value="<?php echo $id; ?>" class="form-control" type="hidden">
						<div class="form-group text-right">
						   <button class="btn btn-success" type="submit">Send</button>
						</div>
					</form>
				  </main>
				</div>
				   <?php
				  endif;?>
				   <?php if($auth_role=='user'|$auth_role=='businesspartner'|$auth_role=='menager'):
					?>
						<div class="card-header">
							Pesan
						</div>
						<div class="card-body">
						<div class="row bd-example2">
						  <div class="col-12">
							<div id="spy-example2" data-spy="scroll" data-target="#list-example" data-offset="0" style="height: 500px; overflow: auto">
							<div class="list-group">
							<?php
							if(!empty($get_by_pesan)){
							foreach ($get_by_pesan as $pesan) {
							if ($pesan->status=="sudah"){
							?>
							<a class="list-group-item list-group-item-action flex-column align-items-start" href="#">
								<div class="d-flex w-100 justify-content-between">
								  <h5 class="mb-1"><?php echo $pesan->username ?></h5>
								  <small><?php echo $pesan->date ?></small>
								</div>
								<p class="mb-1"><?php echo $pesan->isi ?></p>
							  </a>
							<?php }elseif($pesan->status=="belum"){?>
							 <a class="list-group-item list-group-item-action flex-column align-items-start active" href="#">
								<div class="d-flex w-100 justify-content-between">
								  <h5 class="mb-1"><?php echo $pesan->username ?></h5>
								  <small><?php echo $pesan->date ?></small>
								</div>
								<p class="mb-1"><?php echo $pesan->isi ?></p>
							  </a>
							<?php
							 }}}else{
								echo "<div class='text-center'>Data tidak ada</div>";
								}
							?>
							</div>
							</div>
						 </div>
						</div>
						</div>
				 <?php
				  endif;?>
                </ul>
            </main>
        </div>
    </div>
</main>