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
                    <nav aria-label="breadcrumb">
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="<?= base_url('jenis_wisata/tambah'); ?>">
                    <button type="button" class="btn btn-success">
                        <i class="mdi mdi-plus"></i> Tambah Jenis Wisata
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
                            <th>Nama Wisata</th>
                            <th>Deskripsi</th>
                            <th>Harga Tiket</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($jenis as $j): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $j['nama_wisata'] ?></td>
                            <td><?= $j['deskripsi'] ?></td>
                            <td>Rp<?= number_format($j['harga_tiket'], 0, ',', '.') ?></td>
                            <td><img src="<?= base_url('assets/img/jenis/') . $j['gambar'] ?>" width="80"></td>
                            <td>
                                <a href="<?= base_url('jenis_wisata/edit/') . $j['id_jenis'] ?>" class="btn btn-primary btn-sm">
                                    <i class="mdi mdi-lead-pencil"></i> Ubah
                                </a>
                                <a href="<?= base_url('jenis_wisata/hapus/') . $j['id_jenis'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jenis wisata <?= $j['nama_wisata']; ?>?')">
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
