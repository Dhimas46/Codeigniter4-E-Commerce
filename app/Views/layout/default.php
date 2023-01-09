<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <?= $this->renderSection('title') ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->

  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>/template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>/template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url()?>/template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user-circle"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <div class="dropdown-divider"></div>
                <a href="<?=base_url('profil/'.user()->id) ?>" class="dropdown-item">
                  <i class="fas fa-user-alt"></i> Profil
                </a>
                <a href="<?= base_url('logout') ?>" class="dropdown-item">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('/') ?>" class="brand-link">
      <img src="<?= base_url()?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Toko</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="<?=base_url('profil/'.user()->id) ?>" class="d-block">Hello, <?= user()->username ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?= $this->include('layout/menu') ?>
          <ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?= $this->renderSection('sub-bab') ?>

          </div>
          <!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>  /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <?= $this->renderSection('content') ?>
          </div>
          </div>
          <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
          </aside>
          <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
              <b>Version</b> 3.2.0
            </div>
          </footer>
          <script src="<?= base_url()?>/template/plugins/jquery/jquery.min.js"></script>
          <!-- jQuery UI 1.11.4 -->
          <script src="<?= base_url()?>/template/plugins/jquery-ui/jquery-ui.min.js"></script>
          <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
          <script>
            $.widget.bridge('uibutton', $.ui.button)
          </script>
          <!-- Bootstrap 4 -->
          <script src="<?= base_url()?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
          <!-- ChartJS -->
          <script src="<?= base_url()?>/template/plugins/chart.js/Chart.min.js"></script>
          <!-- Sparkline -->
          <script src="<?= base_url()?>/template/plugins/sparklines/sparkline.js"></script>
          <!-- JQVMap -->
          <script src="<?= base_url()?>/template/plugins/jqvmap/jquery.vmap.min.js"></script>
          <script src="<?= base_url()?>/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
          <!-- jQuery Knob Chart -->
          <script src="<?= base_url()?>/template/plugins/jquery-knob/jquery.knob.min.js"></script>
          <!-- daterangepicker -->
          <script src="<?= base_url()?>/template/plugins/moment/moment.min.js"></script>
          <script src="<?= base_url()?>/template/plugins/daterangepicker/daterangepicker.js"></script>

          <script src="<?= base_url()?>/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
          <!-- AdminLTE App -->
          <script src="<?= base_url()?>/template/dist/js/adminlte.js"></script>

          <script src="<?=base_url()?>/template/sweetalert2/dist/sweetalert2.all.js"></script>
          </body>
          </html>
          <script type="text/javascript">
            function previewDoc(){
              const dokumen = document.querySelector('#dokumen');
              const dokumenLabel = document.querySelector('.file-label');
              const imgPreview = document.querySelector('.img-preview');

              dokumenLabel.textContent = dokumen.files[0].name;

              const fileDokumen = new FileReader();
              fileDokumen.readAsDataURL(dokumen.files[0]);

              fileDokumen.onload = function(e){
                imgPreview.src = e.target.result;
              }
            }

            </script>
            <script type="text/javascript">
            var flashError =$('#flashError').data('flash');
            if (flashError) {
                Swal.fire({
                icon: 'error',
                title: 'Error',
                text: flashError,
              })
            }
              var flash =$('#flash').data('flash');
              if (flash) {
                  Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: flash,
                })
              }
              $(document).on('click', '#btn-hapus', function(e){
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  confirmButtonColor: '#00a65a',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!',
                  showCancelButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location = link;
                  }
                })
              })
            </script>
            <!-- <script type="text/javascript">
            Swal.fire('Any fool can use a computer')
            </script> -->
            <script type="text/javascript">
            function previewImg(){
              const image = document.querySelector('#image');
              const imageLabel = document.querySelector('.file-label');
              const imgPreview = document.querySelector('.img-preview');

              imageLabel.textContent = image.files[0].name;

              const fileImage = new FileReader();
              fileImage.readAsDataURL(image.files[0]);

              fileImage.onload = function(e){
                imgPreview.src = e.target.result;
              }
            }

            </script>
