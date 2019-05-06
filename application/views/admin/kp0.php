<div class="alert alert-warning alert-with-icon" data-notify="container">
  Pada Tab ini anda dapat membuat surat kelayakan kerja praktik dari mahasiswa terkait, silahkan isi sks dan dosen wali dari mahasiswa yang bersangkutan
</div>
<div class="card-body">
  <form method="post">
    <div class="row">
      <div class="col-md-6 pr-1">
        <div class="form-group">
          <label>SKS</label>
          <input type="text" name="username" class="form-control" placeholder="Masukan email admin" value="<?php echo $content['config']->username; ?>" required>
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
