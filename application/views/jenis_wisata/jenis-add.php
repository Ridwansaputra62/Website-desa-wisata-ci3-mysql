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
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="col-md-9">
                <div class="card">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Informasi Jenis Wisata</h4>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Wisata</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_wisata" class="form-control" value="<?= set_value('nama_wisata') ?>" placeholder="Masukkan nama wisata">
                                    <?= form_error('nama_wisata', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea name="deskripsi" class="form-control" placeholder="Tulis deskripsi singkat wisata"><?= set_value('deskripsi') ?></textarea>
                                    <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Harga Tiket</label>
                                <div class="col-sm-9">
                                    <input type="number" name="harga_tiket" class="form-control" value="<?= set_value('harga_tiket') ?>" placeholder="Contoh: 10000">
                                    <?= form_error('harga_tiket', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Upload Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar" class="form-control-file">
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Simpan</button>
                                <a href="<?= base_url('jenis_wisata'); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
