  <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
		<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="email-app mb-4">
              <nav>
				<ul class="nav">
				<a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fa fa-inbox nav-dropdown-toggle"></i> New Inbox</a>
                <div class="row bd-example2">
                  <div class="col-13">
                    <div id="spy-example2" data-spy="scroll" data-target="#list-example" data-offset="0" style="height: 500px; overflow: auto">
					 <li class="nav-item">
					  <?php foreach ($teman as $item) { ?>
						<a class="nav-link" href="javascript:;" data-friend="<?= $item->user_id ?>">
						<div class="avatar">
						<img class="img-avatar" src="<?= base_url('assets/icon/avatar.png') ?>">
						<span class="avatar-status badge-info"></span>
					    </div>
						<?php echo $item->username ?>
						  <span class="badge badge-info"><?= $item->jumlah ?></span>
						</a>
						<?php
							}
						?>
					  </li>
                    </div>
                  </div>
                </div>
                </ul>
              </nav>
			   <main class="message">
                <div class="details">
              	<div data-spy="scroll" data-offset="0" style="height: 300px; overflow: auto">
				<?php foreach ($pesan as $pesan) { ?>
				<a class="dropdown-item" href="javascript:;" data-friend="<?= $pesan->user_id ?>">
				  <div class="message">
					<div class="py-1 mr-1 float-left">
					  <div class="avatar">
						<img class="img-avatar" src="<?= base_url('assets/icon/avatar.png') ?>">
						<span class="avatar-status badge-success"></span>
					  </div>
					</div>
					<div>
					  <small class="text-muted float-right mt-1"><?php echo $pesan->time ?></small>
					</div>
					<div class="text-truncate font-weight-bold"><?php echo $pesan->username ?></div>
					<div class="small text-muted text-truncate"><?php echo $pesan->message ?></div>
				  </div>
				</a>
				<?php
				}
				?>
				</div>
				</div>
                </div>
              </main>
            </div>
          </div>
        </div>
	</main>