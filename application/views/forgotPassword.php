<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('./assets/template/uikit'); ?>/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url('./assets/image/undip-original.png'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Wardah | Forgot Password</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url('./assets/template/uikit'); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url('./assets/template/uikit'); ?>/assets/css/now-ui-kit.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('./assets/template/uikit'); ?>/assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="dropdown button-dropdown">
        <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
          <span class="button-bar"></span>
          <span class="button-bar"></span>
          <span class="button-bar"></span>
        </a>
      </div>
      <div class="navbar-translate">
        <a class="navbar-brand" href="https://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Wardah" data-placement="bottom" target="_blank">Wardah</a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?php echo base_url('./assets/template/uikit/'); ?>assets/img/blurred-image-1.jpg">
        <ul class="navbar-nav">
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(<?php echo base_url('./assets/template/uikit'); ?>/assets/img/login.jpg)"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="post">
              <div class="card-header text-center">
                <div class="logo-container">
                  <img src="<?php echo base_url('./assets/logo/wardah.png'); ?>" alt="">
                </div>
              </div>
              <div class="card-body">
                <?php $this->load->view('notification/'.$notification);?>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" name="username" placeholder="Masukan username akun anda" required>
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons education_glasses"></i>
                    </span>
                  </div>
                  <input type="text" placeholder=" <?php echo $this->session->userdata['aCaptcha']." + ".$this->session->userdata['bCaptcha']; ?> " name="captcha" class="form-control" required>
                </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" name="resetPassword" value="resetPassword" class="btn btn-primary btn-round btn-lg btn-block">Reset Password</button>
                <div class="pull-right">
                  <h6><a href="<?php echo base_url('login'); ?>" class="link">Kembali Ke Login</a></h6>
                </div>

            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer">
      <div class="container">
        <div class="copyright" id="copyright">
          &copy;
            <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>,
          <a href="https://ft.undip.ac.id" target="_blank">Wardah</a>. dan
          <a target="_blank">Artwork</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--notification -->
  <script src="<?php echo base_url('./assets/template/ui')?>/assets/js/plugins/bootstrap-notify.js"></script>

  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('./assets/template/uikit/'); ?>assets/js/now-ui-kit.js?v=1.2.0" type="text/javascript"></script>
</body>

</html>
