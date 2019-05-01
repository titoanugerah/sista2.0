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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah/Update Item </button>

              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords($item->item); ?></td>
                        <td class="text-center"><?php echo $item->qty; ?></td>
                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('deleteOrder/'.$item->id); ?>">
                              <button type="button" rel="tooltip" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                <i class="material-icons">delete_forever</i>
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

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
      <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="">Update Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <p>Silahkan isi form dibawah Ini</p>
            <div class="row">
              <div class="col-md-12 pr-1">
                <div class="form-group">
                  <label>Nama Item</label>
                  <select class="js-example-basic-single" name="id_item">
                    <option value="#" disabled selected>Silahkan Pilih</option>
                    <?php foreach ($list1 as $item): ?>
                      <option value="<?php echo $item->id; ?>"><?php echo $item->item; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 pr-1">
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="qty" class="form-control" placeholder="Masukan jumlah yang dibutuhkan" value="" required>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="addOrder" value="addOrder">Tambah Order</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
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
          Silahkan tunggu, sedang menghapus order
        </div>
      </div>
    </div>
  </div>
