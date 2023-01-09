
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Details</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<?= $this->section('sub-bab') ?>
<h1 class="m-0">Data Kategori</h1>
<?= $this->endSection() ?>
<div class="row">
</div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
  </div>
  <div class="class col md-12">
    <div class="card">
      <div class="card-header">
        <a href="<?= base_url('add-kategori')?>" data-toggle="modal" data-target="#modal-add" class="btn btn-success btn-sm"><i class="fa fa-plus"> Tambah Kategori </i></a>
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
          <br>
          <br>
        <table class="table table-bordered">

          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Nama Kategori</th>
              <th class="text-center" style="width: 200px" >Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $no = 1 + (5 * ($page - 1));

            foreach($kategori as $key => $value) : ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value->nama_kategori ?></td>
              <td class="text-center" style="width: 90px">
                <a href="<?= base_url('kategori/'.$value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                <a id="btn-hapus" href="<?= site_url('kategori-hapus/'.$value->id) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
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
<div class="modal fade" id="modal-add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Kategori Artikel</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('kategori')?>" method="post" autocomplete="off" >
          <?= csrf_field() ?>
          <div class="card-body ">
            <div class="form-group">
              <label for="kategori">Nama Kategori Artikel</label>
              <input type="text" name="nama_kategori" class="form-control" id="kategori" placeholder="Nama Kategori" required>
            </div>
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

<?= $this->endSection() ?>
