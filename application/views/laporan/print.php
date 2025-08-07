<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $judul; ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 13px;
        }

        th, td {
            border: 1px solid #444;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tfoot td {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .noprint {
            margin-top: 25px;
            text-align: center;
        }

        @media print {
            .noprint {
                display: none;
            }
        }
    </style>
</head>
<body>

    <h2><?= $judul; ?></h2>
    <div class="subtitle">Desa Wisata - <?= date('d M Y'); ?></div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wisata</th>
                <th>Deskripsi</th>
                <th>Harga Tiket</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($jenis as $j): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $j['nama_wisata']; ?></td>
                <td><?= $j['deskripsi']; ?></td>
                <td>Rp<?= number_format($j['harga_tiket'], 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="right">Total Wisata</td>
                <td><?= count($jenis); ?> Data</td>
            </tr>
        </tfoot>
    </table>

    <div class="noprint">
        <button onclick="window.print()" style="padding: 8px 18px; font-size: 14px;">🖨️ Cetak Sekarang</button>
    </div>

</body>
</html>
