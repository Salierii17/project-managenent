<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        input[type="date"],
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

        <h1>Add New Proyek</h1>
        <form id="proyek-form" action="<?= site_url('home/addProyek/') ?>" method="post">
            <label for="nama_proyek">Nama Proyek:</label>
            <input type="text" id="nama_proyek" name="nama_proyek" required>

            <label for="client">Client:</label>
            <input type="text" id="client" name="client" required>

            <label for="tgl_mulai">Tanggal Mulai:</label>
            <input type="date" id="tgl_mulai" name="tgl_mulai" required>

            <label for="tgl_selesai">Tanggal Selesai:</label>
            <input type="date" id="tgl_selesai" name="tgl_selesai" required>

            <label for="pimpinan_proyek">Pimpinan Proyek:</label>
            <input type="text" id="pimpinan_proyek" name="pimpinan_proyek" required>

            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan"></textarea>

            <input type="submit" value="Add Proyek">
        </form>
        <a href="<?= site_url('/') ?>">Back to Home</a>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('proyek-form');
            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    const data = {
                        nama_proyek: document.getElementById('nama_proyek').value,
                        client: document.getElementById('client').value,
                        tgl_mulai: document.getElementById('tgl_mulai').value,
                        tgl_selesai: document.getElementById('tgl_selesai').value,
                        pimpinan_proyek: document.getElementById('pimpinan_proyek').value,
                        keterangan: document.getElementById('keterangan').value
                    };

                    console.log('Form Data:', data);

                    fetch('http://localhost:8082/proyek', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify(data)
                        })
                        .then(response => response.json())
                        .then(result => {
                            console.log('Response:', result);
                            if (result.success) { 
                                alert('Failed to add proyek');

                                form.reset(); 
                            } else {
                                alert('Proyek added');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                });
            } else {
                console.error('Form element not found.');
            }
        });
    </script>
</body>

</html>