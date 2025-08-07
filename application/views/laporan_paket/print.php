<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $judul; ?></title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background-color: #eee;
        }

        @media print {
            .noprint {
                display: none;
            }
        }
    </style>
</head>
<body>
    <h2 style="text-align:center"><?= $judul; ?></h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Fasilitas</th>
                <th>Harga</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($paket as $p): ?>
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
                <td colspan="4" align="right"><strong>Total Paket Wisata</strong></td>
                <td><strong><?= count($paket); ?> Data</strong></td>
            </tr>
        </tfoot>
    </table>

    <div class="noprint" style="text-align:center; margin-top:20px;">
        <button onclick="window.print()">🖨️ Cetak Sekarang</button>
    </div>
</body>
</html>
