<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('sub-bab') ?>
<h1 class="m-0">Dashboard</h1>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?= countData('transaksi'); ?></h3>
        <p>Transaksi</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?= countData('product') ?><sup style="font-size: 20px"></sup></h3>

        <p>Data Product</p>
      </div>
      <div class="icon">
        <i class="ion ion-cube"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?= countData('kategori') ?></h3>
        <p>Kategori</p>
      </div>
      <div class="icon">
        <i class="ion ion-folder"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?= countData('users') ?></h3>

        <p>Data User</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>

<?= $this->endSection() ?>
