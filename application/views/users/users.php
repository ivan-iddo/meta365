<main class="main">
  <?php $this->load->view('include/breadcrumb');?>
  <div class="container-fluid">
    <div class="animated fadeIn">  
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Users</div>
            <div class="card-body"> 
              <form action="<?php echo site_url('users');?>" method='post' class="col-md-5">
			   <div class="form-group">
                    <div class="controls">
                        <div class="input-group">
                           <input class="form-control"  name="pencarian"  id="pencarian" type="text" placeholder="Enter Search Username">
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
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action Status</th>
                    <th>Date Registered</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
				<?php
				if(!empty($users)){
				if($this->uri->segment(3)){
					$no = $this->uri->segment(3);
					}else{
					$no = 0;
					}
                 foreach ($users as $user){
                 ?>
                 <tr>
                   <td><?php echo ++$no ?>.</td>
                   <td><?php echo $user->username ?></td>
                   <td><?php echo $user->email ?></td>
                   <?php  
					  if($user->auth_level=="1"){
						$users="User";
					  }elseif($user->auth_level=="4"){
						$users="Business Partner";
					  }elseif($user->auth_level=="5"){
						$users="";
					  }elseif($user->auth_level=="6"){
						$users="Admin";
					  }elseif($user->auth_level=="8"){
						$users="Menager";
					  }
					?>
                   <td><?php echo $users ?></td>
                   <td>
				   <?php  
					  if($user->banned=="1"){
						echo "<a href='users/active/".$user->user_id."'>
						  <span class='badge badge-success' title='Click Untuk Active Akun'>Active</span>
                        </a>";
					  }else{
						echo "<a href='users/unactive/".$user->user_id."'>
                          <span class='badge badge-danger' title='Click Untuk Non Active Akun'>Unactive</span>
                        </a>";
					  }
					?>
					</td>
                   <td><?php echo $user->created_at ?></td>
				      <td>
                        <a class="btn btn-danger" title="Click Untuk Menghapus Akun" href="<?=base_url().'users/delete/'.$user->user_id;?>" onclick="return confirm('Apakah Anda yakin akan menghapus ? <?php echo $user->username;?>')">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </td>
                 </tr>
                 <?php
                 }}else{
					echo "<tr><td class='text-center' colspan='7'>Data tidak ada</td></tr>";
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