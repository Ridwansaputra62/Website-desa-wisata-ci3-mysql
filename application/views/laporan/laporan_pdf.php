<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Wisata</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            font-size: 10px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 15px;
        }

        table, th, td {
            border: 1px solid #444;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
            text-align: center;
        }

        th, td {
            padding: 6px 8px;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Laporan Data Wisata</h2>
    <div class="subtitle">Desa Wisata - <?= date('d M Y'); ?></div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Wisata</th>
                <th width="45%">Deskripsi</th>
                <th width="25%">Harga Tiket</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($jenis as $j): ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $j['nama_wisata']; ?></td>
                <td><?= $j['deskripsi']; ?></td>
                <td>Rp<?= number_format($j['harga_tiket'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="right">Total Wisata</td>
                <td> <?= count($jenis); ?> Data</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
