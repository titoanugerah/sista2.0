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
                  <a class="nav-link active" href="#email" data-toggle="tab">
                    <i class="material-icons">email</i>
                    Email Resmi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#wallpaper" data-toggle="tab">
                    <i class="material-icons">image</i>
                    Wallpaper Halaman Utama
                  </a>
                </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="tab-content text-justify">
              <div class="tab-pane active" id="email">
                <div class="alert alert-warning alert-with-icon" data-notify="container">
                  Pada tab ini, digunakan untuk mengkonfigurasi akun email yang digunakan untuk mengirim email menggunakan protokol SMTP
                </div>

                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="username" class="form-control" placeholder="Masukan email admin" value="<?php echo $content['config']->username; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Masukan password baru" value="<?php echo $content['config']->password?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                          <label>Host</label>
                          <input type="text" name="host" class="form-control" placeholder="Masukan host smtp sesuai dengan masing masing vendor" value="<?php echo $content['config']->host; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Port</label>
                          <input type="text" name="port" class="form-control" placeholder="Masukan port smtp" value="<?php echo $content['config']->port; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Crypto</label>
                          <input type="text" name="crypto" class="form-control" placeholder="Masukan crypto anda" value="<?php echo $content['config']->crypto; ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="button-container">
                      <button type="submit" name="updateEmail" value="updateEmail" class="btn btn-primary">Simpan Data</button>
                      <button type="submit" name="testMail" value="testMail" class="btn btn-purple" onclick="demo.showNotification('top','center')">Test Email</button>
                    </div>
                  </form>
                </div>
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
      <form  method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Silahkan upload foto dengan format jpg</p>
          <div class="md-form">
            <div class="file-field">
              <div class="btn btn-primary btn-sm float-left">
                <span>Choose file</span>
                <input type="file" name="fileUpload">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-warning" name="updateWallpaper" value="updateWallpaper">Upload</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
