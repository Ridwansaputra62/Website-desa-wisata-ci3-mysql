<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Fasilitas</title>
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
    </style>
</head>
<body>
    <h2>Laporan Data Fasilitas</h2>
    <div class="subtitle">Desa Wisata - <?= date('d M Y'); ?></div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="55%">Nama Fasilitas</th>
                <th width="40%">Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($fasilitas as $f): ?>
            <tr>
                <td align="center"><?= $no++; ?></td>
                <td><?= $f['nama_fasilitas']; ?></td>
                <td>Rp<?= number_format($f['harga_fasilitas'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" align="right">Total Fasilitas</td>
                <td><?= $total; ?> Data</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
