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
                <li class="nav-item">
                  <a class="nav-link" href="#dcOrder" data-toggle="tab">
                    <i class="material-icons">person_pin</i>
                    DC Pemesan
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#option" data-toggle="tab">
                    <i class="material-icons">rate_review</i>
                    Opsi
                  </a>
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">
            <div class="tab-pane active" id="orderRecap">
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
                    <?php $i = 1; foreach ($recap as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $i ?></td>
                        <td class="text-center"><?php echo ucwords($item->item); ?></td>
                        <td class="text-center"><?php echo ($item->qty); ?></td>
                        <?php $i++; endforeach; ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane" id="dcOrder">
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nama </th>
                        <th class="text-center">Order ID</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; foreach ($dc as $item): ?>
                        <tr>
                          <td class="text-center"><?php echo $i ?></td>
                          <td class="text-center"><?php echo ucwords($item->fullname); ?></td>
                          <td class="text-center"> <a href="<?php echo base_url('browseOrder/'.$item->id); ?>"><?php echo "#".$item->id; ?></a> </td>
                          <?php $i++; endforeach; ?>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="tab-pane" id="option">
                  <div class="card-body">
                    <form  method="post">
                      <button type="submit" name="agreeOrder" value="agreeOrder" class="btn btn-primary" <?php if($detail->status!=1){echo "hidden"; } ?>>Setujui Order</button>
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
