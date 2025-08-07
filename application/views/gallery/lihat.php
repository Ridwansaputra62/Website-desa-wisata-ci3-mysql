<style>
.gallery-card {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    transition: transform 0.2s ease-in-out;
}
.gallery-card:hover {
    transform: scale(1.02);
}
.gallery-img {
    object-fit: cover;
    height: 200px;
    width: 100%;
    cursor: pointer;
}
.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    background: rgba(0,0,0,0.5);
    color: #fff;
    opacity: 0;
    padding: 15px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    transition: opacity 0.3s ease-in-out;
}
.gallery-card:hover .gallery-overlay {
    opacity: 1;
}
.gallery-keterangan {
    font-size: 14px;
    margin-bottom: 10px;
}
.gallery-icons {
    position: absolute;
    top: 10px;
    right: 10px;
}
.gallery-icons a {
    color: #fff;
    margin-left: 8px;
    font-size: 18px;
    transition: color 0.2s;
}
.gallery-icons a:hover {
    color: #ffc107;
}
</style>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0">Galeri: <?= $jenis['nama_wisata'] ?></h4>
                <a href="<?= base_url('gallery/tambah/' . $jenis['id_jenis']); ?>" class="btn btn-success">
                    <i class="mdi mdi-plus"></i> Tambah Galeri
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row">
            <?php if (empty($gallery)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">Belum ada gambar galeri untuk jenis wisata ini.</div>
                </div>
            <?php else: ?>
                <?php foreach ($gallery as $g): ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="gallery-card shadow-sm">
                        <img src="<?= base_url('assets/img/gallery/') . $g['gambar']; ?>" class="gallery-img" alt="Gambar Galeri">
                        <div class="gallery-overlay">
                            <div class="gallery-keterangan"><?= $g['keterangan']; ?></div>
                            <div class="gallery-icons">
                                <a href="<?= base_url('gallery/edit/' . $g['id']); ?>" title="Edit">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <a href="<?= base_url('gallery/hapus/' . $g['id']); ?>" title="Hapus" class="btn-hapus">
    <i class="mdi mdi-delete"></i>
</a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal Preview Gambar -->
<div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-body p-0">
        <img src="" id="previewImage" class="w-100" style="object-fit: contain;">
      </div>
    </div>
  </div>
</div>

<!-- Script Modal Preview (Bootstrap 4 Compatible) -->
<script>
$(document).ready(function () {
    $('.gallery-img').on('click', function () {
        var src = $(this).attr('src');
        $('#previewImage').attr('src', src);
        $('#previewModal').modal('show');
    });
});
</script>
<script>
$(document).ready(function () {
    // Preview gambar
    $('.gallery-img').on('click', function () {
        var src = $(this).attr('src');
        $('#previewImage').attr('src', src);
        $('#previewModal').modal('show');
    });

    // Hindari buka modal saat klik ikon
    $('.gallery-icons a').on('click', function (e) {
        e.stopPropagation();
    });

    // Konfirmasi Hapus
    $('.btn-hapus').on('click', function (e) {
        e.preventDefault(); // cegah default link
        var url = $(this).attr('href');
        var yakin = confirm("Yakin ingin menghapus gambar ini?");
        if (yakin) {
            window.location.href = url;
        }
    });
});
</script>
