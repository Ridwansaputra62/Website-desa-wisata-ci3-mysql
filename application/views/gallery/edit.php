<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center justify-content-between">
                <h4 class="page-title"><?= $judul; ?></h4>
                <a href="<?= base_url('gallery/lihat/' . $galeri['id_jenis']); ?>" class="btn btn-secondary">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="container-fluid">
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>
        <?= $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-md-9">
                <div class="card shadow-sm">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Edit Galeri</h4>

                            <input type="hidden" name="id" value="<?= $galeri['id']; ?>">

                            <!-- Keterangan -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea name="keterangan" class="form-control" rows="4"><?= $galeri['keterangan']; ?></textarea>
                                </div>
                            </div>

                            <!-- Gambar saat ini -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Gambar Saat Ini</label>
                                <div class="col-sm-9">
                                    <img src="<?= base_url('assets/img/gallery/') . $galeri['gambar']; ?>" width="150" class="img-thumbnail mb-2">
                                </div>
                            </div>

                            <!-- Upload Baru -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Ganti Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar" class="form-control-file">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                                </div>
                            </div>

                        </div>
                        <div class="border-top">
                            <div class="card-body text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save"></i> Update
                                </button>
                                <a href="<?= base_url('gallery/lihat/' . $galeri['id_jenis']); ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
