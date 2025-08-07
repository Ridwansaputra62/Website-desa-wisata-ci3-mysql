<!-- ============================================================== -->
<!-- Page wrapper -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb mb-3">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <h4 class="page-title"><?= $judul; ?></h4>
                <div class="text-right">
                    <a href="<?= base_url('admin/profil'); ?>" class="btn btn-sm btn-outline-secondary">
                        <i class="mdi mdi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Container fluid -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm border-0">
                    <?= form_open('admin/ubahpassword', ['class' => 'form-horizontal']); ?>
                        <div class="card-body">

                            <h5 class="card-title text-dark font-weight-bold mb-4">Form Ubah Password</h5>

                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger"><?= validation_errors(); ?></div>
                            <?php endif; ?>
                            <?= $this->session->flashdata('message'); ?>

                            <!-- Password Lama -->
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-right font-weight-bold">Password Lama</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password_lama" class="form-control" required>
                                    <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Password Baru -->
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-right font-weight-bold">Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password1" class="form-control" required>
                                    <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- Ulangi Password Baru -->
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label text-right font-weight-bold">Ulangi Password Baru</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password2" class="form-control" required>
                                    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="border-top">
                            <div class="card-body text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="mdi mdi-lock-reset"></i> Ubah Password
                                </button>
                                <a href="<?= base_url('admin/profil'); ?>" class="btn btn-secondary">
                                    <i class="mdi mdi-arrow-left"></i> Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Page Content -->
    </div>
</div>
<!-- ============================================================== -->
<!-- End Page wrapper -->
<!-- ============================================================== -->
