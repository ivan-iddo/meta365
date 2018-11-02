 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
   <div class="container-fluid">
            <div class="email-app">
              <main class="message">
                <div class="details">
				<?php
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
    </div>
</main>