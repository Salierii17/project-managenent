<!DOCTYPE html>
<html>
<head>
    <title>Proyek Form</title>
</head>
<body>
    <h1>Create/Update Proyek</h1>
    <form id="proyek-form">
        <input type="text" name="nama" placeholder="Nama Proyek" required>
        <textarea name="deskripsi" placeholder="Deskripsi Proyek" required></textarea>
        <button type="submit">Submit</button>
    </form>
    <script>
        document.getElementById('proyek-form').addEventListener('submit', function(event) {
            event.preventDefault();
            const data = new FormData(this);
            fetch('http://localhost:8080/proyek', {
                method: 'POST',
                body: JSON.stringify(Object.fromEntries(data)),
                headers: { 'Content-Type': 'application/json' }
            }).then(response => response.json())
              .then(data => alert('Proyek created/updated!'));
        });
    </script>
</body>
</html>
