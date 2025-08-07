<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Kategori Wisata</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Konten -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="card-body">
            <p>
                <a href="<?= base_url('kategori/tambah'); ?>">
                    <button type="button" class="btn btn-success">
                        <i class="mdi mdi-plus"></i> Tambah Kategori
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
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($kategori as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nama_kategori; ?></td>
                            <td><?= $row->deskripsi; ?></td>
                            <td>
                                <a href="<?= base_url('admin/kategori/edit/'.$row->id_kategori); ?>" class="btn btn-warning btn-sm">
                                    <i class="mdi mdi-lead-pencil"></i> Edit
                                </a>
                                <a href="<?= base_url('admin/kategori/hapus/'.$row->id_kategori); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                    <i class="mdi mdi-delete"></i> Hapus
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
