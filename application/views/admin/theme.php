<div class="card">

  <div class="card-body">
    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambahkan Tema Baru</button>

    <table class="table">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Nama Tema</th>
          <th class="text-center">Jumlah Dosen</th>
          <th class="text-center">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; foreach ($content['theme'] as $item): ?>
          <tr>
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $item->nama_tema; ?></td>
            <td class="text-center"><?php echo $item->jumlah_dosen.' Dosen'; ?></td>
            <td class="td-actions text-center">
              <center>
                <a href="<?php echo base_url('detailTheme/'.$item->id); ?>">
                  <button type="button" rel="tooltip" class="btn btn-info">
                    <i class="material-icons">local_offer</i>Detail
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

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Tema Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Tema</label>
              <input type="text" name="nama_tema" class="form-control" placeholder="Masukan nama tema disini" value="">
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="createTheme" value="createTheme">Buat Tema Baru</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>
