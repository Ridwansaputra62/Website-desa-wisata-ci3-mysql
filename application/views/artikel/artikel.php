<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Data Artikel Eksternal</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p>
                <a href="<?= base_url('artikel/tambah'); ?>">
                    <button type="button" class="btn btn-success">
                        <i class="mdi mdi-plus-circle"></i> Tambah Artikel
                    </button>
                </a>
            </p>

            <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul Artikel</th>
                            <th>Link Artikel</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach ($artikel as $a): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td>
                                <?php if (!empty($a['gambar'])): ?>
                                    <img src="<?= base_url('assets/fe/img/blog/' . $a['gambar']); ?>" width="80">

                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $a['judul']; ?></td>
                            <td><a href="<?= $a['link']; ?>" target="_blank"><?= $a['link']; ?></a></td>
                            <td><?= date('d M Y', strtotime($a['tanggal'])); ?></td>
                            <td>
                                <a href="<?= base_url('artikel/edit/') . $a['id_artikel']; ?>" class="btn btn-primary btn-sm mb-2">
                                    <i class="mdi mdi-pencil"></i> Ubah
                                </a>
                                <a href="<?= base_url('artikel/hapus/') . $a['id_artikel']; ?>" class="btn btn-danger btn-sm btn-hapus-artikel">
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
<script>
$(document).ready(function () {
    // Event konfirmasi hapus artikel
    $('.btn-hapus-artikel').on('click', function (e) {
        e.preventDefault(); // cegah redirect langsung
        var url = $(this).attr('href');
        if (confirm("Yakin ingin menghapus artikel ini?")) {
            window.location.href = url;
        }
    });
});
</script>
