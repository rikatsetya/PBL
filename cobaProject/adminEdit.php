<?php
require_once 'crud.php';
$crud = new Crud();

?>
<?php include 'tampilan_sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Admin</title>
</head>

<body>
    <style>
        header {
            display: flex;
        }
    </style>
    <div class="containerKategori">
        <div class="wrapTop">
            <h1>Survey Kepuasan Pelanggan</h1>
            <h6>Survey Kepuasan Pelanggan Polinema</h6>
        </div>
        <?php
        $result = $crud->readKategori();
        foreach ($result as $show) {
            echo "<div class='containerKategori'>";
            echo "<h3>" . $show['kategori'] . "</h3>";
            $key = $show['id'];
            $tampilSoal = $crud->readSoal($key);
            foreach ($tampilSoal as $value) {
                echo $value['soal_nama'];
                $idSoal = $value['id_soal'];
                echo "<button type='button' class='btn btn-primary mb-3' data-toggle='modal' data-target='#editSoal" . $idSoal . "'>edit</button>";
                echo "<a href='editSoal.php?action=delete&id=" . $idSoal . "' class='btn btn-primary mb-3'>Delete</a>";
        ?>
                <br>
                <div class="containSkor">Buruk
                    <input type="radio" name="skor" value="0.2">
                    <input type="radio" name="skor" value="0.4">
                    <input type="radio" name="skor" value="0.6">
                    <input type="radio" name="skor" value="0.8">
                    <input type="radio" name="skor" value="1">Baik
                </div>
            <?php
            }
            echo $key;

            ?>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahSoal<?php echo $key ?>">Add</button>
            <div class="modal fade" id="tambahSoal<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleSoalLabel" aria-hidden="true">
                <div class="modal-dialog" role=document>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleSoalLabel">Tambah Data Soal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="editSoal.php?id=<?php echo $key ?>" method="post">
                                <div class="form-group">
                                    <label for="soal">Soal:</label>
                                    <textarea name="soal" id="soal" cols="30" rows="10" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editSoal<?php echo $idSoal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleSoalLabel" aria-hidden="true">
                <div class="modal-dialog" role=document>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleSoalLabel">Edit Data Soal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="editSoal.php?action=edit&id=<?php echo $idSoal ?>" method="post">
                                <div class="form-group">
                                    <label for="soal">Soal:</label>
                                    <textarea name="soal" id="soal" cols="30" rows="10" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            echo "<button type='button' class='btn btn-primary mb-3' data-toggle='modal' data-target='#editKategori" . $key . "'>edit</button>";
            echo "<a href='editKategori.php?action=delete&id=" . $key . "' class='btn btn-danger btn-sm'>Delete</a>";
            echo "</div>";
            ?>
            <div class="modal fade" id="editKategori<?php echo $key ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role=document>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">edit Data Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="editKategori.php?action=edit&id=<?php echo $key ?>" method="post">
                            <div class="form-group">
                                <label for="kategori">Kategori:</label>
                                <input type="text" name="kategori" id="kategori" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><?php
        }
        ?>
        Tambah Kategori Survey
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">Add</button>
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
                    <form action="editKategori.php" method="post">
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <input type="text" name="kategori" id="kategori" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <br>
        <a href="beranda.php">Kembali</a>
</body>

</html>