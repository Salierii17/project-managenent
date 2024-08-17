<h1>Add New Proyek</h1>
<form method="post" action="<?= base_url('ProyekController/saveProyek') ?>">
    <input type="text" name="namaProyek" placeholder="Nama Proyek">
    <input type="text" name="client" placeholder="Client">
    <input type="text" name="pimpinanProyek" placeholder="Pimpinan Proyek">
    <textarea name="keterangan" placeholder="Keterangan"></textarea>
    <button type="submit">Save</button>
</form>
