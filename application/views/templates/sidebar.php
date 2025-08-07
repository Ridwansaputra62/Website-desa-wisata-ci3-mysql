<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- ============================================================== -->
<!-- Left Sidebar -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="p-t-0">

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('admin'); ?>" aria-expanded="false">
            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-receipt"></i><span class="hide-menu">Master</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('admin/pengguna'); ?>" class="sidebar-link">
                <i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Data User </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('jenis_wisata'); ?>" class="sidebar-link">
                <i class="mdi mdi-map-marker"></i><span class="hide-menu"> Data Wisata </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('fasilitas'); ?>">
                <i class="mdi mdi-domain"></i><span class="hide-menu">Data Fasilitas Wisata</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('paket'); ?>" class="sidebar-link">
                <i class="mdi mdi-webpack"></i><span class="hide-menu"> Data Paket Wisata </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('gallery'); ?>" aria-expanded="false">
            <i class="mdi mdi-image-multiple"></i><span class="hide-menu">Galeri</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('video'); ?>" aria-expanded="false">
            <i class="mdi mdi-video"></i><span class="hide-menu">Video</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('artikel'); ?>" aria-expanded="false">
            <i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Artikel</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-printer"></i><span class="hide-menu">Laporan</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('laporan'); ?>" aria-expanded="false">
                <i class="mdi mdi-file-document-box"></i><span class="hide-menu">Laporan Data Wisata</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('laporan_fasilitas'); ?>" aria-expanded="false">
                <i class="mdi mdi-file-document-box"></i><span class="hide-menu">Laporan Data Fasilitas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('laporan_paket'); ?>" aria-expanded="false">
                <i class="mdi mdi-file-document-box"></i><span class="hide-menu">Laporan Data Paket</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-information-outline"></i><span class="hide-menu">Tentang</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('sejarah'); ?>" class="sidebar-link">
                <i class="mdi mdi-newspaper"></i><span class="hide-menu"> Sejarah Desa </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('visi'); ?>" class="sidebar-link">
                <i class="mdi mdi-paper-cut-vertical"></i><span class="hide-menu"> Visi Misi </span>
              </a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
            <i class="mdi mdi-contact-mail"></i><span class="hide-menu">Kontak</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="<?= base_url('kontak'); ?>" class="sidebar-link">
                <i class="mdi mdi-contacts"></i><span class="hide-menu"> Data Kontak </span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="<?= base_url('pesan'); ?>" class="sidebar-link">
                <i class="mdi mdi-email"></i><span class="hide-menu"> Pesan </span>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar -->
<!-- ============================================================== -->
