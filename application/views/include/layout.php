<!DOCTYPE html>
<html lang="en">  
  <?php $this->load->view('include/header');?>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php $this->load->view('include/navbar');?>
    <div class="app-body">
      <?php $this->load->view('include/sidebar');?>
      <?php (is_file(APPPATH.'views/' . $module .'.php') ? $this->load->view($module): null);?>
    </div>
    <?php $this->load->view('include/footer');?>
  </body>
</html>