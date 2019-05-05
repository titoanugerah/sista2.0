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
          <button type="submit" name="deleteAccount" value="deleteAccount" class="btn btn-danger">Hapus Akun</button>
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

</div>
