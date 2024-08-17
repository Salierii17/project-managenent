<html>

<head>
    <title>Proyek dan Lokasi</title>
</head>

<body>
    <h1>Daftar Proyek</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Proyek</th>
            <th>Client</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Pimpinan Proyek</th>
            <th>Keterangan</th>
        </tr>
        <?php foreach ($proyek_list as $proyek): ?>
            <tr>
                <td><?= $proyek['id'] ?></td>
                <td><?= $proyek['nama_proyek'] ?></td>
                <td><?= $proyek['client'] ?></td>
                <td><?= $proyek['tgl_mulai'] ?></td>
                <td><?= $proyek['tgl_selesai'] ?></td>
                <td><?= $proyek['pimpinan_proyek'] ?></td>
                <td><?= $proyek['keterangan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h1>Daftar Lokasi</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Lokasi</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Kota</th>
        </tr>
        <?php foreach ($lokasi_list as $lokasi): ?>
            <tr>
                <td><?= $lokasi['id'] ?></td>
                <td><?= $lokasi['nama_lokasi'] ?></td>
                <td><?= $lokasi['negara'] ?></td>
                <td><?= $lokasi['provinsi'] ?></td>
                <td><?= $lokasi['kota'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>