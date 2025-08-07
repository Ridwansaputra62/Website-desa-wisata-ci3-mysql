<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Ubah Artikel</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <form action="<?= base_url('artikel/update'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" name="id" value="<?= $artikel['id_artikel']; ?>">
                <div class="card-body">

                    <!-- Judul -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" name="judul" class="form-control" value="<?= $artikel['judul']; ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Link -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="url" name="link" class="form-control" value="<?= $artikel['link']; ?>">
                            <?= form_error('link', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal" class="form-control" value="<?= $artikel['tanggal']; ?>">
                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                        <div class="col-sm-9">
                            <?php if (!empty($artikel['gambar'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('assets/fe/img/blog/' . $artikel['gambar']); ?>" width="100">
                                </div>
                            <?php endif; ?>
                            <input type="file" name="gambar" class="form-control">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                        </div>
                    </div>

                </div>

                <div class="border-top">
                    <div class="card-body text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?= base_url('artikel'); ?>" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
