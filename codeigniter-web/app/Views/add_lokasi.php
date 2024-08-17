<h1>Add New Lokasi</h1>
<form method="post" action="<?= base_url('LokasiController/saveLokasi') ?>">
    <input type="text" name="namaLokasi" placeholder="Nama Lokasi">
    <input type="text" name="negara" placeholder="Negara">
    <input type="text" name="provinsi" placeholder="Provinsi">
    <input type="text" name="kota" placeholder="Kota">
    <button type="submit">Save</button>
</form>
