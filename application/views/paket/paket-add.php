<!-- Page wrapper -->
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title"><?= $judul; ?></h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger"><?= validation_errors(); ?></div>
                    <?php endif; ?>
                    <form class="form-horizontal" action="<?= base_url('paket/simpan'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Informasi Paket</h4>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Paket</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_paket" class="form-control" placeholder="Nama Paket" value="<?= set_value('nama_paket'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Harga Paket</label>
                                <div class="col-sm-9">
                                    <input type="number" name="harga" class="form-control" placeholder="Harga Paket" value="<?= set_value('harga'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Fasilitas Wisata</label>
                                <div class="col-sm-9">
                                <select name="id_fasilitas[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <?php foreach ($fasilitas as $f): ?>
                                        <option value="<?= $f['id_fasilitas'] ?>"><?= $f['nama_fasilitas'] ?></option>
                                    <?php endforeach; ?>
                                </select>

                                    <?= form_error('id_fasilitas[]', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Keterangan Paket</label>
                                <div class="col-sm-9">
                                    <textarea name="keterangan" class="form-control" placeholder="Keterangan Paket"><?= set_value('keterangan'); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="border-top">
                            <div class="card-body text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('paket'); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Select2 Scripts -->
<link rel="stylesheet" href="<?= base_url('assets/libs/select2/dist/css/select2.min.css'); ?>">
<script src="<?= base_url('assets/libs/select2/dist/js/select2.full.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Pilih fasilitas wisata...",
            allowClear: true
        });
    });
</script>
