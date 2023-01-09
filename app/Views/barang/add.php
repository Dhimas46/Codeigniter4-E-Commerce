<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Data Product</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->section('sub-bab') ?>
<h1 class="m-0">Tambah Data Product</h1>
<?= $this->endSection() ?>

<form action="<?= site_url('barang/add') ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
  <?= csrf_field() ?>
  <div class="card-body ">
    <div class="form-group">
      <label >Nama Barang</label>
      <input type="text" name="nama" class="form-control" placeholder="Nama barang">
    </div>
    <div class="row">
      <div class="form-group col-md 4">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control" placeholder="Stock">
      </div>
      <div class="form-group col-md 4">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" placeholder="Contoh : 3jt = 3000000">
      </div>
      <div class="form-group col-md 4">
        <label>Berat</label>
        <input type="number" name="berat" class="form-control" placeholder="Satuan : Gram">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-md 12">
        <label for="exampleInputFile">Gambar</label>
        <div class="input-group">
          <div class="custom-file">
            <input name="gambar" type="file" class="custom-file-input" id="gambar_1">
            <label class="custom-file-label" for="gambar_1">Choose file</label>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label>Keterangan</label>
      <textarea class="form-control" name="deskripsi" rows="3" placeholder="Enter ..."></textarea>
    </div>
    <div class="form-group">
      <label>Pilih Kategori</label>
      <select name="id_kategori" class="form-control select2" style="width: 100%;">
      <?php foreach ($kategori as $key => $value) : ?>
        <option value="<?=$value->id ?>"><?=$value->nama_kategori ?></option>
      <?php endforeach; ?>
      </select>
    </div>
  </div>
</div>
<div class="modal-footer justify-content-between">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Save changes</button>
</div>
</form>
<?= $this->endSection() ?>
