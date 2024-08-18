<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
            margin-right: 20px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="card">
        <h1>Edit Lokasi</h1>

        <form id="lokasi-form" action="<?= site_url('home/editLokasi/' . $lokasi['id']) ?>" method="post">
            <label for="nama_lokasi">Nama Lokasi:</label>
            <input type="text" id="nama_lokasi" name="nama_lokasi" value="<?= $lokasi['nama_lokasi'] ?>" required>

            <label for="negara">Negara:</label>
            <input type="text" id="negara" name="negara" value="<?= $lokasi['negara'] ?>" required>

            <label for="provinsi">Provinsi:</label>
            <input type="text" id="provinsi" name="provinsi" value="<?= $lokasi['provinsi'] ?>" required>

            <label for="kota">Kota:</label>
            <input type="text" id="kota" name="kota" value="<?= $lokasi['kota'] ?>" required>

            <input type="submit" value="Update Lokasi">
        </form>

        <a href="<?= site_url('/') ?>" class="back-link">Back to Home</a>
    </div>
    <script>
        document.getElementById('lokasi-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const id = '<?= $lokasi['id'] ?>';
            const data = {
                nama_lokasi: document.getElementById('nama_lokasi').value,
                negara: document.getElementById('negara').value,
                provinsi: document.getElementById('provinsi').value,
                kota: document.getElementById('kota').value
            };

            console.log('Updating Lokasi with ID:', id);
            console.log('Form Data:', data);

            fetch(`http://localhost:8082/lokasi/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    console.log('Response:', result);
                    if (result.success) {
                        alert('Failed to update lokasi');
                    } else {
                        alert('Lokasi Updated');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        });
    </script>
</body>

</html>