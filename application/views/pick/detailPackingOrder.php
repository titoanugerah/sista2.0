<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-primary">
          <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#allOrder" data-toggle="tab">
                    <i class="material-icons">assignment</i>
                    Semua Pesanan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#processPacking" data-toggle="tab">
                    <i class="material-icons">departure_board</i>
                    Sedang Diproses
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#finishedPacking" data-toggle="tab">
                    <i class="material-icons">error</i>
                    Sudah Diproses/Dikirim
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#sentPacking" data-toggle="tab">
                    <i class="material-icons">local_shipping</i>
                    Sampai Tujuan
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="allOrder">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Pemesan </th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords($item->fullname); ?></td>
                        <td class="text-center"><?php if ($item->status==0) {echo "Masa Order";} elseif($item->status==1){echo "Belum Diproses";}elseif($item->status==2){echo "Sudah Disetujui Admin";}elseif($item->status==3){echo "Diproses Bagian Stock";}elseif($item->status==4){echo "Pengiriman dari Stock ke Packaging";}elseif($item->status==5){echo "Diproses Packaging";}elseif($item->status==6){echo "Dikirim Ke masing masing DC";}elseif($item->status==7){echo "Pesanan Selesai";} ?></td>
                        <?php $i++; endforeach; ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane" id="processPacking">
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Pemesan </th>
                        <th class="text-center">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($list as $item): if($item->status!=5){continue;} ?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td class="text-center"><?php echo ucwords($item->fullname); ?></td>
                          <td class="text-center">
                            <center>
                              <a href="<?php echo base_url('processPacking/'.$item->id.'/'.$item->id_global_invoice); ?>">
                                <button type="button" rel="tooltip" class="btn btn-info">
                                  <i class="material-icons">done_all</i>
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

                <div class="tab-pane" id="finishedPacking">
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center">Pemesan </th>
                          <th class="text-center">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1; foreach ($list as $item): if($item->status!=6){continue;} ?>
                          <tr>
                            <td class="text-center"><?php echo $i ?></td>
                            <td class="text-center"><?php echo ucwords($item->fullname); ?></td>
                            <td class="text-center">
                              <center>
                                <a href="<?php echo base_url('processPacking/'.$item->id.'/'.$item->id_global_invoice); ?>">
                                  <button type="button" rel="tooltip" class="btn btn-info">
                                    <i class="material-icons">done_all</i>
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

                  <div class="tab-pane" id="sentPacking">
                    <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Pemesan </th>
                            <th class="text-center">Opsi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; foreach ($list as $item): if($item->status!=7){continue;} ?>
                            <tr>
                              <td class="text-center"><?php echo $i ?></td>
                              <td class="text-center"><?php echo ucwords($item->fullname); ?></td>
                              <td class="text-center">
                                <center>
                                  <a href="<?php echo base_url('processPacking/'.$item->id.'/'.$item->id_global_invoice); ?>">
                                    <button type="button" rel="tooltip" class="btn btn-info">
                                      <i class="material-icons">done_all</i>
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
