<img src="<?php echo base_url('./assets/upload/kp0.png'); ?>"  style="width: auto !important;height: auto !important;max-width: 100%;" alt="">
<br><br >
<div class="alert alert-warning">
  <button type="button" aria-hidden="true" class="close">
    <i class="now-ui-icons ui-1_simple-remove"></i>
  </button>
  <span>Fitur KP kamu belum diaktifin, nah cara buat ngaktifin gampang kok, kamu tinggal isi form dibawah ini, terus ngadep dosen wali sambil bawa transkrip/krs, ganbatte :)  </span>
</div>
<div class="card">

<div class="card-body">
  <form method="post">
    <div class="row">
      <div class="col-md-3 pr-1">
        <div class="form-group">
          <label>SKS Selesai</label>
          <input type="text" name="skss" class="form-control" value="" required>
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
</div>
