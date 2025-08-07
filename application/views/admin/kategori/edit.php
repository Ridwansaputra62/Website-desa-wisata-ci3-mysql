<h3>Edit Kategori Wisata</h3>
<form method="post" action="<?= base_url('admin/kategori/update/'.$kategori->id_kategori); ?>">
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori->nama_kategori; ?>" required>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"><?= $kategori->deskripsi; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('admin/kategori'); ?>" class="btn btn-secondary">Kembali</a>
</form>
