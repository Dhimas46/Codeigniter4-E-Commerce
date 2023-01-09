<?= $this->extend('themes/store/default') ?>
<?= $this->section('title') ?>
<title>Dashboard</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<!-- Services -->
<section class="products-grids trending pb-4">
    <div class="container">

        <div class="row">
          <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
          </div>
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Items</h2>
                </div>
            </div>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $no = 1 + (8 * ($page - 1));
             foreach ($product as $key => $value): ?>
              <?php echo form_open('home/add');
              echo form_hidden('id', $value->id_product);
              echo form_hidden('price', $value->harga);
              echo form_hidden('name', $value->nama);
              //option
              echo form_hidden ('gambar', $value->gambar);
              echo form_hidden ('berat', $value->berat);
              echo form_hidden ('deskripsi', $value->deskripsi);
              ?>

        <div class="row mt-4" >
            <div class="col-xl 3 col-lg 4 col-md 4 col-12" >
                <div class="single-product">
                    <div class="product-img">
                        <a href="">
                            <img src="<?= base_url('image_barang/'.$value->gambar)?>" height="400px">
                        </a>
                    </div>
                    <div class="product-content">
                      <div class="float-right">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-shopping-cart"></i></button>
                      </div>
                        <h3><a href=""><?= $value->nama  ?></a></h3>
                        <div class="product-price">
                            <span><?= number_to_currency($value->harga, 'IDR');  ?></span>
                            <div class="col md-5">
                              </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>

<?php endforeach; ?>


        </div>
    </div>
    <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
      <?= $pager->links('default', 'pagination') ?>
      </ul>
    </div>
</section>
<!-- End Services -->
<?= $this->endSection() ?>
