
<li class="nav-item">
  <a href="<?= base_url('dashboard') ?>" class="nav-link active">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<?php if (in_groups('superadmin')): ?>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tree"></i>
    <p>
      Master
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= base_url('kategori') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Kategori</p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<?php if (in_groups('admin')): ?>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-tree"></i>
    <p>
      Master
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="<?= base_url('kategori') ?>" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Kategori</p>
      </a>
    </li>
  </ul>
</li>
<?php endif; ?>
<?php if (in_groups('superadmin')): ?>
<li class="nav-item">
  <a href="<?= base_url('barang') ?>" class="nav-link">
    <i class="nav-icon fas fa-box"></i>
    <p>
      Barang
    </p>
  </a>
</li>
<?php endif; ?>
<?php if (in_groups('admin')): ?>
<li class="nav-item">
  <a href="<?= base_url('barang') ?>" class="nav-link">
    <i class="nav-icon fas fa-box"></i>
    <p>
      Barang
    </p>
  </a>
</li>
<?php endif; ?>
<!-- <li class="nav-item">
  <a href="<?= base_url('transaksi') ?>" class="nav-link">
    <i class="nav-icon fas fa-file-invoice"></i>
    <p>
      Transaksi
    </p>
  </a>
</li> -->
<li class="nav-item">
  <a href="<?= base_url('transaksi/'.user()->id) ?>" class="nav-link">
    <i class="nav-icon fas fa-file-invoice"></i>
    <p>
      Order
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('history/'.user()->id) ?>" class="nav-link">
    <i class="nav-icon fas fa-file-invoice"></i>
    <p>
      History
    </p>
  </a>
</li>
<?php if (in_groups('superadmin')) : ?>
<li class="nav-item">
  <a href="<?= base_url('manage-user') ?>" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Manage User
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('transaksi') ?>" class="nav-link">
    <i class="nav-icon fas fa-file-invoice"></i>
    <p>
      Transaksi
    </p>
  </a>
</li>
<?php endif; ?>
<li class="nav-item">
  <a href="<?= base_url('/') ?>" class="nav-link">
    <i class="nav-icon fas fa-store"></i>
    <p>
      Toko
    </p>
  </a>
</li>
