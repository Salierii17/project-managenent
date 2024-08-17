<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Lokasi</title>
</head>
<body>
    <h1>Add New Lokasi</h1>
    
    <form action="<?= site_url('home/addLokasi') ?>" method="post">
        <label for="nama_lokasi">Nama Lokasi:</label><br>
        <input type="text" id="nama_lokasi" name="nama_lokasi" required><br>

        <label for="negara">Negara:</label><br>
        <input type="text" id="negara" name="negara" required><br>

        <label for="provinsi">Provinsi:</label><br>
        <input type="text" id="provinsi" name="provinsi" required><br>

        <label for="kota">Kota:</label><br>
        <input type="text" id="kota" name="kota" required><br>

        <input type="submit" value="Add Lokasi">
    </form>

    <a href="<?= site_url('/') ?>">Back to Home</a>
</body>
</html>
