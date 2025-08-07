<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Paket</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 11px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
        }

        th, td {
            border: 1px solid #444;
            padding: 6px 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<h2>Laporan Data Paket Wisata</h2>
<div class="subtitle">Desa Wisata - <?= date('d M Y'); ?></div>

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
            <td colspan="4" align="right">Total Paket Wisata</td>
            <td><?= count($paket); ?> Data</td>
        </tr>
    </tfoot>
</table>

</body>
</html>
