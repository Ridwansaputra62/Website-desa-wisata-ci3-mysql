<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Ubah Paket</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb"></nav>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">

                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger"><?= validation_errors(); ?></div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('pesan'); ?>

                    <?php foreach ($paket as $p): ?>
                    <form class="form-horizontal" action="<?= base_url('paket/ubahPaket'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <h4 class="card-title">Ubah Paket Info</h4>

                            <input type="hidden" name="id" value="<?= $p['id']; ?>">
                            <input type="hidden" name="old_pict" value="<?= $p['gambar']; ?>">

                            <!-- Nama Paket -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Nama Paket</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama_paket" value="<?= $p['nama_paket']; ?>" placeholder="Masukkan nama paket">
                                </div>
                            </div>
                            <!-- Harga -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="harga" value="<?= $p['harga']; ?>" placeholder="Contoh: 50000">
                                </div>
                            </div>
                            <!-- Fasilitas -->
<!-- Fasilitas -->
<div class="form-group row">
    <label class="col-sm-3 text-right control-label col-form-label">Fasilitas Wisata</label>
    <div class="col-sm-9">
        <select name="id_fasilitas[]" class="form-control select2" multiple="multiple" style="width: 100%;">
            <?php 
                $selected_ids = explode(',', $p['id_fasilitas']); 
                foreach ($fasilitas as $f): 
            ?>
                <option value="<?= $f['id_fasilitas'] ?>" <?= in_array($f['id_fasilitas'], $selected_ids) ? 'selected' : ''; ?>>
                    <?= $f['nama_fasilitas'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?= form_error('id_fasilitas[]', '<small class="text-danger">', '</small>'); ?>
    </div>
</div>
>

                            <!-- Keterangan -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Keterangan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="keterangan" rows="5" placeholder="Keterangan Paket"><?= $p['keterangan']; ?></textarea>
                                </div>
                            </div>

                            

                            <!-- Gambar -->
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label">Gambar</label>
                                <div class="col-sm-9">
                                    <?php if ($p['gambar']): ?>
                                        <img src="<?= base_url('assets/images/paket/') . $p['gambar']; ?>" class="rounded mb-3" style="max-width: 120px;">
                                    <?php endif; ?>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" class="btn btn-primary" value="Update">
                                <a href="<?= base_url('paket'); ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
