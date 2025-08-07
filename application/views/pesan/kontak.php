<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Kontak</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><a href="<?= base_url('kontak/add'); ?>">
                <button type="button" class="btn btn-success"><i class="mdi mdi-account-plus"></i> Tambah </button>
            </a></p>

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Instagram</th>
                            <th>TikTok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($kontak as $k) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['email']; ?></td>
                            <td><?= $k['telepon']; ?></td>
                            <td><?= $k['instagram']; ?></td>
                            <td><?= $k['tiktok']; ?></td>
                            <td>
                                <a href="<?= base_url('kontak/ubahKontak/' . $k['id']); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-lead-pencil"></i> Ubah
                                </a>
                                <a href="<?= base_url('kontak/hapusKontak/' . $k['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data <?= $k['email']; ?> ?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
