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
                  <a class="nav-link active" href="#account" data-toggle="tab">
                    <i class="material-icons">assignment_ind</i>
                    Akun Pengguna
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#createAccount" data-toggle="tab">
                    <i class="material-icons">record_voice_over</i>
                    Buat Akun
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="account">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Posisi</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($account as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"> <?php if($item->fullname==""){ echo "Belum Diupdate"; } else { echo ucwords($item->fullname);} ?></td>
                        <td class="text-center"><?php echo strtoupper($item->role); ?></td>
                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('detailAccount/'.$item->id); ?>">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                              </button>
                            </a>
                            <a href="<?php echo base_url('deleteAccount/'.$item->id); ?>">
                              <button type="submit" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons">close</i>
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
              <div class="tab-pane" id="createAccount">
                <div class="card-body">
                  <form method="post">

                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" placeholder="Masukan username" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Masukan email pengguna" value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <span>Jenis Akun</span>
                          <div class="row">
                            <div class="col-md-3">

                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="role" value="admin">
                                  Admin
                                  <span class="circle">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>

                            <div class="col-md-3">

                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="role" value="dc">
                                  Distribution Center
                                  <span class="circle">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>

                            <div class="col-md-3">

                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="role" value="warehouse">
                                  Warehouse
                                  <span class="circle">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>

                            <div class="col-md-3">

                              <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="role" value="packing">
                                  Packing
                                  <span class="circle">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>

                          </div>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" name="fullname" class="form-control" placeholder="Masukan nama lengkap pengguna" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Nomor Telepon</label>
                          <input type="text" name="phone" class="form-control" placeholder="Masukan nomor telepon pengguna" value="" required>
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
