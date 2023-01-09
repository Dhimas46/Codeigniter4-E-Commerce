
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Details</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
</div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
  </div>
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle"
               src="<?= base_url('/image/'.$user->image); ?>"
               alt="User profile picture">
        </div>
        <h3 class="profile-username text-center"><?= $user->username; ?></h3>

        <p class="text-muted text-center"><?= $user->name?></p>

        <ul class="list-group list-group-unbordered mb-3">
              <?php if ($user->fullname): ?>
          <li class="list-group-item">
            <b>Nama Lengkap</b> <a class="float-right"><?= $user->fullname; ?></a>
          </li>
            <?php endif; ?>
          <li class="list-group-item">
            <b>Email</b> <a class="float-right"><?= $user->email; ?></a>
          </li>
          <li class="list-group-item">
            <b>Nomor Telepon</b> <a class="float-right"><?= $user->telp; ?></a>
          </li>
          <li class="list-group-item">
            <b>Alamat</b> <a class="float-right"><?= $user->alamat; ?></a>
          </li>
          <li class="list-group-item">
            <form action="<?= site_url('superadmin/'.$user->userid) ?>" method="post" autocomplete="off" >
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                        <label>Change Role</label>
                        <select name="group_id" class="form-control">
                          <option value="<?= user()->name?>"> -- Chosee --</option>
                          <option value="1">Superadmin</option>
                          <option value="2">Admin</option>
                          <option value="3">User</option>
                        </select>
                      </div>
                    </li>

                  </ul>
                  <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">&nbsp</i>Save</button>
                <a href="<?=site_url('manage-user') ?>" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbspBack</a>
              </div>
          </form>



      </div>
      <!-- /.card-body -->
    </div>
  </div>

</div>

<?= $this->endSection() ?>
