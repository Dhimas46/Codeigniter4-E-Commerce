
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data User</title>
<?= $this->endSection() ?>
<?= $this->section('sub-bab') ?>
<h1 class="m-0">Manage User</h1>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">

  </div>
  <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Success !</b>
        <?=session()->getFlashdata('success')?>
      </div>
    </div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Error !</b>
        <?=session()->getFlashdata('error')?>
      </div>
    </div>
  <?php endif; ?>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Data User</h4>
    </div>
    <div class="card-header">
      <form action="" method="get" autocomplete="off">
        <div class="float-left">
          <input type="text" value="<?= $keyword ?>" name="keyword" style="width:155pt;" placeholder="Keyword pencarian" class="form-control" >
        </div>
        <div class="float-right ml-2">
          <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-striped table-md" id="table1">
        <tbody><tr>
          <th>#</th>
          <th>Username</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 + (5 * ($page - 1));

        foreach($users as $key => $value) : ?>
        <tr>
          <td><?=$no ++?></td>
          <td><?=$value->username?></td>
          <td><?=$value->name?></td>
          <td class="text-center" style="width:1%">
            <!-- <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a> -->
            <a href="<?= base_url('superadmin/' .$value->userid); ?>" class="btn btn-info btn-sm"><i class="fa fa-eye">&nbspDetalis</i></a>

            </form>
      </td>
        </tr>
      <?php endforeach; ?>

      </tbody>
    </table>
    <div class="float-left">
      <i>Showing <?=1 + (5 * ($page - 1))?> to <?=$no-1?> of <?=$pager->getTotal() ?> entries</i>
    </div>
    <div class="float-right">
      <?= $pager->links('default', 'pagination') ?>
    </div>

  </div>
</div>
</div>
</section>
<?= $this->endSection() ?>
