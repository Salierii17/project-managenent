<!DOCTYPE html>
<html>
<head>
    <title>Proyek List</title>
</head>
<body>
    <h1>Proyek List</h1>
    <div id="proyek-list"></div>
    <script>
        fetch('http://localhost:8080/proyek')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('proyek-list');
                data.forEach(proyek => {
                    const item = document.createElement('div');
                    item.textContent = `${proyek.nama} - ${proyek.deskripsi}`;
                    list.appendChild(item);
                });
            });
    </script>
</body>
</html>
