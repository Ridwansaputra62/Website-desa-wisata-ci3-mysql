<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
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
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">

                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <?= $this->session->flashdata('message'); ?>

                    <?= form_open_multipart('admin/editprofil', ['class' => 'form-horizontal']); ?>
                        <div class="card-body">
                            <h4 class="card-title">Form Edit Profil</h4>

                            <!-- NAMA -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" value="<?= $user['nama']; ?>" placeholder="Masukkan nama lengkap">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- EMAIL (editable) -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" placeholder="Masukkan email aktif">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <!-- LOGO LAMA -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Logo Sekarang</label>
                                <div class="col-sm-9">
                                    <img src="<?= base_url('assets/images/users/' . $user['image']); ?>" width="120" class="img-thumbnail mb-2">
                                </div>
                            </div>

                            <!-- LOGO BARU -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Upload Logo Baru</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control-file">
                                    <small class="text-muted">Format: jpg, png, jpeg. Maksimal 2MB.</small>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Simpan</button>
                                <a href="<?= base_url('admin/profil'); ?>" class="btn btn-secondary"><i class="mdi mdi-arrow-left"></i> Kembali</a>
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
<!-- End Page wrapper  -->
<!-- ============================================================== -->
