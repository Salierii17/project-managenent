<!DOCTYPE html>
<html>

<head>
    <title>Main Page</title>
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
</head>

<body>
    <h1>Proyek and Lokasi List</h1>

    <div>
        <button class="button button-blue" onclick="showTable('proyek')">Show Proyek</button>
        <button class="button button-red" onclick="showTable('lokasi')">Show Lokasi</button>
    </div>

    <div class="container">
        <div id="proyek-table-container" class="table-container hidden">
            <h2>Proyek</h2>
            <table id="proyek-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Nama Proyek</th>
                        <th>Pimpinan Proyek</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="proyek-list"></tbody>
            </table>
        </div>

        <div id="lokasi-table-container" class="table-container hidden">
            <h2>Lokasi</h2>
            <table id="lokasi-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kota</th>
                        <th>Nama Lokasi</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="lokasi-list"></tbody>
            </table>
        </div>
    </div>

    <script>
        function createTableRow(data, type) {
            return data.map(item => `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.client || item.kota || ''}</td>
                    <td>${item.nama_proyek || item.nama_lokasi || ''}</td>
                    <td>${item.pimpinan_proyek || item.negara || ''}</td>
                    <td>${item.tgl_mulai || item.provinsi || ''}</td>
                    <td>${item.tgl_selesai || ''}</td>
                    <td>
                        <a href="/edit/${item.id}?type=${type}" class="button button-blue">Edit</a>
                        <button class="button button-red" onclick="deleteItem(${item.id}, '${type}')">Delete</button>
                    </td>
                </tr>
            `).join('');
        }

        function loadData(url, type) {
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Data loaded:', data); // Debugging line
                    const tableId = type === 'proyek' ? 'proyek-list' : 'lokasi-list';
                    document.getElementById(tableId).innerHTML = createTableRow(data, type);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

        function deleteItem(id, type) {
            if (confirm('Are you sure you want to delete this item?')) {
                fetch(`/${type}/${id}`, {
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (response.ok) {
                            loadData('/proyek', 'proyek');
                            loadData('/lokasi', 'lokasi');
                            alert('Item deleted successfully');
                        } else {
                            alert('Failed to delete item');
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting item:', error);
                    });
            }
        }

        function showTable(type) {
            const proyekContainer = document.getElementById('proyek-table-container');
            const lokasiContainer = document.getElementById('lokasi-table-container');

            if (type === 'proyek') {
                proyekContainer.classList.remove('hidden');
                lokasiContainer.classList.add('hidden');
                loadData('/proyek', 'proyek');
            } else if (type === 'lokasi') {
                proyekContainer.classList.add('hidden');
                lokasiContainer.classList.remove('hidden');
                loadData('/lokasi', 'lokasi');
            }
        }

        // Load the Proyek table initially
        showTable('proyek'); 
    </script>
</body>

</html>
