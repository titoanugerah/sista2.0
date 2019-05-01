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
                  <a class="nav-link active" href="#orderList" data-toggle="tab">
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
            <div class="tab-pane active" id="orderList">

              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Invoice</th>
                      <th class="text-center">Status</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords('Invoice #'.$item->id); ?></td>
                        <td class="text-center"><?php if ($item->status==0) {echo "Masa Order";} elseif($item->status==1){echo "Belum Diproses";}elseif($item->status==2){echo "Sudah Disetujui Admin";}elseif($item->status==3){echo "Diproses Bagian Stock";}elseif($item->status==4){echo "Pengiriman dari Stock ke Packaging";}elseif($item->status==5){echo "Diproses Packaging";}elseif($item->status==6){echo "Dikirim Ke DC Tujuan";}elseif($item->status==7){echo "Pesanan Selesai";} ?></td>
                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('detailOrder/'.$item->id); ?>">
                              <button type="button" rel="tooltip" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons">dehaze</i>
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
