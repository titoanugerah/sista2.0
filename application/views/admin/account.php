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
                    <div class="card-body">
                      <form method="post">
                        <div class="row">
                          <div class="col-md-4 pr-1">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Masukan username" required>
                            </div>
                          </div>
                          <div class="col-md-4 pl-1">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Masukan email" >
                            </div>
                          </div>
                          <div class="col-md-4 pl-1">
                            <div class="form-group">
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="role" value="dosen" >
                                  Dosen
                                  <span class="circle">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="role" value="mahasiswa" >
                                  Mahasiswa
                                  <span class="circle">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="button-container">
                          <button type="submit" name="createAccount" value="createAccount" class="btn btn-primary">Simpan Data</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
