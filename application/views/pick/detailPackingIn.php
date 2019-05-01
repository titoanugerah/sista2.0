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
                  <a class="nav-link active" href="#packingOrder" data-toggle="tab">
                    <i class="material-icons">description</i>
                    Belum Checklist
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#checkedItem" data-toggle="tab">
                    <i class="material-icons">done_all</i>
                    Sudah Checklist
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="packingOrder">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Item </th>
                      <th class="text-center">Qty</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list as $item): if($item->status!=3){continue;}?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords($item->item); ?></td>
                        <td class="text-center"><?php echo $item->qty; ?></td>

                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('checklistItem/'.$item->id_item.'/'.$item->id_global_invoice); ?>">
                              <button type="button" rel="tooltip" class="btn btn-success">
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
              <div class="tab-pane" id="checkedItem">
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Item </th>
                        <th class="text-center">Qty</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($list as $item): if($item->status!=4){continue;}?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td class="text-center"><?php echo ucwords($item->item); ?></td>
                          <td class="text-center"><?php echo $item->qty; ?></td>
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
