<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <form method="post">

          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan username" value="<?php echo $content['account']->username; ?>" required>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan email pengguna" value="<?php echo $content['account']->email; ?>" required>
              </div>
            </div>
          </div>          
        <div class="row">
          <div class="col-md-6 pr-1">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" name="fullname" class="form-control" placeholder="Masukan nama lengkap pengguna" value="<?php echo ucwords($content['account']->fullname); ?>" required>
            </div>
          </div>
          <div class="col-md-6 pl-1">
            <div class="form-group">
              <label>Nomor Telepon</label>
              <input type="text" name="phone" class="form-control" placeholder="Masukan nomor telepon pengguna" value=" <?php echo $content['account']->phone; ?>" required>
            </div>
          </div>
        </div>
        <div class="button-container">
          <button type="submit" name="updateAccount" value="updateAccount" class="btn btn-primary">Simpan Data</button>
          <button type="submit" name="back" value="back" class="btn btn-warning">Kembali</button>
        </div>
      </form>
    </div>
  </div>

  </div>
  <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="<?php echo base_url('./assets/upload/'.$content['account']->display_picture); ?>" alt="..." style="width:330px">
        </div>
        <div class="card-body">

        </div>
      </div>
    </div>
  </div>

</div>
