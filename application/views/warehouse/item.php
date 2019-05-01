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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createItem">Tambah Item Baru</button>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Update Item</button>
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th class="text-center">Nama</th>
                      <th class="text-center">Stok</th>
                      <th class="text-justify">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($list as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords($item->item); ?></td>
                        <td class="text-center"><?php echo $item->stock; ?></td>
                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('itemDetail/'.$item->id); ?>">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="createItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Tambah Item</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Silahkan isi form dibawah Ini</p>
            <div class="md-form">
              <div class="form-group">
                <label>item</label>
                <input type="text" name="item" class="form-control" placeholder="Masukan nama item" value="" required>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>Stok Awal</label>
                    <input type="number" name="stock" class="form-control" placeholder="Masukan stok awal" value="" required>
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
          </div>
          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="createItem" value="createItem">Buat Item</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
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
            <br>
            <div class="row">
              <div class="col-md-12 pr-1">
                <div class="form-group">
                  <label>Nama Item</label>
                  <select class="js-example-basic-single" name="id_item">
                    <option value="#" disabled selected>Silahkan Pilih</option>
                    <?php foreach ($list as $item): ?>
                      <option value="<?php echo $item->id; ?>"><?php echo $item->item; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>Jumlah Stok Masuk</label>
                  <input type="number" name="qty_in" class="form-control" placeholder="Masukan stok masuk" value="" required>
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
            <button type="submit" class="btn btn-warning" name="updateItem" value="updateItem">Update Stok Item</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>
