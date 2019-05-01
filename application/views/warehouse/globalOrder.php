<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-warning">
          <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#itemList" data-toggle="tab">
                    <i class="material-icons">library_books</i>
                    Pesanan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#handled" data-toggle="tab">
                    <i class="material-icons">assignment_turned_in</i>
                    Pesanan Sedang Diproses
                  </a>
                </li>                
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="itemList">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Proses Pesanan</button>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Stok</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($order as $item): ?>
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

              <div class="tab-pane" id="handled">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Proses Pesanan</button>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Order</th>
                        <th class="text-center">Sukses</th>
                        <th class="text-center">Selisih</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($handled as $item): ?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td class="text-center"><?php echo ucwords($item->item); ?></td>
                          <td class="text-center"><?php echo $item->qty_in; ?></td>
                          <td class="text-center"><?php echo $item->qty_out; ?></td>
                          <td class="text-center"><?php echo $item->qty_diff; ?></td>
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



      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form  method="post">
            <div class="modal-content">

              <div class="modal-header">
                <h5 class="modal-title" id="">Form Proses Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <p>Silahkan isi form dibawah Ini</p>
                <br>
                <div class="row">
                  <div class="col-md-12 pr-1">
                    <div class="form-group">
                      <label>Nama Item</label>
                      <select class="js-example-basic-single" name="id_item">
                        <option value="#" disabled selected>Silahkan Pilih</option>
                        <?php foreach ($order as $item): ?>
                          <option value="<?php echo $item->id_item; ?>"><?php echo $item->item; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">

                  <div class="col-md-6 pr-1">
                    <div class="form-group">
                      <label>Jumlah Stok Keluar</label>
                      <input type="number" name="qty_out" class="form-control" placeholder="Masukan stok keluar" value="" required>
                    </div>
                  </div>


                  <div class="col-md-6 pl-1">
                    <div class="form-group">
                      <label>Batch</label>
                      <input type="text" name="batch" class="form-control" placeholder="Masukan batch" value="" required>
                    </div>
                  </div>

                </div>
              </div>

              <div class="modal-footer modal-danger">
                <button type="submit" class="btn btn-warning" name="itemOut" value="itemOut">Buat Nota</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
              </div>
            </div>
          </form>
        </div>
      </div>
