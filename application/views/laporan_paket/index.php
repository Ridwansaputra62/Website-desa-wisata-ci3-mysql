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
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="page-title"><?= $judul ?></h4>
                <p class="text-muted">Berikut adalah laporan data paket wisata</p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card shadow border-0">
            <div class="card-body">
                <div class="text-center mb-4">
                    <a href="<?= base_url('laporan_paket/print'); ?>" target="_blank" class="btn btn-outline-info mx-1">
                        <i class="mdi mdi-printer"></i> Print
                    </a>
                    <a href="<?= base_url('laporan_paket/cetak_pdf'); ?>" class="btn btn-outline-danger mx-1" target="_blank">
                        <i class="mdi mdi-file-pdf"></i> PDF
                    </a>
                    <a href="<?= base_url('laporan_paket/export_excel'); ?>" class="btn btn-outline-success mx-1">
                        <i class="mdi mdi-file-excel"></i> Excel
                    </a>
                    <a href="<?= base_url('laporan_paket/export_csv'); ?>" class="btn btn-outline-warning mx-1">
                        <i class="mdi mdi-file-delimited"></i> CSV
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Paket</th>
                                <th>Fasilitas</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($paket as $p): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p['nama_paket']; ?></td>
                                <td><?= $p['nama_fasilitas']; ?></td>


                                <td>Rp<?= number_format($p['harga'], 0, ',', '.'); ?></td>
                                <td><?= $p['keterangan']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right font-weight-bold">Total Paket Wisata</td>
                                <td><strong><?= count($paket); ?> Data</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
