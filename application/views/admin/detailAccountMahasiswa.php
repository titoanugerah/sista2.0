<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <form method="post">

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="<?php echo "@".$content['account']->username; ?>" disabled>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" value="<?php echo $content['account']->email; ?>" disabled>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" value="<?php echo ucwords($content['account']->fullname); ?>" disabled>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>NIM</label>
              <input type="text" class="form-control"  value=" <?php echo $content['account']->nim; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Dosen Wali</label>
              <input type="text" class="form-control" value="<?php echo ucwords($content['account']->dosen_wali); ?>" disabled>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Nomor HP</label>
              <input type="text" class="form-control"  value=" <?php echo $content['account']->no_hp; ?>" disabled>
            </div>
          </div>
        </div>
        <div class="button-container">
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Hapus Akun</button>
          <a href="<?php echo base_url('account'); ?>"><button type="button" class="btn btn-warning">Kembali</button></a>
        </div>
      </form>
    </div>
  </div>

  </div>
  <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="<?php echo base_url('./assets/upload/'.$content['account']->display_picture); ?>"  style="width: auto !important;height: auto !important;max-width: 100%;">
        </div>
        <div class="card-body">
          <center>
          <h5 ><?php echo $content['account']->fullname; ?></h5>
          <h6><?php echo "@".$content['account']->username ?></h6>
        </center>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card card-nav-tabs card-plain">
          <div class="card-header card-header-success">
            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
            <div class="nav-tabs-navigation">
              <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                  <li class="nav-item">
                    <a class="nav-link active" href="#kp" data-toggle="tab">
                      <i class="material-icons">local_library</i>
                      Kerja Praktik
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#ta" data-toggle="tab">
                      <i class="material-icons">school</i>
                      Tugas Akhir
                    </a>
                  </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="tab-content text-justify">
                <div class="tab-pane active" id="kp">
                  <?php $this->load->view('admin/kp'.$content['account']->skp); ?>


                </div>
                <div class="tab-pane" id="wallpaper">
                  <div class="alert alert-warning alert-with-icon" data-notify="container">
                    Pada tab ini, digunakan untuk mengubah wallpaper login SISTA
                  </div>
                  <div class="card-body">
                    <img src="<?php echo base_url('assets/upload/'.$content['config']->login_image); ?>" style="width: auto !important;height: auto !important;max-width: 100%;">
                  </div>
                  <form class=""  method="post">
                    <button type="submit" name="resetWallpaper" value="resetWallpaper" class="btn btn-warning">Pasang Foto Default</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Foto</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Akun ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apabila anda sudah yakin menghapus akun ini? silahkan lanjutkan dengan memasukan password akun anda</p>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-danger" name="deleteAccount" value="deleteAccount">Hapus Akun</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>
