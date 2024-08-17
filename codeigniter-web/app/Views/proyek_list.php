<h1>List of Proyek</h1>
<a href="<?= base_url('ProyekController/addProyek') ?>">Add Proyek</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nama Proyek</th>
        <th>Client</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($proyek_list as $proyek): ?>
    <tr>
        <td><?= $proyek['id'] ?></td>
        <td><?= $proyek['namaProyek'] ?></td>
        <td><?= $proyek['client'] ?></td>
        <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>
