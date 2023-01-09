<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url()?>/template/index2.html" class="h1"> <i class="fas fa-store"></i> <b>T3-</b>Commerce</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Monggo Njenengan Login</p>
      	<?= view('Myth\Auth\Views\_message_block') ?>

        <form action="<?= url_to('login') ?>" method="post">
          <?= csrf_field() ?>
          <?php if ($config->validFields === ['email']): ?>
          						<div class="form-group">
          							<label for="login"><?=lang('Auth.email')?></label>
          							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
          								   name="login" placeholder="<?=lang('Auth.email')?>">
          							<div class="invalid-feedback">
          								<?= session('errors.login') ?>
          							</div>
          						</div>
          <?php else: ?>
          						<div class="form-group">
          							<label for="login"><?=lang('Auth.emailOrUsername')?></label>
          							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
          								   name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
          							<div class="invalid-feedback">
          								<?= session('errors.login') ?>
          							</div>
          						</div>
          <?php endif; ?>
          <div class="form-group">
            <label for="password"><?=lang('Auth.password')?></label>
            <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
            <div class="invalid-feedback">
              <?= session('errors.password') ?>
            </div>
          </div>
        <div class="row">
          <div class="col-8">

          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="<?= base_url('register') ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url()?>/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>/template/dist/js/adminlte.min.js"></script>
</body>
</html>
