<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-success">
          <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#mahasiswa" data-toggle="tab">
                    <i class="material-icons">face</i>
                    Akun Mahasiswa
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#dosen" data-toggle="tab">
                    <i class="material-icons">perm_identity</i>
                    Akun Dosen
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#createNew" data-toggle="tab">
                    <i class="material-icons">person_add</i>
                    Tambah Akun
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="mahasiswa">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">NIM</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($content['mahasiswa'] as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"> <?php if($item->fullname==""){ echo "@".$item->username.' (Belum diupdate)'; } else { echo ucwords($item->fullname);} ?></td>
                        <td class="text-center"><?php echo $item->nim; ?></td>
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
              <div class="tab-pane" id="dosen">
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIM</th>
                        <th class="text-justify">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($content['dosen'] as $item): ?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td class="text-center"> <?php if($item->fullname==""){ echo "@".$item->username.' (Belum diupdate)'; } else { echo ucwords($item->fullname);} ?></td>
                          <td class="text-center"><?php echo $item->nip; ?></td>
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
                <div class="tab-pane" id="createNew">
                  <div class="card-body">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menghapus Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Silahkan tunggu, sedang menghapus akun
          </div>
        </div>
      </div>
    </div>
