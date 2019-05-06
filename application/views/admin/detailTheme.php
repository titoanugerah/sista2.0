<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label>Nama Tema</label>
            <input type="text" class="form-control" value="<?php echo $content['detail']->nama_tema; ?>" name="nama_tema">
          </div>
          <div class="button-container">
            <button type="submit" name="updateTheme" value="updateTheme" class="btn btn-warning">Update Tema</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Hapus Tema</button>
            <a href="<?php echo base_url('theme'); ?>"><button type="button" class="btn btn-grey">Kembali</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">

        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nama Dosen</th>
              <th class="text-center">opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($content['listDosen'] as $item): ?>
              <tr>
                <td class="text-center"><?php echo $i ?></td>
                <td class="text-center"> <?php if($item->fullname==""){ echo "@".$item->username.' (Belum diupdate)'; } else { echo ucwords($item->fullname);} ?></td>
                <td class="td-actions text-center">
                  <center>
                    <a href="<?php echo base_url('detailAccount/'.$item->id); ?>">
                      <button type="button" rel="tooltip" class="btn btn-info">
                        <i class="material-icons">person</i>Detail
                      </button>
                    </a>
                  </center>
                </td>
                <?php $i++; endforeach; ?>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus tema <?php echo $config['detail']->nama_tema.'?'; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apabila anda sudah yakin menghapus tema ini? seluruh data tugas akhir dan kerja praktik yang memiliki data ini akan terhapus juga, serta dosen yang memiliki tema ini akan direset, silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deleteTheme" value="deleteTheme">Hapus Tema</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
