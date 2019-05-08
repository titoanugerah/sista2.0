<img src="<?php echo base_url('./assets/upload/kp2.jpg'); ?>"  style="width: auto !important;height: auto !important;max-width: 100%;" alt="">
<br><br >
<div class="alert alert-warning">
  <button type="button" aria-hidden="true" class="close">
    <i class="now-ui-icons ui-1_simple-remove"></i>
  </button>
  <span>Okey sekarang mulai cari perusahaan buat magang yaa, kalo udah kamu bisa isi form dibawah ini</span>
</div>
<div class="card">
  <div class="card-body">
    <form method="post">
      <h3>Form KP</h3>
      <div class="row">
        <div class="col-md-5 pr-1">
          <div class="form-group">
            <label>Nama Mahasiswa</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata['fullname']; ?>" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>NIM</label>
            <input type="text" class="form-control" value="<?php echo $this->session->userdata['nim']; ?>" disabled>
          </div>
        </div>
        <div class="col-md-3 pl-1">
          <div class="form-group">
            <label>Angkatan</label>
            <input type="text" class="form-control" value="<?php echo '20'.substr($this->session->userdata['nim'],6,2); ?>" disabled>
          </div>
        </div>
      </div>
      <div class="row">

      </div>
      <div class="row">
        <div class="col-md-3 pr-1">
          <div class="form-group">
            <label>Nama Perusahaan</label>
            <input type="text" name="instansi" class="form-control" placeholder="Awas aja kalo PT. Cinta Sejatie" value="" required>
          </div>
        </div>
        <div class="col-md-9 pl-1">
          <div class="form-group">
            <label>Judul Usulan KP</label>
            <input type="text"  class="form-control" name="judul" placeholder="Masukan Judul KP" value="" required>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Tema 1</label>
              <select  class="form-control js-example-1" name="id_tema_1">
                <?php foreach ($content['theme'] as $item): ?>
                  <option value="<?php echo $item->id; ?>"><?php echo $item->nama_tema; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Tema 2</label>
              <select  class="form-control js-example-1" name="id_tema_2">
                <?php foreach ($content['theme'] as $item): ?>
                  <option value="<?php echo $item->id; ?>"><?php echo $item->nama_tema; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>


        </div>
      </div>

      <div class="button-container">
        <button type="submit" name="updateAccount" value="updateAccount" class="btn btn-primary">Simpan Data</button>
      </div>
    </form>
  </div>
</div>
