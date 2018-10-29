 <main class="main">
  <?php $this->load->view('include/breadcrumb');?>
    <div class="container-fluid">
            <div class="email-app mb-4">
              <main class="inbox">
                <ul class="messages">
				 <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th>KAI</th>
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
                        <span class="from">JAKK - Jakarta Kota to BD - Bandung Kota</span>
                        <span class="date">
                          <span class="fa fa-paper-clip"></span> 2012/01/01</span>
                      </div>
					  <table class="table table-responsive-sm">
                      <tbody>
                        <tr>
                          <td>Samppa Nori</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td>Member</td>
                          <td>
                            <button class="btn btn-sm btn-primary" type="submit">Pesan Kereta Api >></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
					</a>
                  </li>
                  <li class="message unread">
                    <a href="#">
                      <div class="header">
                        <span class="from">JAKK - Jakarta Kota to BD - Bandung Kota</span>
                        <span class="date">
                          <span class="fa fa-paper-clip"></span> 2012/01/01</span>
                      </div>
					  <table class="table table-responsive-sm">
                      <tbody>
                        <tr>
                          <td>Samppa Nori</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td>Member</td>
                          <td>
                            <a class="btn btn-success" href="daftar_kai/<?php echo $transaction_id ?>">Pesan Kereta Api >></a>
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