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
        <div class="col-md-7 pr-1">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="fullname" class="form-control" placeholder="Nama kamu aja ya, jangan nama mantan :)" value="<?php echo $this->session->userdata['fullname']; ?>" required>
          </div>
        </div>
        <div class="col-md-5 pl-1">
          <div class="form-group">
            <label>Nomor HP</label>
            <input type="text"  class="form-control" name="no_hp" placeholder="Masukan Nomor Whatsapp kamu" value="<?php echo $this->session->userdata['no_hp']; ?>" required>
          </div>
        </div>
        <div class="col-md-6 pr-1">
          <div class="form-group">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Tulis NIM kamu " value="<?php echo $this->session->userdata['nim']; ?>" required>
          </div>
        </div>
        <div class="col-md-6 pl-1">
          <div class="form-group">
            <label>NIP</label>
            <input type="text"  class="form-control" name="nip" placeholder="Ingat kamu bukan pegawai, ngapain diisi"  disabled>
          </div>
        </div>
      </div>
      <div class="col-md-12 pr-1">
        <div class="form-group">
          <div class="row">
            <?php $value = rand(0,2); ?>
          <div class="form-check form-check-radio">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" <?php if ($value == 0){echo 'checked';} ?>>
              Saya punya KTP
              <span class="circle">
                <span class="check"></span>
              </span>
            </label>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-check form-check-radio">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" <?php if ($value == 1){echo 'checked';} ?>>
              Saya <i>suscribe</i> Atta Halilintar
              <span class="circle">
                <span class="check"></span>
              </span>
            </label>
          </div>
          &nbsp;&nbsp;&nbsp;&nbsp;
          <div class="form-check form-check-radio">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" <?php if ($value == 2){echo 'checked';} ?>>
              Saya kmarin dateng orenji
              <span class="circle">
                <span class="check"></span>
              </span>
            </label>
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
