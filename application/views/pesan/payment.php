 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
    <div class="container-fluid">
            <div class="email-app mb-4">
              <main class="inbox">
                <ul class="messages">
				<?php
					 foreach ($payment as $payment) {
					 ?>
                  <li class="message unread">
                    <a href="">
                      <div class="header">
                        <span class="from"><?php echo $payment->username ?></span>
                        <span class="date">
                          <span class="fa fa-paper-clip"></span> <?php echo $payment->date ?></span>
                      </div>
                      <div class="description"><?php echo $payment->isi ?></div>
                    </a>
                  </li>
				   <?php
					 }
					 ?>
                </ul>
            </main>
        </div>
    </div>
</main>