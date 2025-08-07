<div class="page-wrapper">
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <h4 class="page-title">Ubah Background User</h4>
    </div>

    <div class="container-fluid">
        <div class="card">
            <form action="<?= base_url('background/update'); ?>" method="post" enctype="multipart/form-data">
    <?php if (!empty($background)): ?>
        <input type="hidden" name="id" value="<?= $background['id']; ?>">
    <?php endif; ?>
    
    <div class="card-body">
        <div class="form-group">
            <label>Background Saat Ini:</label><br>
            <?php if (!empty($background) && $background['gambar']): ?>
                <img src="<?= base_url('assets/images/background/' . $background['gambar']); ?>" width="300" class="img-thumbnail">
            <?php else: ?>
                <p class="text-muted">Belum ada gambar background.</p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Upload Gambar Baru</label>
            <input type="file" name="gambar" class="form-control">
            <small class="text-muted">Format: jpg, png, webp. Max 50MB</small>
        </div>
    </div>

    <div class="card-footer text-right">
        <button class="btn btn-primary" type="submit">Update Background</button>
    </div>
</form>

        </div>
    </div>
</div>
