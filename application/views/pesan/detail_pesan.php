 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
   <div class="container-fluid">
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
					 <?php
					 }}else{
						echo "<div class='text-center'>Data tidak ada</div>";
						}
					 ?>
                </div>
              </main>
            </div>
    </div>
</main>