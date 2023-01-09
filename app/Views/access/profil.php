
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Profil</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
</div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
  </div>
<div class="row">
  <div class="col-md-6">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <ul class="list-group list-group-unbordered mb-3">
          <form action="<?= site_url('profil/'.$profil->userid) ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
            <div class="card-header">
          <h4><i class="fas fa-edit"></i> Edit Profile</h4>
            </div>
            <div class="card-body">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="imageLama" value="<?= $profil->image?>">
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?= $profil->fullname ?>">
                    <div class="invalid-feedback">
                      Please fill in the fullname
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $profil->username ?>" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in the NIM
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-lg-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea name="alamat" class="form-control" rows="3" placeholder=""><?= $profil->alamat ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $profil->email ?>" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input type="tel" name="telp" class="form-control" value="<?= $profil->telp ?>" required autofocus>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label >Profile Image *Ukuran disarankan 500x500</label> <br>
                    <label class="file-label"></label>
                    <div class="col-sm-3">
                    <img src="<?= base_url('image/'.user()->image)?>"  class="img-thumbnail img-preview" >
                    </div>
                    <input id="image" type="file" name="image" class="form-control" value="<?= $profil->image ?>" onchange="previewImg()">
                    <div class="invalid-feedback">
                      Please fill in the Profile Image
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
          <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">&nbsp</i>Save</button>
          <a href="<?=site_url('manage-user') ?>" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbspBack</a>
        </div>
          </form>
          </ul>
          </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
  <div class="col md-6">
    <div class="card card-primary card-outline">
      <div class="card-body box-profile">
        <div class="text-center">
            <?php if ($profil->image): ?>
          <img class="profile-user-img img-fluid img-circle"
               src="<?= base_url('/image/'.$profil->image); ?>"
               alt="User profile picture">
               <?php endif; ?>
        </div>
        <h3 class="profile-username text-center"><?= $profil->username; ?></h3>

        <p class="text-muted text-center"><?= $profil->name?></p>

        <ul class="list-group list-group-unbordered mb-3">
              <?php if ($profil->fullname): ?>
          <li class="list-group-item">
            <b>Nama Lengkap</b> <a class="float-right"><?= $profil->fullname; ?></a>
          </li>
            <?php endif; ?>
          <li class="list-group-item">
            <b>Email</b> <a class="float-right"><?= $profil->email; ?></a>
          </li>
          <li class="list-group-item">
            <b>Nomor Telepon</b> <a class="float-right"><?= $profil->telp; ?></a>
          </li>
          <li class="list-group-item">
            <b>Alamat</b> <a class="float-right"><?= $profil->alamat; ?></a>
          </li>

      </div>
      <!-- /.card-body -->
    </div>
  </div>

</div>

<?= $this->endSection() ?>
