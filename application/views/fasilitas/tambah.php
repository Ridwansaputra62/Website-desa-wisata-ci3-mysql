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
    <!-- Container fluid -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="col-md-9">
                <div class="card">
                    <form class="form-horizontal" action="" method="post">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Fasilitas Wisata</h4>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Fasilitas</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_fasilitas" class="form-control" placeholder="Contoh: Toilet Umum" value="<?= set_value('nama_fasilitas'); ?>">
                                    <?= form_error('nama_fasilitas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Harga Fasilitas</label>
                                <div class="col-sm-9">
                                    <input type="number" name="harga_fasilitas" class="form-control" placeholder="Contoh: 5000" value="<?= set_value('harga_fasilitas'); ?>">
                                    <?= form_error('harga_fasilitas', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="mdi mdi-content-save"></i> Simpan
                                </button>
                                <a href="<?= base_url('fasilitas'); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
