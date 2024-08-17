<h1>List of Lokasi</h1>
<a href="<?= base_url('LokasiController/addLokasi') ?>">Add Lokasi</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nama Lokasi</th>
        <th>Negara</th>
        <th>Provinsi</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($lokasi_list as $lokasi): ?>
    <tr>
        <td><?= $lokasi['id'] ?></td>
        <td><?= $lokasi['namaLokasi'] ?></td>
        <td><?= $lokasi['negara'] ?></td>
        <td><?= $lokasi['provinsi'] ?></td>
        <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>
