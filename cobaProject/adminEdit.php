<?php
require_once 'crud.php';
$crud = new Crud();

?>
<!-- <?php include 'tampilan_sidebar.php';?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Admin</title>
</head>
<body>
    <div class="containerKategori">
        <div class="wrapTop">
            <h1>Survey Kepuasan Pelanggan</h1>
            <h6>Survey Kepuasan Pelanggan Polinema</h6>
        </div>
        <div class="wrapContent">
            
        </div>
        Tambah Kategori Survey
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">Tambah</button>
    </div>
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role=document>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <a href="beranda.php">Kembali</a>
</body>
</html>