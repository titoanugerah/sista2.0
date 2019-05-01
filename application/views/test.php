
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('./assets/template/material/');?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url('./assets/image/undip-original.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>PARAGON | <?php echo $title; ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url('./assets/template/material/');?>assets/css/material-dashboard.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Select2-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
</head>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <div class="logo">
        <a href="#" class="simple-text logo-normal">PARAGON</a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <?php $this->load->view($this->session->userdata['role'].'/menu'); ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <h2>&nbsp;<?php echo "Test Page"; ?></h2>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('profile'); ?>">
                  <i class="material-icons">person</i> <?php echo $this->session->userdata['fullname']; ?>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('logout'); ?>">
                  <i class="material-icons">meeting_room</i> Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="container-fluid">
          <ol class="breadcrumb" style="background:white;">
            <li class="breadcrumb-item">PARAGON</li>
            <li class="breadcrumb-item"><?php echo ucfirst($this->session->userdata['role']); ?></li>
            <li class="breadcrumb-item active">Test Page</li>
          </ol>

        </div>

        <div class="card">
          <br><br><br>
          <div class="form-group">
            <select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
    ...
  <option value="WY">Wyoming</option>
</select>
          </div>

          <br><br><br>
        </div>

      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>,
            PT. Paragon Technology and Innovation
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <!-- JQuery -->
  <script src="<?php echo base_url('./assets/template/material/');?>assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!-- DatePicker -->
  <script src="<?php echo base_url('./assets/template/uikit'); ?>/assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <!--select2-->
  <script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      width: '80%' // need to override the changed default
    });
  });
  </script>
  <!--  Notifications Plugin-->
  <script src="<?php  echo base_url('./assets/template/material'); ?>/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('./assets/template/material'); ?>/assets/demo/demo.js"></script>


</body>


</html>
