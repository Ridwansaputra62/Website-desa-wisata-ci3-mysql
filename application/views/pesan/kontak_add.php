<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= $judul; ?></h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php } ?>
                    <?= $this->session->flashdata('pesan'); ?>
                    <form class="form-horizontal" action="<?= base_url('kontak/simpan'); ?>" method="post">
                        <div class="card-body">
                            <h4 class="card-title">Kontak Info</h4>

                            <!-- Alamat -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Alamat Lengkap</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"><?= set_value('alamat'); ?></textarea>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                                </div>
                            </div>

                            <!-- Telepon -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="telepon" placeholder="Nomor Telepon" value="<?= set_value('telepon'); ?>">
                                </div>
                            </div>

                            <!-- Instagram -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="<?= set_value('instagram'); ?>">
                                </div>
                            </div>

                            <!-- TikTok -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">TikTok</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tiktok" placeholder="TikTok" value="<?= set_value('tiktok'); ?>">
                                </div>
                            </div>

                        </div>

                        <!-- Tombol -->
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <input type="button" class="btn btn-secondary" value="Kembali" onclick="window.history.go(-1)">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
