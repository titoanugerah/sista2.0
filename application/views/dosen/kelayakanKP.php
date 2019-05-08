<div class="card">
  <div class="card-body">
    <a href="<?php echo base_url('accKKP/all'); ?>" class="btn btn-success" <?php if($this->session->userdata['superdosen']==0){echo 'hidden';} ?>>Setujui Semua Permintaan</a>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Nama</th>
          <th class="text-center">NIM</th>
          <th class="text-center">SKS</th>
          <th class="text-center">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; foreach ($content['list'] as $item): ?>
          <tr>
            <td class="text-center"><?php echo $i ?></td>
            <td class="text-center"><?php echo $item->nama_mahasiswa; ?></td>
            <td class="text-center"><?php echo $item->nim; ?></td>
            <td class="text-center"><?php echo (int)($item->skss + $item->sksd); ?></td>
            <td class="td-actions text-center">
              <center>
                <a href="<?php echo base_url('accKKP/'.$item->id_mahasiswa); ?>">
                  <button type="button" rel="tooltip" class="btn btn-success">
                    <i class="material-icons">done_all</i> Setujui
                  </button>
                </a>
              </center>
            </td>
          </tr>
            <?php $i++; endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
