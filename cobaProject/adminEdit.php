<?php
require_once 'crud.php';

$crud = new Crud();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori'];
    $soal = $_POST['soal'];
    $runKategori = $crud->addKategori($kategori);
    $crud->addKategoriSoal($kategori,$soal);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Tambah kategori</h1>
    <form method="post">
        <label for="kategori">Kategori
            <input type="text" id="kategori" name="kategori">
        </label>
        <br>
        <label for="soal">soal
            <input type="text" id="soal" name="soal">
        </label>
        <br>
        <button type="submit">Submit</button>
    </form>
    <br><a href="beranda.php">Kembali</a>
</body>
</html>