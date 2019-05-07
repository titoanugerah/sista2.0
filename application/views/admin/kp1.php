<div class="alert alert-warning alert-with-icon" data-notify="container">
  Pada Tab ini anda dapat membuat surat kelayakan kerja praktik dari mahasiswa terkait, silahkan isi sks dan dosen wali dari mahasiswa yang bersangkutan
</div>
<div class="card-body">
  <form method="post">
    <div class="row">
      <div class="col-md-3 pr-1">
        <div class="form-group">
          <label>SKS Selesai</label>
          <input type="text" name="skss" class="form-control" value="<?php echo $var ?>" required>
        </div>
      </div>
      <div class="col-md-3 pl-1">
        <div class="form-group">
          <label>SKS sedang diambil</label>
          <input type="text" name="sksd" class="form-control" value="" required>
        </div>
      </div>
      <div class="col-md-3 pl-1">
        <div class="form-group">
          <select name="id_dosen" class="js-example-1" required>
            <option value="#" selected disabled>Silahkan pilih Dosen Wali</option>
            <?php foreach ($content['dosen'] as $item): ?>
              <option value=" <?php echo $item->id; ?> "> <?php echo $item->fullname; ?> </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>
    <div class="button-container">
      <button type="submit" name="createKKP" value="createKKP" class="btn btn-primary">Buat Kelayakan KP</button>
    </div>
  </form>
</div>
