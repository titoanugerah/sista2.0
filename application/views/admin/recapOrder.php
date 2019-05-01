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
                  <a class="nav-link active" href="#orderRecap" data-toggle="tab">
                    <i class="material-icons">library_books</i>
                    Item
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="itemList">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Tanggal </th>
                      <th class="text-center">Status</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($recap as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords($item->date); ?></td>
                        <td class="text-center"><?php if ($item->status==0) {echo "Masa Order";} elseif($item->status==1){echo "Belum Diproses";}elseif($item->status==2){echo "Sudah Disetujui Admin";}elseif($item->status==3){echo "Diproses Bagian Stock";}elseif($item->status==4){echo "Pengiriman dari Stock ke Packaging";}elseif($item->status==5){echo "Diproses Packaging";}elseif($item->status==6){echo "Dikirim Ke masing masing DC";}elseif($item->status==7){echo "Pesanan Selesai";} ?></td>
                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('detailRecapOrder/'.$item->id); ?>">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">description</i>
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
              <div class="tab-pane" id="createItem">
                <div class="card-body">
                  <form method="post">

                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Nama Item</label>
                          <input type="text" name="item" class="form-control" placeholder="Masukan nama item" value="" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Stok Awal</label>
                          <input type="number" name="stock" class="form-control" placeholder="Masukan stok awal" value="" required>
                        </div>
                      </div>
                    </div>


                    <div class="button-container">
                      <button type="submit" name="createItem" value="createItem" class="btn btn-primary">Tambah Item</button>
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
