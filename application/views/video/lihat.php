<style>
.video-card {
    border-radius: 10px;
    overflow: hidden;
    transition: transform 0.2s ease-in-out;
    position: relative;
}

.video-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

.video-frame {
    border-radius: 0;
    height: 220px;
    width: 100%;
    border: none;
}

.video-keterangan {
    font-size: 18px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 12px;
    line-height: 1.4;
}

.video-actions {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
}

.video-actions a {
    font-size: 20px;
    font-weight: bold;
    color: #6c757d; /* abu-abu */
    transition: color 0.2s ease;
}

.video-actions a:hover {
    color: #343a40; /* abu tua saat hover */
}
</style>

<div class="page-wrapper">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h4 class="page-title mb-0">Video: <?= $jenis['nama_wisata']; ?></h4>
                <a href="<?= base_url('video/tambah/' . $jenis['id_jenis']); ?>" class="btn btn-success">
                    <i class="mdi mdi-plus"></i> Tambah Video
                </a>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="container-fluid mt-4">
        <div class="row">
            <?php if (empty($video)): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">Belum ada video untuk jenis wisata ini.</div>
                </div>
            <?php else: ?>
                <?php foreach ($video as $v): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card video-card shadow-sm">
                            <iframe class="video-frame" src="<?= $v['link_video']; ?>" allowfullscreen></iframe>
                            <div class="card-body">
                                <div class="video-keterangan"><?= $v['keterangan']; ?></div>
                                <div class="video-actions">
                                    <a href="<?= base_url('video/edit/' . $v['id']); ?>" title="Edit Video">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('video/hapus/' . $v['id']); ?>" title="Hapus Video" class="btn-hapus-video">
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
<script>
$(document).ready(function () {
    // Hapus video
    $('.btn-hapus-video').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if (confirm("Yakin ingin menghapus video ini?")) {
            window.location.href = url;
        }
    });
});
</script>
