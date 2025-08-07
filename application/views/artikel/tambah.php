<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Tambah Artikel</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <form action="<?= base_url('artikel/tambah'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="card-body">

                    <!-- Judul -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Judul</label>
                        <div class="col-sm-9">
                            <input type="text" name="judul" class="form-control" value="<?= set_value('judul'); ?>">
                            <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Link -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Link</label>
                        <div class="col-sm-9">
                            <input type="url" name="url" class="form-control" value="<?= set_value('url'); ?>">
                            <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                        <div class="col-sm-9">
                            <input type="file" name="gambar" class="form-control-file">
                            <small class="text-muted">Format: jpg, jpeg, png, gif, webp. Max 2MB.</small>
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Tanggal</label>
                        <div class="col-sm-9">
                            <input type="date" name="tanggal" class="form-control" value="<?= set_value('tanggal', date('Y-m-d')); ?>">
                            <?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                </div>

                <div class="border-top">
                    <div class="card-body text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= base_url('artikel'); ?>" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
