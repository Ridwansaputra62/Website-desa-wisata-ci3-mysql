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
                <h4 class="page-title"><?= $judul; ?> - <?= $jenis['nama_wisata']; ?></h4>
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
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->session->flashdata('pesan'); ?>

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Galeri</h4>

                            <input type="hidden" name="id_jenis" value="<?= $jenis['id_jenis']; ?>">
                            <input type="hidden" name="nama_wisata" value="<?= $jenis['nama_wisata']; ?>">

                            <!-- Keterangan -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea name="keterangan" class="form-control" placeholder="Keterangan gambar..." rows="4"><?= set_value('keterangan'); ?></textarea>
                                </div>
                            </div>

                            <!-- Gambar -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Upload Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar[]" multiple class="form-control-file">
                                    <small class="text-muted">Bisa memilih lebih dari satu gambar (jpg, jpeg, png, webp)</small>
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary"><i class="mdi mdi-content-save"></i> Simpan</button>
                                <a href="<?= base_url('gallery/lihat/' . $jenis['id_jenis']); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
