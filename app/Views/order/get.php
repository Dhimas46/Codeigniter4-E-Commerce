
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Order</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->section('sub-bab') ?>
<h4>Detail Pesanan</h4>
<?= $this->endSection() ?>
</div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3"><h3 class="card-title">Pesanan</h3></li>
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Dipesan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Diproses</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Dikirim</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-two-settings-tab" data-toggle="pill" href="#custom-tabs-two-settings" role="tab" aria-controls="custom-tabs-two-settings" aria-selected="false">Selesai</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
              <table class="table table-bordered">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Gambar</th>
                    <th>Nama Product</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Nama Pembeli</th>
                    <th>Harga</th>
                    <th>Bukti</th>
                    <th class="text-center" style="width: 100px" >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $no = 1 + (5 * ($page - 1));

                  foreach($dipesan as $key => $value) :
                       $total = $value->service + $value->harga;
                     ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="<?= base_url('image_barang/'.$value->gambar) ?>" height="200px"></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->order_status ?></td>
                    <td><?= $value->qty ?></td>
                    <td><?= $value->fullname ?></td>
                    <td class="text-right"> Ongkir : <?= number_to_currency($value->service,'IDR'); ?><br>
                    Harga : <?= number_to_currency($value->harga ,'IDR'); ?> <br>
                    <hr>
                    <b>Total : <?= number_to_currency($total ,'IDR'); ?></b></td>
                    <td>
                      <a href="<?= base_url('bukti/'.$value->bukti ) ?>" target="_blank"  class="btn btn-success btn-sm"><i class="fa fa-camera"> Bukti </i></a>
                    </td>
                    <td text-align="center" width="120px">
              <form class="d-inline" action="<?= site_url('status/'.$value->id_transaksi) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <button name="order_status" class="btn btn-success" value="diproses">
              <i class="fas fa-pencil-alt"> Proses</i>
            </button>

          </form>
            </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>

            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
              <table class="table table-bordered">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Gambar</th>
                    <th>Nama Product</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Nama Pembeli</th>
                    <th>Harga</th>
                    <th>Bukti</th>
                    <th class="text-center" style="width: 100px" >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $no = 1 + (5 * ($page - 1));

                  foreach($diproses as $key => $value) :
                       $total = $value->service + $value->harga;
                     ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="<?= base_url('image_barang/'.$value->gambar) ?>" height="200px"></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->order_status ?></td>
                    <td><?= $value->qty ?></td>
                    <td><?= $value->fullname ?></td>
                    <td class="text-right"> Ongkir : <?= number_to_currency($value->service,'IDR'); ?><br>
                    Harga : <?= number_to_currency($value->harga ,'IDR'); ?> <br>
                    <hr>
                    <b>Total : <?= number_to_currency($total ,'IDR'); ?></b></td>
                    <td>
                      <a href="<?= base_url('bukti/'.$value->bukti ) ?>" target="_blank"  class="btn btn-success btn-sm"><i class="fa fa-camera"> Bukti </i></a>
                    </td>
                    <td text-align="center" width="120px">
              <form class="d-inline" action="<?= site_url('status/'.$value->id_transaksi) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <button name="order_status" class="btn btn-primary" value="dikirim">
              <i class="fas fa-paper-plane"> Kirim</i>
            </button>

          </form>
            </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
              <table class="table table-bordered">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Gambar</th>
                    <th>Nama Product</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Nama Pembeli</th>
                    <th>Harga</th>
                    <th>Bukti</th>
                    <th class="text-center" style="width: 100px" >Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $no = 1 + (5 * ($page - 1));

                  foreach($dikirim as $key => $value) :
                       $total = $value->service + $value->harga;
                     ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="<?= base_url('image_barang/'.$value->gambar) ?>" height="200px"></td>
                    <td><?= $value->nama ?></td>
                    <td><?= $value->order_status ?></td>
                    <td><?= $value->qty ?></td>
                    <td><?= $value->fullname ?></td>
                    <td class="text-right"> Ongkir : <?= number_to_currency($value->service,'IDR'); ?><br>
                    Harga : <?= number_to_currency($value->harga ,'IDR'); ?> <br>
                    <hr>
                    <b>Total : <?= number_to_currency($total ,'IDR'); ?></b></td>
                    <td>
                      <a href="<?= base_url('bukti/'.$value->bukti ) ?>" target="_blank"  class="btn btn-success btn-sm"><i class="fa fa-camera"> Bukti </i></a>
                    </td>
                    <td text-align="center" width="120px">
              <form class="d-inline" action="<?= site_url('status/'.$value->id_transaksi) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <button name="order_status" class="btn btn-success" value="diterima">
              <i class="fas fa-check"> notif</i>
            </button>

          </form>
            </td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-settings" role="tabpanel" aria-labelledby="custom-tabs-two-settings-tab">
              <table class="table table-bordered">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Gambar</th>
                    <th>Nama Product</th>
                    <th>Status</th>
                    <th>Jumlah</th>
                    <th>Nama Pembeli</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $page = isset($_GET['page']) ? $_GET['page'] : 1;
                  $no = 1 + (5 * ($page - 1));

                  foreach($selesai as $key => $value) :
                       $total = $value->service + $value->harga;
                     ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="<?= base_url('image_barang/'.$value->gambar) ?>" height="200px"></td>
                    <td><?= $value->nama ?></td>
                    <td><b><?= $value->order_status ?></b></td>
                    <td><?= $value->qty ?></td>
                    <td><?= $value->fullname ?></td>
                    <td class="text-right"> Ongkir : <?= number_to_currency($value->service,'IDR'); ?><br>
                    Harga : <?= number_to_currency($value->harga ,'IDR'); ?> <br>
                    <hr>
                    <b>Total : <?= number_to_currency($total ,'IDR'); ?></b></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>



<?= $this->endSection() ?>
