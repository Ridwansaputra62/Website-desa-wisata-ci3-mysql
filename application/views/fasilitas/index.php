<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
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
    <!-- Content -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <p>
                <a href="<?= base_url('fasilitas/tambah'); ?>">
                    <button type="button" class="btn btn-success">
                        <i class="mdi mdi-plus"></i> Tambah Fasilitas
                    </button>
                </a>
            </p>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Fasilitas</th>
                            <th>Harga Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($fasilitas as $f): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $f['nama_fasilitas']; ?></td>
                            <td>Rp<?= number_format($f['harga_fasilitas'], 0, ',', '.'); ?></td>
                            <td>
                                <a href="<?= base_url('fasilitas/edit/' . $f['id_fasilitas']); ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-lead-pencil"></i> Ubah
                                </a>
                                <a href="<?= base_url('fasilitas/hapus/' . $f['id_fasilitas']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus fasilitas <?= $f['nama_fasilitas']; ?>?')">
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
