<div class="page-wrapper">
    <div class="page-breadcrumb">
        <h4 class="page-title">Tambah Video: <?= $jenis['nama_wisata'] ?></h4>
    </div>
    <div class="container-fluid">
        <?= $this->session->flashdata('pesan'); ?>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger"><?= validation_errors(); ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <form class="form-horizontal" method="post">
                        <div class="card-body">
                            <input type="hidden" name="id_jenis" value="<?= $jenis['id_jenis']; ?>">
                            <input type="hidden" name="nama_wisata" value="<?= $jenis['nama_wisata']; ?>">

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Judul Video</label>
                                <div class="col-sm-9">
                                    <textarea name="keterangan" class="form-control" rows="4"><?= set_value('keterangan'); ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Link Video (YouTube Embed)</label>
                                <div class="col-sm-9">
                                    <input type="text" name="link_video" class="form-control" placeholder="https://www.youtube.com/embed/ID">
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= base_url('video/lihat/' . $jenis['id_jenis']); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
