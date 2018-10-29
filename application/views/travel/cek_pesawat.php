 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
    <div class="container-fluid">
            <div class="email-app mb-4">
              <main class="inbox">
                <ul class="messages">
				 <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>Pesawat</th>
                          <th></th>
                          <th>From</th>
                          <th>To</th>
                          <th>Harga</th>
                          <th></th>
                        </tr>
                      </thead>
				 </table>
                  <li class="message unread">
                    <a href="#">
                      <div class="header">
                        <span class="from"><?php echo $from ?> To <?php echo $to ?></span>
                        <span class="date">
                          <span class="fa fa-paper-clip"></span> <?php echo $date_go ?> <?php echo $date_back ?></span>
                      </div>
					  <table class="table table-responsive-sm">
                      <tbody>
                        <tr>
                          <td>Garuda</td>
                          <td>G32</td>
                          <td><?php echo $from ?></td>
                          <td><?php echo $to ?></td>
                          <td>IDR 150.000</td>
                          <td>
                            <button class="btn btn-sm btn-primary" type="submit">Pesan Pesawat >></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
					</a>
                  </li>
                  <li class="message unread">
                    <a href="#">
                      <div class="header">
                        <span class="from">JAKK - Jakarta Kota To BD - Bandung Kota</span>
                        <span class="date">
                          <span class="fa fa-paper-clip"></span> 2012/01/01</span>
                      </div>
					  <table class="table table-responsive-sm">
                      <tbody>
                        <tr>
                          <td>Garuda</td>
                          <td>G121</td>
                          <td>JAKK - Jakarta Kota</td>
                          <td>BD - Bandung Kota</td>
                          <td>IDR 150.000</td>
                          <td>
                           <a class="btn btn-success" href="daftar_pesawat/<?php echo $transaction_id ?>">Pesan Pesawat >></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
					</a>
                  </li>
                </ul>
            </main>
        </div>
    </div>
</main>