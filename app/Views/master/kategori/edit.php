
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Edit Kategori</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->section('sub-bab') ?>
<h1 class="m-0">Edit Kategori</h1>
<?= $this->endSection() ?>

<form action="<?= base_url('kategori/'.$kategori->id)?>" method="post" autocomplete="off" >
  <?= csrf_field() ?>
  <input type="hidden" name="_method" value="PUT">
  <div class="card-body">
    <div class="form-group">
      <label for="exampleInputPassword1">Kategori</label>
      <input type="text" class="form-control" value="<?= $kategori->nama_kategori ?>" name="nama_kategori" id="exampleInputPassword1" placeholder="Nama Kategori Barang">
    </div>
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<?= $this->endSection() ?>
