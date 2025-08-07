<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Update Kontak</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
                    <?php } ?>
                    <?= $this->session->flashdata('pesan'); ?>

                    <?php foreach ($kontak as $k) { ?>
                    <form class="form-horizontal" action="<?= base_url('kontak/ubahKontak'); ?>" method="post">
                        <div class="card-body">
                            <h4 class="card-title">Kontak Info</h4>

                            <input type="hidden" name="id" value="<?= $k['id']; ?>">

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="alamat" placeholder="Edit Alamat"><?= $k['alamat']; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $k['email']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">No. Telepon</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="telepon" placeholder="No. Telepon" value="<?= $k['telepon']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="instagram" placeholder="Instagram" value="<?= $k['instagram']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">TikTok</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tiktok" placeholder="TikTok" value="<?= $k['tiktok']; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <input type="button" class="btn btn-secondary" value="Kembali" onclick="window.history.go(-1)">
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
