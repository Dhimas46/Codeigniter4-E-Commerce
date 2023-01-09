<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Data Product</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->section('sub-bab') ?>
<h1 class="m-0">Data Product</h1>
<?= $this->endSection() ?>
<div class="row">
  <div class="class col md-12">
    <div class="card">
      <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
      </div>
      <div class="card-header">
          <a href="<?= base_url('add-barang')?>"  class="btn btn-success btn-sm"><i class="fa fa-plus"> Tambah Product </i></a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <form action="" method="get" autocomplete="off">
          <div class="float-left">
            <input type="text" value="<?= $keyword ?>" name="keyword" style="width:155pt;" placeholder="Keyword pencarian" class="form-control" >
          </div>
          <div class="float-left ml-2">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
          </div>
        </form>
        <br><br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nama Barang</th>
              <th>Stock</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Kategori</th>
              <th class="text-center" style="width: 200px" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $no = 1 + (5 * ($page - 1));
            foreach($product as $key => $value) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value->nama ?></td>
              <td><?= $value->stock ?></td>
              <td><?= number_to_currency($value->harga, 'IDR') ?></td>
              <td><?= $value->deskripsi ?></td>
              <td><?= $value->nama_kategori ?></td>

              <td class="text-center" style="width: 90px">
                <a href="<?= base_url('detail-barang/'.$value->id_product) ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <a href="<?= base_url('edit-barang/'.$value->id_product) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <a href="<?= base_url('hapus-barang/'.$value->id_product) ?>" id="btn-hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <div class="float-left">
          <i>Showing <?=1 + (5 * ($page - 1))?> to <?=$no-1?> of <?=$pager->getTotal() ?> entries</i>
        </div>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
        <?= $pager->links('default', 'pagination') ?>
        </ul>
      </div>
    </div>
  </div>

</div>

 <?= $this->endSection() ?>
