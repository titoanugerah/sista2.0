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
                          <input type="email" name="username" class="form-control" placeholder="Masukan email admin" value="<?php echo $config->username; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Masukan password baru" value="<?php echo $config->password?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                          <label>Host</label>
                          <input type="text" name="host" class="form-control" placeholder="Masukan host smtp sesuai dengan masing masing vendor" value="<?php echo $config->host; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Port</label>
                          <input type="text" name="port" class="form-control" placeholder="Masukan port smtp" value="<?php echo $config->port; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Crypto</label>
                          <input type="text" name="crypto" class="form-control" placeholder="Masukan crypto anda" value="<?php echo $config->crypto; ?>" required>
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
                <p> sedang dalam tahap development </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
