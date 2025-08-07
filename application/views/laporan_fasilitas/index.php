<style>
    .page-title {
        font-weight: 600;
        font-size: 1.75rem;
        margin-bottom: .25rem;
    }
    .btn-outline-info, .btn-outline-danger, .btn-outline-success, .btn-outline-warning {
        min-width: 120px;
    }
</style>

<div class="page-wrapper">
    <!-- Breadcrumb -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="page-title"><?= $judul ?></h4>
                <p class="text-muted">Berikut adalah daftar data fasilitas yang tersedia</p>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="container-fluid">
        <div class="card shadow border-0">
            <div class="card-body">
                <!-- Tombol Export -->
                <div class="text-center mb-4">
                    <a href="<?= base_url('laporan_fasilitas/print'); ?>" target="_blank" class="btn btn-outline-info mx-1">
                        <i class="mdi mdi-printer"></i> Print
                    </a>
                    <a href="<?= base_url('laporan_fasilitas/cetak_pdf'); ?>" class="btn btn-outline-danger mx-1" target="_blank">
                        <i class="mdi mdi-file-pdf"></i> PDF
                    </a>
                    <a href="<?= base_url('laporan_fasilitas/export_excel'); ?>" class="btn btn-outline-success mx-1">
                        <i class="mdi mdi-file-excel"></i> Excel
                    </a>
                    <a href="<?= base_url('laporan_fasilitas/export_csv'); ?>" class="btn btn-outline-warning mx-1">
                        <i class="mdi mdi-file-delimited"></i> CSV
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Fasilitas</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($fasilitas as $f): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $f['nama_fasilitas']; ?></td>
                                <td>Rp<?= number_format($f['harga_fasilitas'], 0, ',', '.'); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-right font-weight-bold">Total Fasilitas</th>
                                <th><strong><?= $total; ?> Data</strong></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
