<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <form method="post">

          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata['username']; ?>" required>
              </div>
            </div>
            <div class="col-md-8 pl-1">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Silahkan isi email dengan contoh example@mail.com" name="email" value="<?php echo $this->session->userdata['email']; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 pr-1">
              <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control" name="password" value=""  placeholder="Diisi jika ingin mengganti password">
              </div>
            </div>
            <div class="col-md-7  pl-1">
              <div class="form-group">
                <label>Nomor HP</label>
                <input type="text" class="form-control" name="no_hp" placeholder="Pastikan nomor hp juga terhubung dengan nomor WhatsApp" value="<?php echo $this->session->userdata['no_hp']; ?>" required>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-md-8 pr-1">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" name="fullname" placeholder="Tuliskan nama anda lengkap dengan gelar" value="<?php echo ucwords($this->session->userdata['fullname']); ?>" required>
            </div>
          </div>
          <div class="col-md-4 pl-1">
            <div class="form-group">
              <label>NIP</label>
              <input type="text" class="form-control" name="nip"  placeholder="Tuliskan NIP tanpa spasi" value=" <?php echo $this->session->userdata['nip']; ?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Tema 1</label>
              <select  class="form-control" name="id_tema_1">
                <?php foreach ($content['theme'] as $item): ?>
                  <option value="<?php echo $item->id; ?>" <?php if($item->id==$this->session->userdata['id_tema_1']){echo 'selected';} ?> required><?php echo $item->nama_tema; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Tema 2</label>
              <select  class="form-control" name="id_tema_2">
                <?php foreach ($content['theme'] as $item): ?>
                  <option value="<?php echo $item->id; ?>" <?php if($item->id==$this->session->userdata['id_tema_2']){echo 'selected';} ?> required><?php echo $item->nama_tema; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-md-4 pr-1">
            <div class="form-group">
              <label>Status Koordinator</label>
              <select  class="form-control" name="superdosen" disabled>
                <option value="<?php echo $this->session->userdata['superdosen']; ?>" <?php echo 'selected'; ?>><?php  if($this->session->userdata['superdosen']==1){echo 'Aktif';}else{echo 'Tidak Aktif';} ?></option>
              </select>
            </div>
          </div>

        </div>
        <div class="button-container">
          <button type="submit" class="btn btn-info" name="updateAccount" value="updateAccount">Update Akun</button>
        </div>
      </form>
    </div>
  </div>

  </div>
  <div class="col-md-4">
      <div class="card card-user">
        <div class="image">
          <img src="<?php echo base_url('./assets/upload/'.$this->session->userdata['display_picture']); ?>"  style="width: auto !important;height: auto !important;max-width: 100%;">
        </div>
        <div class="card-body">
          <center>
            <h5 ><?php echo $this->session->userdata['fullname']; ?></h5>
            <p>Kuota KP : <?php echo (int)$this->session->userdata['kuota_kp']; ?> | Kuota TA : <?php echo (int)$this->session->userdata['kuota_ta']; ?></p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Foto Profil</button>

        </center>
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
            <p>Silahkan upload foto anda dengan ukuran file maksimal 200kb</p>
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
            <button type="submit" class="btn btn-warning" name="uploadFile" value="uploadFile">Upload</button>
            <button type="submit" class="btn btn-danger" name="deleteFile" value="deleteFile">Hapus Foto</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
    </div>
  </div>
