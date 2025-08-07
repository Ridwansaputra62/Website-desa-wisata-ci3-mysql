<!-- ============================================================== -->
<!-- Page wrapper -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= $judul; ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Container fluid -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <!-- Notifikasi flashdata -->
                    <?= $this->session->flashdata('pesan'); ?>

                    <div class="card-body">
                        

                        <!-- FOTO PROFIL -->
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Foto Profil</label>
                            <div class="col-sm-9">
                                <img src="<?= base_url('assets/images/users/' . $user['image']); ?>" width="120" class="img-thumbnail mb-2">
                            </div>
                        </div>

                        <!-- NAMA -->
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Nama Wisata</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control bg-light" value="<?= $user['nama']; ?>" readonly>
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="form-group row">
                            <label class="col-sm-3 text-right control-label col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control bg-light" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>

                        <!-- TOMBOL -->
                        <div class="form-group row mt-4">
                            <div class="col-sm-12 text-center">
                                <a href="<?= base_url('admin/editprofil'); ?>" class="btn btn-info px-4">
                                    <i class="ti-pencil-alt"></i> Edit Profil
                                </a>
                                <a href="<?= base_url('admin/ubahpassword'); ?>" class="btn btn-warning px-4">
                                    <i class="ti-lock"></i> Ubah Password
                                </a>
                                <a href="<?= base_url('background'); ?>" class="btn btn-success px-4">
                                    <i class="ti-image"></i> Ganti Background Home User
                                </a>
                            </div>
                        </div>
                    </div> <!-- End card-body -->
                </div> <!-- End card -->
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper -->
<!-- ============================================================== -->
