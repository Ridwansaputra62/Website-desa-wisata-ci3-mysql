<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Paket</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="<?= base_url('paket/add_paket'); ?>">
                    <button type="button" class="btn btn-success">
                        <i class="mdi mdi-account-plus"></i> Tambah
                    </button>
                </a>
            </p>

            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Fasilitas</th> <!-- Kolom baru -->
                            <th>Keterangan Paket</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($paket as $p): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['nama_paket']; ?></td>
                            <td>Rp<?= number_format($p['harga'], 0, ',', '.') ?></td>
                            <td><?= $p['fasilitas']; ?></td>

                            <td><?= $p['keterangan']; ?></td>
                            <td>
                                <img src="<?= base_url('assets/images/paket/') . $p['gambar']; ?>" class="img-thumbnail img-fluid" style="max-width: 100px;" alt="Gambar Paket">
                            </td>
                            <td>
                                <a href="<?= base_url('paket/ubahPaket/') . $p['id']; ?>" class="btn btn-primary btn-sm mb-2">
                                    <i class="mdi mdi-lead-pencil"></i> Ubah
                                </a>
                                <a class="btn btn-danger btn-sm" href="<?= base_url('paket/hapusPaket/') . $p['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus paket <?= $p['nama_paket']; ?> ?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
