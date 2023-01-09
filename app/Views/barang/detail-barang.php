<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Detail Product</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->section('sub-bab') ?>
<h1 class="m-0">Data Detail Product</h1>
<?= $this->endSection() ?>

<div class="row">
  <div class="class col md-12">
    <div class="card">
      <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
      </div>
      <div class="card-header">
          <a href="<?= base_url('barang')?>"  class="btn btn-warning">Kembali</a>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Gambar</th>
              <th>Deskripsi</th>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>  <img src="<?= base_url('image_barang/'.$product->gambar) ?>" height="200px"></td>
              <td><?= $product->deskripsi ?></td>
            </tr>

          </tbody>
        </table>

      </div>
      <!-- /.card-body -->

    </div>
  </div>

</div>

<?= $this->endSection() ?>
