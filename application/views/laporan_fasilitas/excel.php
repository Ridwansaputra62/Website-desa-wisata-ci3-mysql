<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Fasilitas</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($fasilitas as $f): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $f['nama_fasilitas']; ?></td>
            <td><?= $f['harga_fasilitas']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
