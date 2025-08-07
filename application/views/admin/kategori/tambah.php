<h3>Tambah Kategori Wisata</h3>
<form method="post" action="<?= base_url('admin/kategori/simpan'); ?>">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-secondary">Kembali</a>
</form>
