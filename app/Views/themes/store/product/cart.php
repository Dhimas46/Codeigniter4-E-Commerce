<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Detail Product</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link href="<?= base_url()?>/landing/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="<?= base_url()?>/landing/assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="<?= base_url()?>/landing/assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="<?= base_url()?>/landing/assets/css/argon-design-system.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link type="text/css" href="<?= base_url()?>/landing/assets/css/style.css" rel="stylesheet">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>

    <header class="header clearfix">
        <div class="top-bar d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <ul class="top-links contact-info">
                            <li><i class="fa fa-envelope-o"></i> <a href="#">contact@example.com</a></li>
                            <li><i class="fa fa-whatsapp"></i> +1 5589 55488 55</li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">
                          <?php if (logged_in()) : ?>
                            <li><i class="fa fa-user-circle-o"></i> <a href="<?= base_url('profil/'.user()->id) ?>">My Account</a></li>
                          <?php endif; ?>
                            <?php if (!logged_in()) : ?>
                            <li><i class="fa fa-power-off"></i> <a href="<?= base_url('login') ?>">Login</a></li>
                            <?php endif; ?>
                            <?php if (logged_in()) : ?>
                                <li><i class="fa fa-power-off"></i> <a href="<?= base_url('logout') ?>">Logout</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <a class="navbar-brand mr-lg-5" href="<?= base_url()?>">
                            <i class="fa fa-shopping-bag fa-3x"></i> <span class="logo">T3-Commerce</span>
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="#" class="search">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class="single-icon wishlist">
                                <a href="#"><i class="fa fa-shopping-cart fa-2x"></i></a>
                                <?php $cart = \Config\Services::cart(); ?>
                                <span class="badge badge-default"><?= $row = count($cart->contents()) ?></span>
                            </div>
                            <div class="single-icon shopping-cart">
                                <a href="<?= base_url('/') ?>"><i class="fa fa-home fa-2x"></i></a>
                                <span class="badge badge-default"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"
                                aria-expanded="true">Pages</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url('/') ?>">Products</a>
                            </div>
                        </li>
                    </ul>
                </div> <!-- collapse <?= base_url()?>/landing// -->
            </div> <!-- container <?= base_url()?>/landing// -->
        </nav>
    </header>


    <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
    </div>
    <div class="container">
      <?php echo form_open('home/update') ?>
      <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-stripped">
                <thead>
                <tr>
                  <th width="100px">Qty</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                  <th>Deskripsi Barang</th>
                  <th>Berat</th>
                  <th>Total</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $total_berat = 0;
                  $i = 1;
                  foreach ($cart->contents() as $key => $value) :
                    $total_berat = $total_berat + ($value['qty'] * $value['options']['berat']);
                    $id[]=$value['id'];
                    $jumlah = $value['qty'];
                  ?>
                <tr>
                  <td> <input type="number" name="qty<?=$i++?>" min="1" class="form-control" value="<?=$value['qty']?>"></td>
                  <td><?= $value['name']; ?></td>
                  <td><?= number_to_currency($value['price'], 'IDR'); ?></td>
                  <td><?= $value['options']['deskripsi'] ?></td>
                  <td><?= $value['options']['berat'] ?> gr</td>
                  <td><?= number_to_currency($value['subtotal'], 'IDR'); ?></td>
                  <td>
                    <a href="<?= base_url('home/delete/'.$value['rowid']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
              <p class="lead"></p>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <!-- <p class="lead">Amount Due 2/22/2014</p> -->
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td><?= number_to_currency($cart->total(), 'IDR'); ?></td>
                  </tr>
                  <tr>
                    <th>Total Berat :</th>
                    <td><?= $total_berat ?> Gr</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <div class="row no-print">
            <div class="col-12">
              <button type="submit" class="btn btn-default"><i class="fa fa-save"></i> Update Cart</button>
              <a href="<?= base_url('home/clear') ?>" rel="noopener" class="btn btn-warning"><i class="fa fa-trash"> Clear Cart</i></a>
              <button type="button" data-toggle="modal" data-target="#modal-checkout" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Checkout </button>

            </div>
          </div>
          <!-- /.row -->

        </div>
        <?php echo form_close(); ?>
      </div>

    </div>
    <div class="modal fade" id="modal-checkout">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Checkout Produk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('order')?>" enctype="multipart/form-data" method="post" autocomplete="off" >
              <?= csrf_field() ?>
              <div class="card-body ">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Pemesan : <b><?= user()->username ?></b></li>
                  <li class="list-group-item">Pesanan :</li>
                    <li class="list-group-item">
                      <?php foreach ($cart->contents() as $key => $value): ?>
                      <?= '<input name="id_product[]" type="hidden" value="'.$value['id'].'">'.$value['name'].' </br>'; ?>
                    <?php endforeach; ?></b>
                    </li>
                  <li class="list-group-item">Total :<b> <?= number_to_currency($cart->total(), 'IDR'); ?></b></li>
                  <li class="list-group-item">Silahkan Transfer ke Nomor Rekening ini Sesuai Total Harga</b></li>
                  <li class="list-group-item">Nomor Rekening : <b>216601010344509 (BRI)</b></li>
                </ul>

                <div class="form-group">
                  <input type="hidden" name="user" value="<?= user()->id ?>" class="form-control"  placeholder="Keterangan" required>
                </div>
                <input type="hidden" value="<?= $value['qty'] ?>" name="qty" class="form-control" required>
                <input type="hidden" value="<?= $value['id'] ?>" name="id" class="form-control" required>
                <div class="form-group">
                  <?php foreach ($cart->contents() as $key => $value): ?>
                  <input type="hidden" value="<?= $value['qty'] ?>" name="qty_total[]" class="form-control" required>
                    <?php endforeach; ?></b>
                </div>
                <div class="form-group">
                  <input type="hidden" value="<?= $cart->total() ?>" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Keterangan</label>
                  <input type="text" name="keterangan" class="form-control"  placeholder="Keterangan" required>
                </div>
                <div class="form-group">
                  <label for="kategori">Alamat (Sesuai alamat yang berada di profil anda)</label>
                  <input type="text" name="alamat" value="<?= user()->alamat ?>" class="form-control"  placeholder="Alamat" required readonly>
                </div>
                <div class="form-group">
                  <label for="bukti">Bukti Bayar</label>
                  <input type="file" name="bukti" class="form-control" required>
                </div>
                <div class="row">
                  <div class="col-md 4">
                    <div class="form-group">
                      <label for="provinsi">Provinsi</label>
                      <select class="form-control" id="provinsi" name="provinsi">
                        <option>Select Provinsi</option>
                        <?php foreach ($provinsi as $key => $value) : ?>
                          <option value="<?= $value->province_id ?>"><?= $value->province ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md 4">
                    <div class="form-group">
                      <label for="kabupaten">Kabupaten</label>
                      <select class="form-control" id="kabupaten" name="kota">
                        <option value="">select kabupaten/kota</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md 4">
                    <div class="form-group">
                      <label for="service">Pilih Service</label>
                      <select class="form-control" id="service" name="service">
                        <option value="">select service</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ongkir">Ongkir</label>
                  <input id="ongkir" type="text" name="ongkir" value="" class="form-control" readonly>
                </div>
                  <li id="estimasi" class="list-group-item"></b></li>
                  <!-- <li id="ongkir" class="list-group-item"></li> -->
                  <li id="total_harga" class="list-group-item"> </li>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
            </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->

    </div>
    <footer class="footer bg-primary">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo-footer">
                                <i class="fa fa-shopping-bag fa-3x"></i> <span class="logo">T3-Commerce</span>
                            </div>
                            <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna
                                eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor,
                                facilisis luctus, metus.</p>
                            <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456
                                        789</a></span></p>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer links">
                            <h4>Services</h4>
                            <ul>
                                <li><a href="#">Payment Methods</a></li>
                                <li><a href="#">Money-back</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer social">
                            <h4>Get In Touch</h4>
                            <!-- Single Widget -->
                            <div class="contact">
                                <ul>
                                    <li>NO. 342 - London Oxford Street.</li>
                                    <li>012 United Kingdom.</li>
                                    <li>info@indomarket.com</li>
                                    <li>+032 3456 7890</li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                <li><a href="#"><i class="ti-flickr"></i></a></li>
                                <li><a href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-inner border-top">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="left">
                                <p>Copyright © 2021 <a href="http://indokoding.net" target="_blank">IndoKoding.net</a> -
                                    All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="right pull-right">
                                <ul class="payment-cards">
                                    <li><i class="fa fa-cc-paypal"></i></li>
                                    <li><i class="fa fa-cc-amex"></i></li>
                                    <li><i class="fa fa-cc-mastercard"></i></li>
                                    <li><i class="fa fa-cc-stripe"></i></li>
                                    <li><i class="fa fa-cc-visa"></i></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core -->
    <script src="<?= base_url()?>/landing/assets/js/core/jquery.min.js"></script>
    <script src="<?= base_url()?>/landing/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url()?>/landing/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url()?>/landing/assets/js/core/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>/template/sweetalert2/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
    var flashError =$('#flashError').data('flash');
    if (flashError) {
        Swal.fire({
        icon: 'error',
        title: 'Error',
        text: flashError,
      })
    }
      var flash =$('#flash').data('flash');
      if (flash) {
          Swal.fire({
          icon: 'success',
          title: 'Success',
          text: flash,
        })
      }
      $(document).on('click', '#btn-hapus', function(e){
        e.preventDefault();
        var link = $(this).attr('href');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          confirmButtonColor: '#00a65a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          showCancelButton: true,
        }).then((result) => {
          if (result.isConfirmed) {
            window.location = link;
          }
        })
      })
    </script>
    <script>
        $('document').ready(function(){

          var jumlah_pembelian = <?= $jumlah?>;
          var harga =  <?= $cart->total(); ?>;
          var berat_total = <?= $total_berat ?>;
          var ongkir = 0;
          $("#provinsi").on('change', function(){
            $("#kabupaten").empty();
            var id_province = $(this).val();
            $.ajax({
              url : "<?= base_url('city') ?>",
              type : 'GET',
              data: {
                'id_province' : id_province,
              },
              dataType : 'json',
              success : function(data){
                console.log(data);
                var results = data["rajaongkir"]["results"];
                for (var i = 0; i < results.length; i++) {
                  $("#kabupaten").append($('<option>',{
                    value: results[i]["city_id"],
                    text : results[i]['city_name']
                  }));
                }
              },
            });
          });
          $("#kabupaten").on('change', function(){
            var id_city = $(this).val();
            $.ajax({
              url : "<?= base_url('getCost') ?>",
              type : 'GET',
              data: {
                'origin' : 255,
                'destination' : id_city,
                'weight' : berat_total,
                'courier' : 'jne'
              },
              dataType : 'json',
              success : function(data){
                console.log(data);
                var results = data["rajaongkir"]["results"][0]["costs"];
                for (var i = 0; i < results.length; i++)
                 {
                  var text = results[i]["description"]+"("+results[i]["service"]+")";
                  $("#service").append($('<option>',{
                    value : results[i]["cost"][0]["value"],
                    text : text,
                    etd : results[i]["cost"][0]["etd"]
                  }))
                }
              },
            });
          })
          $("#service").on('change', function(){
            var estimasi = $('option:selected', this).attr('etd');
            ongkir = parseInt($(this).val());
            $("#ongkir").val(ongkir);
            $("#estimasi").html("Estimasi : " + estimasi +" Hari")
            var total_harga = harga+ongkir;
            $("#total_harga").html("<b> Total Harga </b>: " + total_harga);
          });
        });
    </script>
    <!-- Optional plugins -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="<?= base_url()?>/landing/assets/js/argon-design-system.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>/landing/assets/js/main.js"></script>
</body>

</html>
