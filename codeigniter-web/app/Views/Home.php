<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Lokasi and Proyek</title>
</head>

<body>
    <h1>Daftar Lokasi</h1>

    <a href="<?= site_url('home/addLokasi') ?>">Add Location</a><br><br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Lokasi</th>
            <th>Negara</th>
            <th>Provinsi</th>
            <th>Kota</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($lokasi_list as $lokasi): ?>
            <tr>
                <td><?= $lokasi['id'] ?></td>
                <td><?= $lokasi['nama_lokasi'] ?></td>
                <td><?= $lokasi['negara'] ?></td>
                <td><?= $lokasi['provinsi'] ?></td>
                <td><?= $lokasi['kota'] ?></td>
                <td>
                    <a href="<?= site_url('home/editLokasi/' . $lokasi['id']) ?>">Edit</a> |
                    <a href="<?= site_url('home/deleteLokasi/' . $lokasi['id']) ?>" onclick="return confirm('Are you sure you want to delete this location?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h1>Daftar Proyek</h1>

    <a href="<?= site_url('home/addLokasi') ?>">Add </a><br><br>

    <table border="1">
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

</body>

</html>