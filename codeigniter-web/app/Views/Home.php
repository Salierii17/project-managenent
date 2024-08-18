<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        .button {
            padding: 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            margin-right: 5px;
        }

        .button-blue {
            background-color: #007BFF;
            color: white;
        }

        .button-blue:hover {
            background-color: #0056b3;
        }

        .button-red {
            background-color: #dc3545;
            color: white;
        }

        .button-red:hover {
            background-color: #c82333;
        }

        .container {
            display: flex;
            gap: 20px;
        }

        .hidden {
            display: none;
        }

        .table-container {
            flex: 1;
        }
    </style>
    </style>
    <title>List of Lokasi and Proyek</title>
</head>

<body>
    <h1 class="button">Daftar Proyek and Lokasi </h1>

    <div>
        <button class="button button-blue" onclick="showTable('proyek')">Show Proyek</button>
        <button class="button button-red" onclick="showTable('lokasi')">Show Lokasi</button>
    </div>
    <div class="container">
        <div id="lokasi-table-container" class="table-container hidden">
            <h2>Lokasi</h2>
            <a class="button" href="<?= site_url('home/addLokasi') ?>">Add Location</a><br><br>
            <table border="1" id="lokasi-table">
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
        </div>

        <div id="proyek-table-container" class="table-container hidden">
            <h2>Proyek</h2>
            <a class="button" href="<?= site_url('home/addProyek') ?>">Add Project </a><br><br>

            <table border="1" id="proyek-table">
                <tr>
                    <th>ID</th>
                    <th>Nama Proyek</th>
                    <th>Client</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pimpinan Proyek</th>
                    <th>Keterangan</th>
                    <th>Actions</th>

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
                        <td>
                            <a href="<?= site_url('home/editProyek/' . $proyek['id']) ?>">Edit</a> |
                            <a href="<?= site_url('home/deleteProyek/' . $proyek['id']) ?>" onclick="return confirm('Are you sure you want to delete this location?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <script>
                function showTable(type) {
                    const proyekContainer = document.getElementById('proyek-table-container');
                    const lokasiContainer = document.getElementById('lokasi-table-container');

                    if (type === 'proyek') {
                        proyekContainer.classList.remove('hidden');
                        lokasiContainer.classList.add('hidden');
                    } else if (type === 'lokasi') {
                        proyekContainer.classList.add('hidden');
                        lokasiContainer.classList.remove('hidden');
                    }
                }

                // Call the function with 'proyek' to show the default table
                document.addEventListener('DOMContentLoaded', function() {
                    showTable('proyek');
                });
            </script>

</body>

</html>